<?php
/**
 * Handles the Enqueuing of Stylesheets and Script files
 *
 * @package TenUpTheme
 */

namespace TenUpTheme\Theme;

/**
 * Enqueues Stylesheets and Script files
 */
class ResourceEnqueuer {
	/**
	 * Initializes the WordPress Hooks
	 *
	 * @return void
	 */
	public function init_hooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_theme_resources' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'dequeue_dashicons' ) );
		add_filter( 'script_loader_tag', array( $this, 'defer_specific_scripts' ), 10, 3 );
	}

	/**
	 * Handles loading of the theme resources
	 *
	 * @return void
	 */
	public function enqueue_theme_resources() {
		$this->optimize_wp_rendering();
		$this->dequeue_unneeded_styles();
		$this->enqueue_sharer_script();
	}

	/**
	 * Optimizes the order of the scripts and styles in WordPress
	 */
	protected function optimize_wp_rendering() {
		remove_action( 'wp_head', 'wp_print_styles', 8 );
		remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
		add_action( 'wp_head', 'wp_print_head_scripts', 8 );
		add_action( 'wp_head', 'wp_print_styles', 9 );
	}

	/**
	 * Enqueues the Sharer Script
	 *
	 * Used for Social Sharing
	 */
	public function enqueue_sharer_script() {
		if ( ! is_singular('post') ) {
			return;
		}
		wp_enqueue_script(
			'sharer-script',
			TENUP_THEME_TEMPLATE_URL . '/3rd-party/sharer/sharer.min.js',
			array(),
			filemtime( TENUP_THEME_PATH . '/3rd-party/sharer/sharer.min.js' ),
			true
		);
	}

	public static function enqueue_lightbox_assets() {
		wp_enqueue_style(
			'basic-lightbox-css',
			TENUP_THEME_TEMPLATE_URL . '/3rd-party/basicLightBox/css/basiclightbox.min.css',
		);

		wp_enqueue_script(
			'basic-lightbox-js',
			TENUP_THEME_TEMPLATE_URL . '/3rd-party/basicLightBox/js/basiclightbox.min.js',
		);
	}

	public static function enqueue_slick_assets() {
		wp_enqueue_style(
			'slick-css',
			TENUP_THEME_TEMPLATE_URL . '/3rd-party/slick/css/slick-theme.css',
		);

		wp_enqueue_script(
			'slick-js',
			TENUP_THEME_TEMPLATE_URL . '/3rd-party/slick/js/slick.min.js',
			'jquery',
			false,
			true
		);
	}


	/**
	 * Enqueues the Transaction Filter script
	 */
	public static function enqueue_transactions_filter_script() {
		wp_enqueue_script(
			'transactions-filter-script-defer',
			TENUP_THEME_DIST_URL . '/js/transactions-filter-script.js',
			array(),
			filemtime( TENUP_THEME_DIST_PATH . '/js/transactions-filter-script.js' ),
			false
		);
	}

	/**
	 * Enqueues the Animated Counter Hero Before Archive script
	 */
	public static function enqueue_animated_counter_hero_script() {
		wp_enqueue_script(
			'animated-counter-hero-script-defer',
			TENUP_THEME_DIST_URL . '/js/animated-counter-hero-script.js',
			array(),
			filemtime( TENUP_THEME_DIST_PATH . '/js/animated-counter-hero-script.js' ),
			false
		);
	}


	/**
	 * Registers the Splide Assets
	 */
	public static function register_splide_assets() {

		wp_enqueue_style(
			'splide-style',
			TENUP_THEME_TEMPLATE_URL . '/3rd-party/splide-js-4.1.3/splide-core.min.css',
			array(),
			filemtime( TENUP_THEME_PATH . '/3rd-party/splide-js-4.1.3/splide-core.min.css' )
		);

		wp_enqueue_script(
			'splide-script-defer',
			TENUP_THEME_TEMPLATE_URL . '/3rd-party/splide-js-4.1.3/splide.min.js',
			array(),
			filemtime( TENUP_THEME_PATH . '/3rd-party/splide-js-4.1.3/splide.min.js' ),
			true
		);
	}

	/**
	 * Defers the scripts that have "defer" in the handle
	 *
	 * @param string $html Outputted HTML
	 * @param string $handle The Script registration Handle
	 *
	 * @return string $html Outputted HTML
	 */
	public function defer_specific_scripts( $html, $handle ) {
		if ( ! is_admin() && str_contains( $handle, 'defer' ) ) {
			$html = str_replace( '></script>', ' defer></script>', $html );
		}

		return $html;
	}

	/**
	 *  Remove dashicons in frontend for unauthenticated users
	 */
	public function dequeue_dashicons() {
		if ( ! is_user_logged_in() ) {
			wp_deregister_style( 'dashicons' );
		}
	}
}
