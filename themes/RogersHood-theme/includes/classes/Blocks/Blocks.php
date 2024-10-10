<?php

namespace TenUpTheme\Blocks;

class Blocks {

	/**
	 * @var CoreHeading
	 */
	private $core_heading;

	public function __construct() {
		$this->core_heading = new CoreHeading();
		$this->post_heading_style = new PostHeadingStyle();
	}

	public function init_hooks() {
		$this->core_heading->init_hooks();
		$this->post_heading_style->init_hooks();
	}
}
