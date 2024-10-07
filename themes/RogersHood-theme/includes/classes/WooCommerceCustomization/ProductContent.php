<?php

namespace TenUpTheme\WooCommerceCustomization;

class ProductContent {

	public function init_hooks() {

		// Reworked the product content in the loop, modified the hook on product-content.php to pass the product
		add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'change_single_product_content' ), 1 );
		add_filter( 'get_price_html', array( $this, 'add_points_after_product_price' ), 10 );
		add_action( 'woocommerce_before_single_product', array( $this, 'add_starting_tag' ), 1 );
		add_action( 'woocommerce_after_single_product', array( $this, 'add_ending_tag' ), 1 );
	}

	public function change_single_product_content() {

		if ( is_cart() ) {
			return;
		}

		global $product;


		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );


		include( TENUP_THEME_PATH . 'partials/woocommerce/product/content-product-title.php' );
		?>
		<?php
	}

	public function add_points_after_product_price( $product_price ) {
		$product_price = 'asd';

		return $product_price;
	}

	public function add_starting_tag() {
		if ( ! is_product() ) {
			return;
		}
		echo '<div class="page-container"><div class="container">';
	}

	public function add_ending_tag() {
		if ( ! is_product() ) {
			return;
		}
		ob_start();
		?>
		</div></div>
		<?php

		include TENUP_THEME_PATH . 'partials/woocommerce/product/add-to-cart-bar.php';
		echo ob_get_clean();
	}
}
