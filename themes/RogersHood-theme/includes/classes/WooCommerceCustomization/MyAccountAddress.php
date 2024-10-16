<?php

namespace TenUpTheme\WooCommerceCustomization;

class MyAccountAddress {

	public function init_hooks() {
//		add_action( 'woocommerce_before_edit_account_address_form', array(
//			$this,
//			'rh_woocommerce_before_edit_account_address_form'
//		) );
//		add_filter( 'woocommerce_my_account_edit_address_title ', array(
//			$this,
//			'rh_woocommerce_my_account_edit_address_title'
//		), 10, 2);
	}

	public function rh_woocommerce_before_edit_account_address_form( $items ) {

		?>
		<h1>Address</h1>
		<?php
	}
	public function rh_woocommerce_my_account_edit_address_title( $page_title, $load_address  ) {
//	$page_title="address";
//	$load_address='billing';
//		return $page_title;
	}
}
