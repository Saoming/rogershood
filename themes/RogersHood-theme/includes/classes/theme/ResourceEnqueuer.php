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
		$this->enqueue_sharer_script();
		$this->enqueue_template_resources();
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
		if ( ! is_singular( 'post' ) ) {
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
			TENUP_THEME_TEMPLATE_URL . '/3rd-party/basiclightbox/css/basiclightbox.min.css',
		);

		wp_enqueue_script(
			'basic-lightbox-js',
			TENUP_THEME_TEMPLATE_URL . '/3rd-party/basiclightbox/js/basiclightbox.js',
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
	 * Registers the Swiper Assets
	 */
	public static function enqueue_swiper_assets() {
		wp_enqueue_style(
			'swiper-css',
			TENUP_THEME_TEMPLATE_URL . '/3rd-party/swiper/swiper-bundle.min.css',
			array(),
		);

		wp_enqueue_script(
			'swiper-js',
			TENUP_THEME_TEMPLATE_URL . '/3rd-party/swiper/swiper-bundle.min.js',
			array(),
			false,
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
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
			'splide-script',
			TENUP_THEME_TEMPLATE_URL . '/3rd-party/splide-js-4.1.3/splide.min.js',
			array(),
			filemtime( TENUP_THEME_PATH . '/3rd-party/splide-js-4.1.3/splide.min.js' ),
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);

		wp_enqueue_script(
			'splide-auto-scroll',
			TENUP_THEME_TEMPLATE_URL . '/3rd-party/splide-js-4.1.3/splide-extension-auto-scroll.min.js',
			array(),
			filemtime( TENUP_THEME_PATH . '/3rd-party/splide-js-4.1.3/splide-extension-auto-scroll.min.js' )
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

	/**
	 * Enqueue the block template
	 */
	protected function enqueue_template_resources() {
		if ( is_404() ) {
			wp_enqueue_style(
				'404',
				TENUP_THEME_DIST_URL . 'css/404-style.css',
				array(),
				filemtime( TENUP_THEME_DIST_PATH . 'css/404-style.css' )
			);
		}
	}
}
