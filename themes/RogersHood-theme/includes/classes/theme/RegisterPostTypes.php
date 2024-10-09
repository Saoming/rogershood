<?php
/**
 * Register the custom post types
 *
 */

namespace TenUpTheme\theme;

/**
 * Registers Custom Post Types for the Rogers Hood Theme
 */
class RegisterPostTypes {

	/**
	 * Runs the WordPress hooks
	 *
	 * @return void
	 */
	public function init_hooks() {
		add_action( 'init', array( $this, 'register_product_description_cpt' ) );
		add_action( 'init', array( $this, 'register_product_block_cpt' ) );
	}

	/**
	 * Registers the Product Description CPT
	 *
	 * @return void
	 */
	public function register_product_description_cpt() {
		$labels = array(
			'name'                  => _x( 'Product Descriptions', 'Post Type General Name', 'rogers-hood' ),
			'singular_name'         => _x( 'Product Description', 'Post Type Singular Name', 'rogers-hood' ),
			'menu_name'             => __( 'Product Descriptions', 'rogers-hood' ),
			'name_admin_bar'        => __( 'Product Description', 'rogers-hood' ),
			'archives'              => __( 'Product Description Archives', 'rogers-hood' ),
			'attributes'            => __( 'Product Description Attributes', 'rogers-hood' ),
			'parent_item_colon'     => __( 'Parent result:', 'rogers-hood' ),
			'all_items'             => __( 'All results', 'rogers-hood' ),
			'add_new_item'          => __( 'Add New Product Description', 'rogers-hood' ),
			'add_new'               => __( 'Add New', 'rogers-hood' ),
			'new_item'              => __( 'New Product Description', 'rogers-hood' ),
			'edit_item'             => __( 'Edit Product Description', 'rogers-hood' ),
			'update_item'           => __( 'Update Product Description', 'rogers-hood' ),
			'view_item'             => __( 'View Product Description', 'rogers-hood' ),
			'view_items'            => __( 'View Product Descriptions', 'rogers-hood' ),
			'search_items'          => __( 'Search Product Description', 'rogers-hood' ),
			'not_found'             => __( 'Not found', 'rogers-hood' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'rogers-hood' ),
			'featured_image'        => __( 'Featured Image', 'rogers-hood' ),
			'set_featured_image'    => __( 'Set featured image', 'rogers-hood' ),
			'remove_featured_image' => __( 'Remove featured image', 'rogers-hood' ),
			'use_featured_image'    => __( 'Use as featured image', 'rogers-hood' ),
			'insert_into_item'      => __( 'Insert into product description', 'rogers-hood' ),
			'uploaded_to_this_item' => __( 'Uploaded to this product description', 'rogers-hood' ),
			'items_list'            => __( 'Product Descriptions list', 'rogers-hood' ),
			'items_list_navigation' => __( 'Product Descriptions list navigation', 'rogers-hood' ),
			'filter_items_list'     => __( 'Filter product description list', 'rogers-hood' ),
		);
		$args   = array(
			'label'               => __( 'Product Description', 'rogers-hood' ),
			'description'         => __( 'Product Description for Product Blocks', 'rogers-hood' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'revisions', 'thumbnail', 'excerpt' ),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-format-aside',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
		);
		register_post_type( 'rh_product_desc', $args );
	}

	/**
	 * Registers the Product Blocks CPT
	 *
	 * @return void
	 */
	public function register_product_block_cpt() {
		$labels = array(
			'name'                  => _x( 'Products Blocks', 'Post Type General Name', 'rogers-hood' ),
			'singular_name'         => _x( 'Product Blocks', 'Post Type Singular Name', 'rogers-hood' ),
			'menu_name'             => __( 'Products Blocks', 'rogers-hood' ),
			'name_admin_bar'        => __( 'Products Blocks', 'rogers-hood' ),
			'archives'              => __( 'Products Blocks Archives', 'rogers-hood' ),
			'attributes'            => __( 'Product Blocks Attributes', 'rogers-hood' ),
			'parent_item_colon'     => __( 'Parent result:', 'rogers-hood' ),
			'all_items'             => __( 'All results', 'rogers-hood' ),
			'add_new_item'          => __( 'Add New Product Blocks', 'rogers-hood' ),
			'add_new'               => __( 'Add New', 'rogers-hood' ),
			'new_item'              => __( 'New Product Blocks', 'rogers-hood' ),
			'edit_item'             => __( 'Edit Product Blocks', 'rogers-hood' ),
			'update_item'           => __( 'Update Product Blocks', 'rogers-hood' ),
			'view_item'             => __( 'View Product Blocks', 'rogers-hood' ),
			'view_items'            => __( 'View Products Blocks', 'rogers-hood' ),
			'search_items'          => __( 'Search Product Blocks', 'rogers-hood' ),
			'not_found'             => __( 'Not found', 'rogers-hood' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'rogers-hood' ),
			'featured_image'        => __( 'Featured Image', 'rogers-hood' ),
			'set_featured_image'    => __( 'Set featured image', 'rogers-hood' ),
			'remove_featured_image' => __( 'Remove featured image', 'rogers-hood' ),
			'use_featured_image'    => __( 'Use as featured image', 'rogers-hood' ),
			'insert_into_item'      => __( 'Insert into product blocks', 'rogers-hood' ),
			'uploaded_to_this_item' => __( 'Uploaded to this product blocks', 'rogers-hood' ),
			'items_list'            => __( 'Product Blocks list', 'rogers-hood' ),
			'items_list_navigation' => __( 'Product Blocks list navigation', 'rogers-hood' ),
			'filter_items_list'     => __( 'Filter product description list', 'rogers-hood' ),
		);
		$args   = array(
			'label'               => __( 'Product Blocks', 'rogers-hood' ),
			'description'         => __( 'Product Blocks for Product', 'rogers-hood' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'revisions', 'excerpt' ),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-format-aside',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
		);
		register_post_type( 'rh_product_blocks', $args );
	}
}
