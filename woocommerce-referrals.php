<?php

// orders created in WP Admin should be added as referrals if they have an affiliate coupon
add_action( 'woocommerce_new_order', 'rh_add_order_from_admin_to_referral', 10, 2 );

function rh_add_order_from_admin_to_referral( $order_id, $order ) {

	if ( $order->is_created_via( 'admin' ) ) {

		$coupons = $order->get_coupon_codes();

		$affiliate_found = false;

		foreach ( $coupons as $coupon_code ) {
			$coupon       = new WC_Coupon( $coupon_code );
			$affiliate_id = $coupon->get_meta( 'affwp_discount_affiliate' );
			if ( ! empty( $affiliate_id ) ) {
				$affiliate_found = true;
				break;
			}
		}

		if ( ! $affiliate_found ) {
			return;
		}

		// see if it exists as a referral already
		$referral = affwp_get_referral_by( 'reference', $order_id, 'woocommerce' );

		if ( 'AffWP\Referral' === $referral::class ) {
			return;
		}

		$afwoo = new Affiliate_WP_WooCommerce();
		$afwoo->add_pending_referral( $order_id );
	}
}

// skip auto complete referrals for processing orders
add_filter( 'affwp_auto_complete_referral', 'rh_check_order_status', 10, 2 );

function rh_check_order_status( $auto_complete, $referral ) {

	if ( 'woocommerce' !== $referral->context ) {
		return $auto_complete;
	}

	$order = wc_get_order( $referral->reference );

	if ( 'processing' === $order->get_status() ) {
		return false;
	}

	return $auto_complete;
}

// mark referral as pending when order status is processing
add_action( 'woocommerce_order_status_processing', 'rh_mark_referral_pending', 20, 1 );

function rh_mark_referral_pending( $order_id ) {
	// get affiliate referral by reference
	$referral = affwp_get_referral_by( 'reference', $order_id, 'woocommerce' );

	if ( 'AffWP\Referral' !== $referral::class ) {
		return;
	}

	// update referral status to pending
	affwp_set_referral_status( $referral, 'pending' );
}

// convert to USD if order currency is not USD
add_filter( 'affwp_insert_pending_referral', 'rh_convert_amounts_to_usd', 10, 8 );

function rh_convert_amounts_to_usd( $args, $amount, $reference, $description, $affiliate_id, $visit_id, $data, $context ) {

	if ( 'woocommerce' !== $context ) {
		return $args;
	}

	$order = wc_get_order( $reference );

	if ( empty( $order ) || $order->get_currency() === 'USD' ) {
		return $args;
	}

	$exchange_rate = $order->get_meta( '_wcpay_multi_currency_order_exchange_rate', true );
	if ( empty( $exchange_rate ) ) {
		error_log( 'No exchange rate fxround for order ' . $reference );

		return $args;
	}

	$args['description'] = 'Original Currency: ' . $order->get_currency() . ' - ' . $description;
	$args['amount']      = number_format( $args['amount'] / $exchange_rate, 2 );
	$args['order_total'] = number_format( $args['order_total'] / $exchange_rate, 2 );

	return $args;
}

add_filter( 'woocommerce_account_menu_items', 'rh_add_affiliate_area_to_my_account', 10, 2 );

// Add link to affiliate area in Woocommerce Account for AffiliateWP users
function rh_add_affiliate_area_to_my_account( $items, $endpoints ) {

	// only for affiliates
	if ( ! affwp_is_affiliate() ) {
		return $items;
	}

	unset( $items['customer-logout'] );
	$items['affiliate-area']  = 'Affiliate Area';
	$items['customer-logout'] = 'Logout';

	return $items;
}

function rh_update_affiliate_sheet( $user_id ) {
	rh_add_or_update_affiliate_sheet( $user_id, true );
}

add_action( 'woocommerce_customer_save_address', 'rh_update_affiliate_sheet', 10, 1 );

function rh_add_or_update_affiliate_sheet( $user_id, $update ) {
	$affiliate_id = affwp_get_affiliate_id( $user_id );
	$affiliate    = affwp_get_affiliate( $affiliate_id );
	$coupons      = affwp_get_dynamic_affiliate_coupons( $affiliate );
	// get the first coupon from coupons
	$coupon      = array_shift( $coupons );
	$coupon_code = $coupon['code'] ?: '';

	$user = get_user_by( 'id', $user_id );
	if ( ! $affiliate_id ) {
		return;
	}

	$client         = rh_get_google_client();
	$service        = new \Google_Service_Sheets( $client );
	$spreadsheet_id = '1-u5QKhgQcCrAFGBpmoiditOYnIrRZEmTrJ5vlKq2TfA';

	$data = array(
		$affiliate_id,
		$user->first_name,
		$user->last_name,
		$user->user_email,
		$affiliate->payment_email,
		$coupon_code,
		get_user_meta( $user->ID, 'billing_phone', true ),
		get_user_meta( $user->ID, 'billing_address_1', true ),
		get_user_meta( $user->ID, 'billing_address_2', true ),
		get_user_meta( $user->ID, 'billing_city', true ),
		get_user_meta( $user->ID, 'billing_state', true ),
		get_user_meta( $user->ID, 'billing_country', true ),
		get_user_meta( $user->ID, 'billing_postcode', true ),
		get_user_meta( $user->ID, 'shipping_address_1', true ),
		get_user_meta( $user->ID, 'shipping_address_2', true ),
		get_user_meta( $user->ID, 'shipping_city', true ),
		get_user_meta( $user->ID, 'shipping_state', true ),
		get_user_meta( $user->ID, 'shipping_country', true ),
		get_user_meta( $user->ID, 'shipping_postcode', true ),
		date( 'Y-m-d H:i:s' )
	);

	if ( $update ) {
		$range    = 'Updated Address!A:A';
		$response = $service->spreadsheets_values->get( $spreadsheet_id, $range );
		$values   = $response->getValues();

		foreach ( $values as $index => $row ) {
			if ( $row[0] == $affiliate_id ) { // Match affiliate_id in the first column
				$row_index = $index + 1; // Row numbers are 1-based in Google Sheets

				// Now you can edit the row as needed
				$update_range = "Updated Address!A{$row_index}:Z{$row_index}"; // Adjust the column range as necessary

				$new_values = array(
					$data // Replace with the actual values
				);

				$body   = new Google_Service_Sheets_ValueRange( [
					'values' => $new_values
				] );
				$params = [
					'valueInputOption' => 'RAW'
				];
				$service->spreadsheets_values->update( $spreadsheet_id, $update_range, $body, $params );

				break; // Stop after finding the correct row
			}
		}
	} else {
		$range  = 'Updated Address!A:Z';
		$values = [
			$data
		];

		$body   = new Google_Service_Sheets_ValueRange( [
			'values' => $values
		] );
		$params = [
			'valueInputOption' => 'RAW'
		];
		$service->spreadsheets_values->append( $spreadsheet_id, $range, $body, $params );
	}
}
