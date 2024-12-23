<?php

namespace TenUpTheme\WooCommerceCustomization;

/**
 *  Load all the WooCommerce Customization from here
 */
class WooCommerceCustomization {

	private $cart;
	private $checkout;
	private $product_customization;
	private $quantity_field;
	protected $my_account_register;
	private $my_account_login;
	private $my_asccount_menu_items;
	private $shop_content;
	private $my_account_lost_password;
	private $my_account_lost_password_confirmation;
	private $my_account_address;
	private $my_account_account;

	public function __construct() {
		$this->cart                        = new Cart();
		$this->checkout                    = new Checkout();
		$this->product_customization                 = new ProductContent();
		$this->quantity_field                        = new QuantityField();
		$this->my_account_register                   = new MyAccountRegister();
		$this->my_account_login                      = new MyAccountLogin();
		$this->my_account_menu_items                 = new MyAccountMenuItems();
		$this->shop_content                          = new ShopContent();
		$this->my_account_lost_password              = new MyAccountLostPassword();
		$this->my_account_lost_password_confirmation = new MyAccountLostPasswordConfirmation();
		$this->my_account_address                    = new MyAccountAddress();
		$this->my_account_account                    = new MyAccountAccount();

	}

	public function init_hooks() {
		$this->cart->init_hooks();
		$this->checkout->init_hooks();
		$this->product_customization->init_hooks();
		$this->quantity_field->init_hooks();
		$this->my_account_register->init_hooks();
		$this->my_account_login->init_hooks();
		$this->my_account_menu_items->init_hooks();
		$this->shop_content->init_hooks();
		$this->my_account_lost_password->init_hooks();
		$this->my_account_lost_password_confirmation->init_hooks();
		$this->my_account_address->init_hooks();
		$this->my_account_account->init_hooks();
	}
}
