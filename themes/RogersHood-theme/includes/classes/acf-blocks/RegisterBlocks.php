<?php
/**
 * Registers ACF Blocks
 *
 * @package TenUpTheme
 */

namespace TenUpTheme\Blocks;
use TenUpTheme\Theme\ResourceEnqueuer;

/**
 * Handles Registration of the Custom Blocks
 */
class RegisterBlocks {

	/**
	 * Initializes WordPress Hooks
	 *
	 * @return void
	 */
	public function init_hooks() {
		add_action( 'acf/init', array( $this, 'register_custom_blocks' ) );
	}

	/**
	 * Registers the ACF Blocks
	 *
	 * @return void
	 */
	public function register_custom_blocks() {
		if ( ! function_exists( 'acf_register_block_type' ) ) {
			return;
		}
		$this->temp_tome_register_blocks();

		$this->register_hero_section_block();
		$this->register_benefits_section_block();
	}


//	TODO: Remove the function and add the methods to the main one, this is to prevent merge conflicts
	public function temp_tome_register_blocks() {
		$this->register_faq_block();
		$this->register_ingredient_grid_block();;
		$this->register_founders_block();
	}

	protected function register_faq_block() {
		acf_register_block_type(
			array(
				'name'            => 'rh-faq',
				'title'           => __( 'FAQs' ),
				'render_template' => 'partials/blocks/faq/faq.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/Faq.png',
						),
					),
				),
			)
		);
	}

	protected function register_ingredient_grid_block() {
		acf_register_block_type(
			array(
				'name'            => 'rh-ingredient-grid',
				'title'           => __( 'Ingredient Grid' ),
				'render_template' => 'partials/blocks/ingredient-grid/ingredient-grid.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'enqueue_assets'  => ResourceEnqueuer::enqueue_lightbox_assets(),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/Ingredient-grid.png',
						),
					),
				),
			)
		);
	}

	protected function register_founders_block() {
		acf_register_block_type(
			array(
				'name'            => 'rh-founders-slider',
				'title'           => __( 'Founders Slider' ),
				'render_template' => 'partials/blocks/founders-slider/founders-slider.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'enqueue_assets'  => ResourceEnqueuer::enqueue_slick_assets(),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/founders-slider.jpg',
						),
					),
				),
			)
		);
	}




	/**
	 * Registers the Hero Section block on the homepage
	 */
	protected function register_hero_section_block() {
		acf_register_block_type(
			array(
				'name'            => 'hero-section',
				'title'           => __( 'Hero Section' ),
				'render_template' => 'partials/blocks/hero-section/hero-section.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/Hero-Section.png',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Hero Section block on the homepage
	 */
	protected function register_benefits_section_block() {
		acf_register_block_type(
			array(
				'name'            => 'benefits-section',
				'title'           => __( 'Benefits Section' ),
				'render_template' => 'partials/blocks/benefits-section/benefits-section.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/Benefits-Section.png',
						),
					),
				),
			)
		);
	}
}
