<?php

namespace TenUpTheme\theme;

class ImageSizes {

	public function init_hooks() {
		add_action( 'after_setup_theme', array( $this, 'add_image_sizes' ) );
	}

	public function add_image_sizes() {
		add_image_size('rh-post-thumbnail', 400, 272, true);
		add_image_size('rh-post-feature-image', 1030, 295, true);
	}

}
