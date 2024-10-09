<?php

namespace TenUpTheme\Blocks;

class PostHeadingStyle {

	public function init_hooks() {
		// Use admin_init to ensure this runs only in the admin area
		add_action( 'admin_init', array( $this, 'register_h3_post_style' ) );
	}

	public function register_h3_post_style() {
		// Check if we're in the editor for single posts
		if ( is_admin() &&
		     ( isset( $_GET['post_type'] ) && $_GET['post_type'] === 'post' ) ||
		     ( isset( $_GET['post'] ) && get_post_type( $_GET['post'] ) === 'post' )
		) {
			custom_theme_error_log( 'inside' );

			// Register block style for core/heading
			register_block_style(
				'core/heading',
				array(
					'name'  => 'h3',
					'label' => __( 'H3 style' ),
				)
			);
		}
	}
}

