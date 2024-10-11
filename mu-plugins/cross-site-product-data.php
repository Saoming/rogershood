<?php
/**
 * Plugin Name:       Cross Site Product Data
 * Description:       Cross Site
 * Version:           1.0.0
 * Requires at least: 5.9
 * Requires PHP:      7.4
 * Author:            Sybre Waaijer
 * Author URI:        https://eonstudios.io/
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package           RogersHood\CrossSiteProductData
 */

namespace RogersHood\CrossSiteProductData;

\defined( 'ABSPATH' ) || die;

\add_action( 'rest_api_init', 'register_product_data_endpoint' );
\add_shortcode( 'cross_site_products', __NAMESPACE__ . '\\cross_site_products_shortcode' );

/**
 * @access private
 * @var string The secret key to access the product data, this blocks the REST endpoint.
 *
 * If leaked, change this key to a new one.
 * Best would be to define it using .env data, though I would then recommend against using this constant.
 */
const SECRET = 'cNDTGt8nc&af!BdGKrxPG7ncahjTx$!K7L98zjg4';

/**
 * @access private
 * @var int The default store ID to fetch the product data from.
 */
const STORE_ID = 2;

/**
 * @access private
 * @var int The amount of seconds to cache the product data.
 */
const CACHE_TIMEOUT = 6000; // 10 minutes.

/**
 * @hook rest_api_init 10
 * @access private
 */
function register_product_data_endpoint() {
	\register_rest_route(
		'crosssiteproductdata/v1',
		'/product-data/(?P<id>\d+)',
		[
			'methods'             => 'GET',
			'callback'            => __NAMESPACE__ . '\\rest_get_latest_product_data',
			// phpcs:ignore, WordPress.Security.NonceVerification -- This is a backend check, no user interaction.
			'permission_callback' => fn() => SECRET === ( $_GET['secret'] ?? '' ),
		],
	);
	\register_rest_route(
		'crosssiteproductdata/v1',
		'/products-by-category',
		[
			'methods'             => 'GET',
			'callback'            => __NAMESPACE__ . '\\rest_get_products_by_category',
			'permission_callback' => fn() => SECRET === ( $_GET['secret'] ?? '' ),
		]
	);
}

/**
 * @access private
 * @param array $request Accepts 'id' for the product ID.
 * @return ?array The product data.
 */
function rest_get_latest_product_data( $request ) {

	if ( ! \function_exists( 'wc_get_product' ) )
		return null;

	return get_latest_product_data( $request['id'] );
}

/**
 * @access private
 * @param int $product_id The product ID.
 * @return ?array The product data.
 */
function get_latest_product_data( $product_id ) {

	$product = \wc_get_product( $product_id );

	if ( ! $product )
		return null;

	return [
		'featured_image'    => \wp_get_attachment_url( $product->get_image_id() ),
		'title'             => $product->get_name(),
		'short_description' => $product->get_short_description(),
		'price'             => $product->get_price(),
		'review_avg'        => $product->get_average_rating(),
		'review_count'      => $product->get_review_count(),
		'first_category'    => current( \wp_get_post_terms( $product_id, 'product_cat', [ 'fields' => 'names' ] ) ),
	];
}

/**
 * @access private
 * @param int $product_id The product ID.
 * @param int $site_id    The site ID to fetch the product from.
 * @return ?array The product data.
 */
function fetch_and_store_product_data( $product_id, $site_id = STORE_ID ) {

	if ( \get_current_blog_id() === $site_id )
		return get_latest_product_data( $product_id );

	$url      = \get_blog_option( $site_id, 'siteurl' ) . '/wp-json/crosssiteproductdata/v1/product-data/' . $product_id . '?secret=' . SECRET;
	$response = \wp_remote_get( $url );

	if ( ! $response || \is_wp_error( $response ) )
		return null;

	$data = json_decode( \wp_remote_retrieve_body( $response ), true );

	// Warning: This option can grow indefinitely, consider adding a weekly cleanup routine (monday to tuesday night).
	\update_option(
		'custom_product_data_cache',
		array_merge(
			\get_option( 'custom_product_data_cache', [] ) ?? [],
			[
				"$site_id.$product_id" => [
					'timeout' => time() + CACHE_TIMEOUT,
					'data'    => $data,
				],
			],
		),
		true,
	);

	return $data;
}

/**
 * @access public
 * @param int $product_id The product ID.
 * @param int $site_id    The site ID to fetch the product from.
 * @return ?array The product data. {
 *    'featured_image' (string): URL of the product's featured image.
 *    'title' (string): The name of the product.
 *    'short_description' (string): The short description of the product.
 *    'price' (string): The price of the product.
 *    'review_avg' (float): The average rating of the product.
 *    'review_count' (int): The number of reviews for the product.
 *    'first_category' (string): The name of the first category assigned to the product.
 * }
 */
