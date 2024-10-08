<?php

namespace TenUpTheme\WooCommerceCustomization;

/**
 *  Load all the WooCommerce Customization from here
 */
class WooCommerceCustomization {

	private Cart $cart;
	private ProductContent $product_customization;
	private QuantityField $quantity_field;

	public function __construct() {
		$this->cart                  = new Cart();
		$this->product_customization = new ProductContent();
		$this->quantity_field        = new QuantityField();
	}

	public function init_hooks() {
		$this->cart->init_hooks();
		$this->product_customization->init_hooks();
		$this->quantity_field->init_hooks();
	}
}
