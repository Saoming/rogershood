<?php
/**
 * Defining Theme Option Page
 *
 * @package BusExp\Theme
 * @author  EmiPajk
 * @licence  GPL-2git
 */

namespace TenUpTheme\Theme;

/**
 * Class that created Option page and sub-menus
 *
 * @return void
 */
class AcfOptionsPage {
	/**
	 * Initializes WordPress hooks
	 *
	 * @return void
	 */
	public function init_hooks() {
		add_action( 'acf/init', array( $this, 'register_options_page' ) );
	}

	/**
	 * Create ACF Options Page and sub-pages
	 */
	public function register_options_page() {
		if ( function_exists( 'acf_add_options_page' ) && is_user_logged_in() && 'administrator' === wp_get_current_user()->roles[0] ) {
			$parent = acf_add_options_page(
				array(
					'page_title' => __( 'RogersHood Theme Settings', 'tenup-theme' ),
					'menu_title' => __( 'RogersHood Theme Settings', 'tenup-theme' ),
					'menu_slug'  => 'theme-general-settings',
				)
			);

			acf_add_options_sub_page(
				array(
					'page_title'  => __( 'Site Header', 'tenup-theme' ),
					'menu_title'  => __( 'Site Header', 'tenup-theme' ),
					'parent_slug' => $parent['menu_slug'],
				)
			);

			acf_add_options_sub_page(
				array(
					'page_title'  => __( 'Site Footer', 'tenup-theme' ),
					'menu_title'  => __( 'Site Footer', 'tenup-theme' ),
					'parent_slug' => $parent['menu_slug'],
				)
			);

			acf_add_options_sub_page(
				array(
					'page_title'  => __( 'WooCommerce', 'tenup-theme' ),
					'menu_title'  => __( 'WooCommerce', 'tenup-theme' ),
					'parent_slug' => $parent['menu_slug'],
				)
			);
		}
	}
}
