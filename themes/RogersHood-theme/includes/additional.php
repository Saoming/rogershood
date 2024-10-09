<?php
/**
 * Additional Site Hooks and Filter
 *
 * @package TenUpTheme
 */

namespace TenUpTheme;

use TenUpTheme\Blocks\Blocks;
use TenUpTheme\Blocks\RegisterBlocks;
use TenUpTheme\Shortcodes\Shortcodes;
use TenUpTheme\Theme\AcfOptionsPage;
use TenUpTheme\Theme\AddSvgSupport;
use TenUpTheme\Blocks\RegisterBlockCategory;
use TenUpTheme\theme\ImageSizes;
use TenUpTheme\Theme\ResourceEnqueuer;
use TenUpTheme\WooCommerceCustomization\WooCommerceCustomization;
use TenUpTheme\Theme\GravityForms;
use TenUpTheme\Theme\RegisterPostTypes;

/**
 * Register Additional Functionality to support the theme
 */
class Additional {

	protected $register_block_categories;
	protected $register_blocks;
	protected $acf_options_page;
	protected $add_svg_support;
	private $woocommerce;
	private $image_sizes;
	private $resource_enqeueuer;
	protected $gravity_forms;
	protected $register_post_types;
	/**
	 * @var Blocks
	 */
	private $blocks;
	/**
	 * @var Shortcodes
	 */
	private $shortcodes;


	/**
	 * Creates all the Classes
	 */
	public function __construct() {
		$this->shortcodes = new Shortcodes();
		$this->woocommerce               = new WooCommerceCustomization();
		$this->register_block_categories = new RegisterBlockCategory();
		$this->register_blocks           = new RegisterBlocks();
		$this->acf_options_page          = new AcfOptionsPage();
		$this->add_svg_support           = new AddSvgSupport();
		$this->image_sizes               = new ImageSizes();
		$this->resource_enqeueuer        = new ResourceEnqueuer();
		$this->gravity_forms             = new GravityForms();
		$this->register_post_types       = new RegisterPostTypes();
		$this->blocks                    = new Blocks();
	}

	/**
	 * Initializes the WordPress hooks
	 *
	 * @return void
	 */
	public function init_hooks() {
		$this->shortcodes->init_hooks();
		$this->woocommerce->init_hooks();
		$this->register_block_categories->init_hooks();
		$this->register_blocks->init_hooks();
		$this->acf_options_page->init_hooks();
		$this->add_svg_support->init_hooks();
		$this->image_sizes->init_hooks();
		$this->resource_enqeueuer->init_hooks();
		$this->gravity_forms->init_hooks();
		$this->register_post_types->init_hooks();
		$this->blocks->init_hooks();
	}
}
