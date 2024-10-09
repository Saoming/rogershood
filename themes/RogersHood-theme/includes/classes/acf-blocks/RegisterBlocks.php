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
		$this->register_text_and_image_callout_block();
		$this->register_product_includes_block();
		$this->register_benefits_section_block();
		$this->register_community_cards_block();
		$this->register_hub_cards_block();
		$this->register_e_books_full_and_text_block();
		$this->register_two_images_and_content_block();
		$this->register_three_steps_block();
		$this->register_product_benefits_block();
		$this->register_product_directions_block();
		$this->register_text_and_gform_block();
		$this->register_about_us_block();
		$this->register_support_cards_block();
		$this->temp_sam_register_blocks();
	}


	// TODO: Remove the function and add the methods to the main one, this is to prevent merge conflicts
	public function temp_tome_register_blocks() {
		$this->register_faq_block();
		$this->register_ingredient_grid_block();

		$this->register_founders_block();
		$this->register_single_product_slider_block();
		$this->register_tiktok_feed_block();
		$this->register_point_information_block();
		$this->register_products_grid_block();
		$this->register_popular_reels_block();
		$this->register_post_grid_block();
		$this->register_category_links_block();
		$this->register_review_slider_block();
		$this->register_youtube_slider_block();
	}

	// TODO: Remove the function and add the methods to the main one, this is to prevent merge conflicts
	public function temp_sam_register_blocks() {
		$this->register_grid_text_quiz_blocks();
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

	protected function register_single_product_slider_block() {
		acf_register_block_type(
			array(
				'name'            => 'rh-single-product-slider',
				'title'           => __( 'Single Product Slider' ),
				'render_template' => 'partials/blocks/single-product-slider/single-product-slider.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'enqueue_assets'  => ResourceEnqueuer::enqueue_slick_assets(),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/Single-product-slider.jpg',
						),
					),
				),
			)
		);
	}

	protected function register_tiktok_feed_block() {
		acf_register_block_type(
			array(
				'name'            => 'rh-tiktok-feed',
				'title'           => __( 'TikTok Feed' ),
				'render_template' => 'partials/blocks/tiktok-feed/tiktok-feed.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/tiktok-feed.jpg',
						),
					),
				),
			)
		);
	}

	protected function register_point_information_block() {
		acf_register_block_type(
			array(
				'name'            => 'rh-point-information',
				'title'           => __( 'Point Information' ),
				'render_template' => 'partials/blocks/point-information/point-information.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/point-information.jpg',
						),
					),
				),
			)
		);

	}

	protected function register_products_grid_block() {
		acf_register_block_type(
			array(
				'name'            => 'rh-products-grid',
				'title'           => __( 'Products Grid' ),
				'render_template' => 'partials/blocks/products-grid/products-grid.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/products-grid.jpg',
						),
					),
				),
			)
		);

	}


	protected function register_popular_reels_block() {
		acf_register_block_type(
			array(
				'name'            => 'rh-popular-reels',
				'title'           => __( 'Popular Reels' ),
				'render_template' => 'partials/blocks/popular-reels/popular-reels.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'enqueue_assets'  => ResourceEnqueuer::enqueue_slick_assets(),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/popular-reels.jpg',
						),
					),
				),
			)
		);
	}


	protected function register_post_grid_block() {

		acf_register_block_type(
			array(
				'name'            => 'rh-post-grid',
				'title'           => __( 'Post Grid' ),
				'render_template' => 'partials/blocks/post-grid/post-grid.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/post-grid.jpg',
						),
					),
				),
			)
		);

	}

	protected function register_category_links_block() {
		acf_register_block_type(
			array(
				'name'            => 'rh-category-links',
				'title'           => __( 'Category Links' ),
				'render_template' => 'partials/blocks/category-links/category-links.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/category-links.jpg',
						),
					),
				),
			)
		);

	}

	protected function register_review_slider_block() {
		acf_register_block_type(
			array(
				'name'            => 'rh-review-slider',
				'title'           => __( 'Review Slider' ),
				'render_template' => 'partials/blocks/review-slider/review-slider.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'enqueue_assets'  => ResourceEnqueuer::enqueue_slick_assets(),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/review-slider.jpg',
						),
					),
				),
			)
		);
	}

	protected function register_youtube_slider_block() {
		acf_register_block_type(
			array(
				'name'            => 'rh-youtube-slider',
				'title'           => __( 'Youtube Slider' ),
				'render_template' => 'partials/blocks/youtube-slider/youtube-slider.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'enqueue_assets'  => ResourceEnqueuer::enqueue_slick_assets(),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/youtube-slider.jpg',
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
				'enqueue_assets'  => ResourceEnqueuer::register_splide_assets(),
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
	}

	/**
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

	/**
	 * Registers the E-books Image and Content
	 */
	protected function register_e_books_full_and_text_block() {
		acf_register_block_type(
			array(
				'name'            => 'e-books-full-and-text',
				'title'           => __( 'E-books Image and Content' ),
				'description'     => __( 'E-books Image and Content' ),
				'render_template' => 'partials/blocks/e-books-full-and-text/e-books-full-and-text.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/e-books-full-and-text.png',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the E-books Image and Content
	 */
	protected function register_two_images_and_content_block() {
		acf_register_block_type(
			array(
				'name'            => 'two-images-and-content',
				'title'           => __( 'Two Images and Content' ),
				'description'     => __( 'Two Images and Long Content' ),
				'render_template' => 'partials/blocks/two-images-and-content/two-images-and-content.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/two-images-and-content.jpg',
						),
					),
				),
			)
		);
	}


	/**
	 * Registers the E-books Image and Content
	 */
	protected function register_grid_text_quiz_blocks() {
		acf_register_block_type(
			array(
				'name'            => 'grid-text-quiz-section',
				'title'           => __( 'Grid and Text (Quiz Section)' ),
				'description'     => __( 'E-books Image and Content' ),
				'render_template' => 'partials/blocks/grid-text-quiz-section/grid-text-quiz-section.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/grid-text-quiz-section.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Three Steps Block
	 */
	protected function register_three_steps_block() {
		acf_register_block_type(
			array(
				'name'            => 'three-steps',
				'title'           => __( 'Three steps' ),
				'description'     => __( 'How it Works - Three Steps' ),
				'render_template' => 'partials/blocks/three-steps/three-steps.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/three-steps.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Product Benefits
	 */
	protected function register_product_benefits_block() {
		acf_register_block_type(
			array(
				'name'            => 'product-benefits',
				'title'           => __( 'Product Benefits' ),
				'description'     => __( 'Text part with icons on left; image on right' ),
				'render_template' => 'partials/blocks/product-benefits/product-benefits.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/product-benefits.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the Product Directions
	 */
	protected function register_product_directions_block() {
		acf_register_block_type(
			array(
				'name'            => 'product-directions',
				'title'           => __( 'Product Directions' ),
				'description'     => __( 'Text sections on left; image on left' ),
				'render_template' => 'partials/blocks/product-directions/product-directions.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/product-directions.jpg',
						),
					),
				),
			)
		);

	}

	/**
	 * Registers the Text and Gravity Form
	 */
	protected function register_text_and_gform_block() {
		acf_register_block_type(
			array(
				'name'            => 'rh-text-and-gform',
				'title'           => __( 'Text and Gravity Form' ),
				'description'     => __( 'Text sections on left; Form on right. Reach out to us section / reach out form' ),
				'render_template' => 'partials/blocks/text-and-gform/text-and-gform.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/text-and-gform.jpg',
						),
					),
				),
			)
		);
	}

	/**
	 * Registers the About US
	 */
	protected function register_about_us_block() {
		acf_register_block_type(
			array(
				'name'            => 'rh-about-us',
				'title'           => __( 'About Us' ),
				'description'     => __( 'About us Section' ),
				'render_template' => 'partials/blocks/about-us/about-us.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/about-us.jpg',
						),
					),
				),
			)
		);
	}
	/**
	 * Registers the Support Cards
	 */
	protected function register_support_cards_block() {
		acf_register_block_type(
			array(
				'name'            => 'rh-support-cards',
				'title'           => __( 'Support Cards' ),
				'description'     => __( 'Top Help search Section' ),
				'render_template' => 'partials/blocks/support-cards/support-cards.php',
				'mode'            => 'auto',
				'category'        => 'rogershood',
				'supports'        => array( 'anchor' => true ),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'block_preview' => TENUP_THEME_TEMPLATE_URL . '/block-preview/support-cards.jpg',
						),
					),
				),
			)
		);
	}
}
