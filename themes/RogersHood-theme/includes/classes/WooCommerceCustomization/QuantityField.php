<?php

namespace TenUpTheme\WooCommerceCustomization;

class QuantityField {

	public function init_hooks() {
		// Modify quantity field on the product page
		add_filter('woocommerce_quantity_input_args', array($this, 'modify_product_quantity_field'), 10, 2);

		// Modify quantity field on the cart page
		add_filter('woocommerce_cart_item_quantity', array($this, 'modify_cart_quantity_field'), 10, 3);
	}

	/**
	 * Modify quantity field on the product page to be a dropdown (1-10).
	 */
	public function modify_product_quantity_field($args, $product) {
		if (is_product()) {
			$args['input_type'] = 'select';
			$args['options'] = array_combine(range(1, 10), range(1, 10));
		}
		return $args;
	}

	/**
	 * Add plus and minus buttons to the quantity field on the cart page.
	 */
	public function modify_cart_quantity_field($product_quantity, $cart_item_key, $cart_item) {
		$product = $cart_item['data'];

		if ($product->is_sold_individually()) {
			return $product_quantity;
		}

		$quantity = $cart_item['quantity'];

		ob_start();
		?>
		<div class="quantity-field">
			<button class="cart-quantity-control js-cart-quantity-control minus" data-change="-1" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>">-</button>
			<input type="number" class="js-cart-quantity qty" name="cart[<?php echo esc_attr($cart_item_key); ?>][qty]" value="<?php echo esc_attr($quantity); ?>" />
			<button class="cart-quantity-control js-cart-quantity-control plus"  data-change="1" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>">+</button>
		</div>
		<?php
		return ob_get_clean();
	}
}
