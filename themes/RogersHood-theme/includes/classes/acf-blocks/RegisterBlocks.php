<?php
/**
 * Registers ACF Blocks
 *
 * @package TenUpTheme
 */

namespace TenUpTheme\Blocks;

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
		$this->register_hero_section_block();
		$this->register_text_and_image_callout_block();
		$this->register_product_includes_block();
		$this->register_benefits_section_block();
		$this->register_community_cards_block();
		$this->register_hub_cards_block();
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
	 * Registers the Content and Image Full Width Block
	 */
	protected function register_text_and_image_callout_block() {
		acf_register_block_type(
			array(
				'name'            => 'text-and-image-callout',
				'title'           => __( 'Text and Image Callout' ),
				'description'     => __( 'Half screen content / half screen image' ),
				'render_template' => 'partials/blocks/text-and-image-callout/text-and-image-callout.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/text-and-image-callout.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Product What Is It  Block
	 */
	protected function register_product_includes_block() {
		acf_register_block_type(
			array(
				'name'            => 'product-includes',
				'title'           => __( 'Product Includes' ),
				'description'     => __( 'Half screen explaining what is it, helps with and ingredients for Product / half screen image' ),
				'render_template' => 'partials/blocks/product-includes/product-includes.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/product-includes.jpg',
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

	/**
	 * Registers the Commuinity Cards
	 */
	protected function register_community_cards_block() {
		acf_register_block_type(
			array(
				'name'            => 'community-cards',
				'title'           => __( 'Commuinity Cards' ),
				'description'     => __( 'Commuinity Cards' ),
				'render_template' => 'partials/blocks/community-cards/community-cards.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/community-cards.jpg',
						),
					),
				),
			)
		);
	}	/**
	 * Registers the Hub Cards
	 */
	protected function register_hub_cards_block() {
		acf_register_block_type(
			array(
				'name'            => 'hub-cards',
				'title'           => __( 'Hub Cards' ),
				'description'     => __( 'Hub Cards' ),
				'render_template' => 'partials/blocks/hub-cards/hub-cards.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/hub-cards.jpg',
						),
					),
				),
			)
		);
	}

}
