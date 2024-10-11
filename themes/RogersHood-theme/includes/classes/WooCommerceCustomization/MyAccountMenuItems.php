<?php

namespace TenUpTheme\WooCommerceCustomization;

class MyAccountMenuItems {

	public function init_hooks() {
		add_action( 'woocommerce_account_menu_items', array( $this, 'woocommerce_account_menu_items' ), 10 );
	}

	public function woocommerce_account_menu_items( $items ) {

		if ( isset( $items['dashboard'] ) ) {
			unset( $items['dashboard'] );
		}

		// Rename 'Orders' to 'My Orders'
		if ( isset( $items['orders'] ) ) {
			$items['orders'] = 'My Orders';
		}

		// Rename 'Orders' to 'My Orders'
		if ( isset( $items['orders'] ) ) {
			$items['edit-address'] = 'Billing and Shipping Address';
		}

		if ( isset( $items['downloads'] ) ) {
			$downloads = $items['downloads'];
			unset( $items['downloads'] ); // Remove it from the current position
		}

		// Add 'Downloads' before 'Logout'
		if ( isset( $items['customer-logout'] ) ) {
			$logout = $items['customer-logout'];
			unset( $items['customer-logout'] ); // Temporarily remove 'Logout'

			// Reinsert 'Downloads' and 'Logout' in the correct order
			$items['downloads']       = $downloads;
			$items['customer-logout'] = $logout;
		}
		return $items;
	}
}
