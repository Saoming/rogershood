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
			$this->modify_cross_sell_product_display();
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

	public function modify_cross_sell_product_display() {
		if ( is_cart() ) {
			// Remove default hooks to change the layout
			remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

			// Add custom structure for the cart page cross-sell section
			add_action( 'woocommerce_before_shop_loop_item', array($this,'custom_cross_sell_product_link_open'), 10 );
			add_action( 'woocommerce_before_shop_loop_item_title', array($this,'custom_cross_sell_product_thumbnail'), 10 );
			add_action( 'woocommerce_shop_loop_item_title', array($this,'custom_cross_sell_product_title'), 10 );
			add_action( 'woocommerce_after_shop_loop_item_title', array($this,'custom_cross_sell_product_rating'), 5 );
			add_action( 'woocommerce_after_shop_loop_item_title', array($this,'custom_cross_sell_product_price'), 10 );
			add_action( 'woocommerce_after_shop_loop_item', array($this,'custom_cross_sell_add_to_cart'), 10 );
			add_action( 'woocommerce_after_shop_loop_item', array($this,'custom_cross_sell_product_link_close'), 5 );
		}
	}





	public function add_points_after_product_price( $product_price ) {
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



	// Open product link
	public function custom_cross_sell_product_link_open() {
		echo '<div class="cross-sell-item"><a href="' . esc_url( get_permalink() ) . '">';
	}

// Display custom product thumbnail
	public function custom_cross_sell_product_thumbnail() {
		global $product;
		echo '<div class="cross-sell-image">' . $product->get_image() . '</div>';
	}

// Display custom product title
	public function custom_cross_sell_product_title() {
		echo '<div class="cross-sell-details">';
		echo '<h3 class="woocommerce-loop-product__title">' . get_the_title() . '</h3>';
	}

// Display custom star rating
	public function custom_cross_sell_product_rating() {
		global $product;
		echo wc_get_rating_html( $product->get_average_rating() );
	}

// Display custom product price
	public function custom_cross_sell_product_price() {
		global $product;
		echo '<span class="price">' . $product->get_price_html() . '</span>';
	}

// Display custom add-to-cart button
	public function custom_cross_sell_add_to_cart() {
		woocommerce_template_loop_add_to_cart();
	}

// Close product link
	public function custom_cross_sell_product_link_close() {
		echo '</div></a></div>'; // Close the link and div
	}

}
