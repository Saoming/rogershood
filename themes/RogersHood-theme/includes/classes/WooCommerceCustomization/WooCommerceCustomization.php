<?php

namespace TenUpTheme\WooCommerceCustomization;

/**
 *  Load all the WooCommerce Customization from here
 */
class WooCommerceCustomization {

	private $cart;
	private $product_customization;
	private $quantity_field;
	protected $my_account_register;
	private $my_account_login;
	private $my_asccount_forgot_password;

	public function __construct() {
		$this->cart                  = new Cart();
		$this->product_customization = new ProductContent();
		$this->quantity_field        = new QuantityField();
		$this->my_account_register   = new MyAccountRegister();
		$this->my_account_login      = new MyAccountLogin();
		$this->my_asccount_forgot_password  = new MyAccountForgotPassword();
	}

	public function init_hooks() {
		$this->cart->init_hooks();
		$this->product_customization->init_hooks();
		$this->quantity_field->init_hooks();
		$this->my_account_register->init_hooks();
		$this->my_account_login->init_hooks();
		$this->my_asccount_forgot_password->init_hooks();
	}
}
