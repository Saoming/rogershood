<?php

defined( 'ABSPATH' ) || exit;

if ( ! in_array( 'woocommerce/woocommerce.php', rh_get_active_plugins(), true ) ) {
	return;
}

/**
 * @return int
 */
function rh_get_shop_page_id() {

	static $id;

	if ( isset( $id ) ) {
		return $id;
	}

	$id = \function_exists( 'wc_get_page_id' ) ? (int) \wc_get_page_id( 'shop' ) : 0;

	if ( \get_post( $id ) ) {
		return $id;
	}

	return $id = 0;
}
/**
 * @return bool
 */
function rh_is_shop( $post = null ) {

	if ( isset( $post ) ) {
		$id = is_int( $post )
			? $post
			: ( get_post( $post )->ID ?? 0 );

		// phpcs:ignore, TSF.Performance.Opcodes -- local funcs
		$is_shop = $id && rh_get_shop_page_id() === $id;
	} else {
		// phpcs:ignore, TSF.Performance.Opcodes -- local funcs
		$is_shop = ! is_admin() && \function_exists( 'is_shop' ) && is_shop();
	}

	return $is_shop;
}


/**
 *  Disable Default Header Store Notice
 */
function modify_woocommerce_demo_store() {
	return null;
}
add_filter( 'woocommerce_demo_store', 'modify_woocommerce_demo_store', 10, 2 );

/**
 *  Remove Ebooks sand Any Uncategorized in the default Shop Query
 */
function custom_pre_get_posts_query( $q ) {

	// Only modify the shop's main query.
	if ( ! rh_is_shop() || ! $q->is_main_query() ) {
		return;
	}

	// Get all WooCommerce product categories
	$terms = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => false,
		)
	);

	// Filter the terms to get the IDs of the excluded categories
	$excluded_cats    = array_filter( $terms, fn( $term ) => in_array( $term->slug, array( 'ebooks', 'uncategorized' ), true ) );
	$excluded_cat_ids = array_map( fn( $term ) => $term->term_id, $excluded_cats );

	// Exclude the categories from the query
	$tax_query = $q->get( 'tax_query' );

	// Set to 'AND' if not set.
	$tax_query['relation'] ??= 'AND';

	$tax_query[] = array(
		'taxonomy' => 'product_cat',
		'field'    => 'term_id',
		'terms'    => $excluded_cat_ids,
		'operator' => 'NOT IN',
	);

	$q->set( 'tax_query', $tax_query );
}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );

/**
 * Change the breadcrumb separator
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' &gt; ';
	return $defaults;
}

/**
 * Remove the default product title and Add a custom one
 */
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_filter( 'woocommerce_shop_loop_item_title', 'wc_link_fix', 10 );
function wc_link_fix() {
	echo '<a href=" ' . get_the_permalink() . '">';
	echo '<h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo '</a>';
}
