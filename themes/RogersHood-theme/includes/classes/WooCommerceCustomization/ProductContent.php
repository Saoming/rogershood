<?php

namespace TenUpTheme\WooCommerceCustomization;

class ProductContent {

	public function init_hooks() {

		// Reworked the product content in the loop, modified the hook on product-content.php to pass the product
		add_action('woocommerce_before_shop_loop_item_title', array($this, 'change_single_product_content'),1 );
	}

	public function change_single_product_content() {

		if( is_cart()) {
			return;
		}

		global $product;


		remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

		remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );


		include( TENUP_THEME_PATH . 'partials/woocommerce/product/content-product-title.php');
		?>
		<?php
	}
}
