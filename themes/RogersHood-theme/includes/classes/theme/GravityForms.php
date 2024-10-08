<?php

namespace TenUpTheme\theme;

class GravityForms {

	public function init_hooks() {
		add_filter( 'gform_required_legend', '__return_empty_string' );
	}
}
