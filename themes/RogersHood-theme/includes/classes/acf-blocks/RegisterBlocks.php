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
}
