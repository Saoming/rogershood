<?php
/**
 * Additional Site Hooks and Filter
 *
 * @package TenUpTheme
 */

namespace TenUpTheme;

use TenUpTheme\Blocks\RegisterBlocks;
use TenUpTheme\Theme\AcfOptionsPage;
use TenUpTheme\Theme\AddSvgSupport;
use TenUpTheme\Blocks\RegisterBlockCategory;
use TenUpTheme\theme\ImageSizes;
use TenUpTheme\WooCommerceCustomization\WooCommerceCustomization;

/**
 * Register Additional Functionality to support the theme
 */
class Additional {

	protected $register_block_categories;
	protected $register_blocks;
	protected $acf_options_page;
	protected $add_svg_support;
	 private  $woocommerce;
	 private ImageSizes $image_sizes;
	private $woocommerce;

	/**
	 * Creates all the Classes
	 */
	public function __construct() {
		$this->woocommerce = new WooCommerceCustomization();
		$this->register_block_categories  = new RegisterBlockCategory();
		$this->register_blocks            = new RegisterBlocks();
		$this->acf_options_page           = new AcfOptionsPage();
		$this->add_svg_support            = new AddSvgSupport();
		$this->image_sizes                = new ImageSizes();
	}

	/**
	 * Initializes the WordPress hooks
	 *
	 * @return void
	 */
	public function init_hooks() {
		$this->woocommerce->init_hooks();
		$this->register_block_categories->init_hooks();
		$this->register_blocks->init_hooks();
		$this->acf_options_page->init_hooks();
		$this->add_svg_support->init_hooks();
		$this->image_sizes->init_hooks();
	}

}
