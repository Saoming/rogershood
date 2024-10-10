<?php

namespace TenUpTheme\WooCommerceCustomization;

class ShopContent {

	public function init_hooks() {
		add_action( 'woocommerce_after_shop_loop', array( $this, 'add_content_after_the_shop_loop' ) );
	}

	public function add_content_after_the_shop_loop() {
		$pattern_id = get_field( 'shop_page_pattern_id', 'option' );


		if ( ! $pattern_id ) {
			return;
		}

		$pattern = get_post( $pattern_id );

		if ( ! $pattern ) {
			return;
		}

		?>
		</section>
			<div class="page-container">
				<?php echo apply_filters( 'the_content', $pattern->post_content ); ?>
			</div>
		<section>

		<?php
	}

}