function get_product_data( $product_id, $site_id = STORE_ID ) {

	$cached_data = \get_option( 'custom_product_data_cache' )[ "$site_id.$product_id" ] ?? null;

	if ( time() > ( $cached_data['timeout'] ?? 0 ) ) {
		$data = fetch_and_store_product_data( $product_id, $site_id )
			 ?? $cached_data['data'] // Fall back to old data.
			 ?? null;
	} else {
		$data = $cached_data['data'];
	}

	return $data;
}

/**
 * Get product data for multiple product IDs.
 *
 * @access public
 * @param array $product_ids An array of product IDs.
 * @param int   $site_id     The site ID to fetch the products from.
 * @return array An array of product data.
 */
function get_product_data_multiple( $product_ids, $site_id = STORE_ID ) {

	$data = [];

	foreach ( $product_ids as $product_id ) {

		$product_data = get_product_data( $product_id, $site_id );

		if ( $product_data )
			$data[ $product_id ] = $product_data;
	}

	return $data;
}

/**
 * Get product data by category.
 *
 * @access public
 * @param string $category The category name.
 * @param int    $count    Number of products to fetch.
 * @param int    $site_id  The site ID to fetch the products from.
 * @return array An array of product data.
 */
function get_product_data_by_category( $category, $count = 5, $site_id = STORE_ID ) {

	if ( \get_current_blog_id() === $site_id ) {
		$query = new \WP_Query( [
			'post_type'      => 'product',
			'posts_per_page' => $count,
			'tax_query'      => [
				[
					'taxonomy' => 'product_cat',
					'field'    => 'name',
					'terms'    => $category,
				],
			],
		] );

		$data = [];

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$data[] = get_product_data( \get_the_ID(), $site_id );
			}
			\wp_reset_postdata();
		}

		return $data;
	}

	$url = \add_query_arg(
		[
			'secret'   => SECRET,
			'category' => $category,
			'count'    => $count,
		],
		\get_blog_option( $site_id, 'siteurl' ) . '/wp-json/crosssiteproductdata/v1/products-by-category',
	);

	$response = \wp_remote_get( $url );

	if ( ! $response || \is_wp_error( $response ) )
		return null;

	return json_decode( \wp_remote_retrieve_body( $response ), true );
}

/**
 * Shortcode to display products in a grid.
 *
 * @hook cross_site_products_shortcode 10
 * @param array $atts Shortcode attributes.
 * @return string HTML output.
 */
function cross_site_products_shortcode( $atts ) {

	$atts = \shortcode_atts(
		[
			'product_ids'            => '',
			'category'               => '',
			'count'                  => 3,
			'site_id'                => STORE_ID,
			'show_short_description' => false,
			'class'                  => '',
		],
		$atts,
		'cross_site_products',
	);

	$site_id      = \intval( $atts['site_id'] );
	$product_data = [];

	if ( ! empty( $atts['product_ids'] ) ) {
		$product_ids  = array_map( 'intval', explode( ',', $atts['product_ids'] ) );
		$product_data = get_product_data_multiple( $product_ids, $site_id );
	} elseif ( ! empty( $atts['category'] ) ) {
		$product_data = get_product_data_by_category(
			$atts['category'],
			\intval( $atts['count'] ),
			$site_id,
		);
	}

	if ( empty( $product_data ) )
		return '';

	// Build HTML grid to display the products.
	$output = sprintf( '<div class="cross-site-products-grid %s">', \esc_attr( $atts['class'] ) );

	foreach ( $product_data as $data ) {
		if ( ! $data ) continue;

		$featured_image    = \esc_url( $data['featured_image'] );
		$title             = \esc_html( $data['title'] );
		$short_description = \esc_html( $data['short_description'] );
		$price             = \esc_html( $data['price'] );
		$review_avg        = \esc_html( $data['review_avg'] );
		$review_count      = \esc_html( $data['review_count'] );
		$first_category    = \esc_html( $data['first_category'] );

		if ( $atts['show_short_description'] ) {
			$short_description_html = <<<HTML
				<p class="product-short-description">$short_description</p>
			HTML;
		}

		$output .= <<<HTML
		<div class="product-item">
			<div class="product-image-wrap">
				<span class="product-category">{$first_category}</span>
				<div class="product-image"><img src="{$featured_image}" alt="{$title}"></div>
			</div>
			<p class="product-rating"><span class="product-review-stars" data-avg="$review_avg">{$review_avg}</span> ({$review_count} reviews)</p>
			<h3>{$title}</h3>
			$short_description_html
			<p class="product-price">{$price}</p>
		</div>
		HTML;
	}

	$output .= '</div>';

	// Optionally enqueue styles or add inline styles here.
	return $output;
}
