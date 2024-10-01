<?php
/**
 * Registers a block category
 *
 * @package TenUpTheme
 */

 namespace TenUpTheme\Blocks;

/**
 * Registers a block category that is used for the custom blocks
 * Moves the block to the top of the block selector
 */
class RegisterBlockCategory {

	/**
	 * Initializes the WordPress hooks
	 *
	 * @return void
	 */
	public function init_hooks() {
		add_filter( 'block_categories_all', array( $this, 'register_shea_block_category' ) );
	}

	/**
	 * Adds the Category, and places it to the top of the Block selector
	 *
	 * @param array $categories List of Block Categories
	 *
	 * @return array $categories
	 */
	public function register_shea_block_category( $categories ) {
		$category_slugs = wp_list_pluck( $categories, 'slug' );

		return in_array( 'rogershood', $category_slugs, true ) ? $categories : array_merge(
			array(
				array(
					'slug'  => 'rogershood',
					'title' => 'RogersHood',
					'icon'  => null,
				),
			),
			$categories
		);
	}
}
