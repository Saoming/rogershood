<?php

namespace TenUpTheme\WooCommerceCustomization;

class Cart {

	// Initialize hooks to customize WooCommerce cart behavior
	public function init_hooks() {
		// Remove the default WooCommerce empty cart message
		remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );

		// Add a custom empty cart message
		add_action( 'woocommerce_cart_is_empty', array( $this, 'wc_empty_cart_message' ), 10 );

		// Change the default "Return to shop" button text
		add_filter( 'woocommerce_return_to_shop_text', array( $this, 'override_return_to_shop_text' ) );

		// Add a wrapper div before and after the cart for custom styling
		add_action( 'woocommerce_before_cart', array( $this, 'cart_intro' ), 10 );
		add_action( 'woocommerce_after_cart', array( $this, 'cart_outro' ), 10 );

		// Add a wrapper div around the cart collaterals for custom styling
		add_action( 'woocommerce_cart_collaterals', array( $this, 'cart_collaterals_start' ), 1 );
		add_action( 'woocommerce_cart_collaterals', array( $this, 'cart_collaterals_end' ), 20 );

		// Reorder the cart collaterals, moving the cart totals to a new position
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );
		add_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 9 );

		// Limit the number of cross-sell products to display to two
		add_filter( 'woocommerce_cross_sells_total', array( $this, 'override_cross_sells_total' ) );

		// Replace the remove (X) button with a custom image
		add_filter('woocommerce_cart_item_remove_link', array( $this, 'swap_the_remove_from_cart_image' ), 10, 3);

		// Add points information to the product name in the cart
		add_filter('woocommerce_cart_item_name', array( $this, 'add_point_to_the_product_name' ), 10, 3);

		// Remove default pay buttons and proceed to checkout buttons from their positions
		remove_action( 'woocommerce_proceed_to_checkout', 'wc_get_pay_buttons', 10 );
		remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );

		// Reorder the pay buttons and proceed to checkout buttons within cart collaterals
		add_action( 'woocommerce_cart_collaterals', 'wc_get_pay_buttons', 15 );
		add_action( 'woocommerce_cart_collaterals', 'woocommerce_button_proceed_to_checkout', 16 );
	}

	// Custom empty cart message HTML
	public function wc_empty_cart_message() {
		?>
		<div class="empty-cart__intro">
			<p class="empty-cart__intro-description">
				Your cart is empty
			</p>
		</div>
		<?php
	}

	// Override the return to shop button text to "Shop now"
	public function override_return_to_shop_text( $text ) {
		if ( is_cart() ) {
			$text = 'Shop now';
		}

		return $text;
	}

	// Add a wrapper div before the cart for custom styling
	public function cart_intro() {
		?>
		<div class="cart-wrapper">

		<?php
	}

	// Close the wrapper div after the cart
	public function cart_outro() {
		?>
		</div>
		<?php
	}

	// Add a wrapper div and title to the cart collaterals section for custom styling
	public function cart_collaterals_start() {
		?>
		<div class="cart-collaterals__inner">
		<h2>Summary</h2>
		<?php
	}

	// Close the wrapper div after the cart collaterals section
	public function cart_collaterals_end() {
		?>
		</div>
		<?php
	}

	// Override the total number of cross-sell products shown in the cart
	public function override_cross_sells_total( $total ) {
		if ( is_cart() ) {
			$total = 2;
		}

		return $total;
	}

	// Replace the default remove button (X) in the cart with a custom image
	public function swap_the_remove_from_cart_image($content) {
		$svg_icon = "<img src=\"" . TENUP_THEME_DIST_URL . "svg/remove-from-cart.svg\"/>";
		$content = str_replace('&times;', $svg_icon, $content);

		return $content;
	}

	// Add point information to the product name in the cart
	public function add_point_to_the_product_name($content) {
		if(is_cart()) {
			//TODO: Add point Logic
			$points = "{placeholder}";
			$content = $content . ' <div class="cart-product-name__point">Earn ' . $points . ' points</div>';
		}

		return $content;
	}
}
