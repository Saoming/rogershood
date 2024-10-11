<?php
/**
 * Plugin Name:       Cross Site Product Data
 * Description:       Cross Site
 * Version:           1.0.0
 * Requires at least: 5.9
 * Requires PHP:      7.4
 * Author:            Samuel Tirtawidjaja
 * Author URI:        https://eonstudios.io/
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package           RogersHood\CrossSiteProductData
 */

namespace RogersHood\CrossSiteProductData;

// Usage example:
if ( false ) { // phpcs:ignore -- example code.

	$product_data = \RogersHood\CrossSiteProductData\get_product_data( 2 );

	if ( $product_data ) {
		echo 'Featured Image: ' . \esc_html( $product_data['featured_image'] );
		echo 'Title: ' . \esc_html( $product_data['title'] );
		echo 'Short Description: ' . \esc_html( $product_data['short_description'] );
		echo 'Price: ' . \esc_html( $product_data['price'] );
		echo 'Review Average: ' . \esc_html( $product_data['review_avg'] );
		echo 'Review Count: ' . \esc_html( $product_data['review_count'] );
		echo 'First Category: ' . \esc_html( $product_data['first_category'] );
	}
}

/**
 * @access private
 * @var string The secret key to access the product data, this blocks the REST endpoint.
 *
 * If leaked, change this key to a new one.
 * Best would be to define it using .env data, though I would then recommend against using this constant.
 */
const SECRET = 'cphe79Siyhf58i83ehN@N!RMErHc@?cLmKkSsxqh';

/**
 * @access private
 * @var int The amount of seconds to cache the product data.
 */
const CACHE_TIMEOUT = 6000; // 10 minutes.

/**
 * @access private
 */
function register_product_data_endpoint() {
	\register_rest_route(
		'crosssiteproductdata/v1',
		'/product-data/(?P<id>\d+)',
		array(
			'methods'             => 'GET',
			'callback'            => __NAMESPACE__ . '\\get_latest_product_data',
			// phpcs:ignore, WordPress.Security.NonceVerification -- This is a backend check, no user interaction.
			'permission_callback' => fn () => SECRET === ( $_GET['secret'] ?? '' ),
		),
	);
}
\add_action( 'rest_api_init', __NAMESPACE__ . '\register_product_data_endpoint' );

/**
 * @access private
 * @param array $request Accepts 'id' for the product ID.
 * @return ?array The product data.
 */
function get_latest_product_data( $request ) {

	if ( ! \function_exists( 'wc_get_product' ) ) {
		return null;
	}

	$product_id = $request['id'];
	$product    = \wc_get_product( $product_id );

	if ( ! $product ) {
		return null;
	}

	return array(
		'featured_image'    => \wp_get_attachment_url( $product->get_image_id() ),
		'title'             => $product->get_name(),
		'short_description' => $product->get_short_description(),
		'price'             => $product->get_price(),
		'review_avg'        => $product->get_average_rating(),
		'review_count'      => $product->get_review_count(),
		'first_category'    => current( \wp_get_post_terms( $product_id, 'product_cat', array( 'fields' => 'names' ) ) ),
	);
}

/**
 * @access private
 * @param int $product_id The product ID.
 * @param int $site_id    The site ID to fetch the product from.
 * @return ?array The product data.
 */
function fetch_and_store_product_data( $product_id, $site_id = 2 ) {

	$url      = \get_blog_option( $site_id, 'siteurl' ) . '/wp-json/crosssiteproductdata/v1/product-data/' . $product_id . '?secret=' . SECRET;
	$response = \wp_remote_get( $url );

	if ( ! $response || \is_wp_error( $response ) ) {
		return null;
	}

	$data = json_decode( \wp_remote_retrieve_body( $response ), true );

	\update_option(
		"custom_product_data_$product_id",
		array(
			'timeout' => time() + CACHE_TIMEOUT,
			'data'    => $data,
		),
		true,
	);

	return $data;
}

/**
 * @access public
 * @param int $product_id The product ID.
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
function get_product_data( $product_id ) {

	$cached_data = \get_option( 'custom_product_data' );

	if ( time() > ( $cached_data['timeout'] ?? 0 ) ) {
		$data = fetch_and_store_product_data( $product_id ) ?? $cached_data['data'] ?? null;
	} else {
		$data = $cached_data['data'];
	}

	return $data;
}
