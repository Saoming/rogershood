<?php

namespace TenUpTheme\WooCommerceCustomization;

class Checkout {
	public function init_hooks() {
		add_action( 'woocommerce_before_checkout_form', [ $this, 'add_title_to_checkout' ] );

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_checkout_assets' ] );

		add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

		add_filter( 'woocommerce_quantity_input_type', [ $this, 'quantity_input_type' ] );

		add_action( 'woocommerce_custom_summary_table', [ $this, 'woocommerce_custom_summary_table' ] );

		add_action( 'wp_ajax_apply_custom_coupon', [$this, 'apply_custom_coupon_callback' ] );
		add_action( 'wp_ajax_nopriv_apply_custom_coupon', [$this, 'apply_custom_coupon_callback' ] );

		add_action( 'wp_ajax_update_cart_quantity', [$this,'update_cart_quantity'] );
		add_action( 'wp_ajax_nopriv_update_cart_quantity', [$this,'update_cart_quantity'] );

		add_filter('woocommerce_update_order_review_fragments', [ $this, 'update_order_review_fragment' ] );


		remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

		add_action( 'woocommerce_custom_end_table', [ $this, 'custom_end_table' ], 20 );

		add_action( 'woocommerce_checkout_process', [ $this, 'validate_terms_checkbox' ] );

		add_action( 'woocommerce_checkout_create_order', [ $this, 'save_optin_data_to_order' ], 10, 2 );

		add_action( 'woocommerce_admin_order_data_after_billing_address', [ $this, 'display_optin_data_in_admin_order' ] , 10, 1 );

		add_filter( 'wcpay_upe_appearance', [ $this, 'fix_payment_form' ] );

		add_filter( 'woocommerce_checkout_fields', [ $this, 'add_shipping_phone_field' ] );

		add_action( 'woocommerce_checkout_update_order_meta', [ $this, 'save_shipping_phone_field' ] );

		add_action( 'woocommerce_admin_order_data_after_shipping_address', [ $this, 'display_shipping_phone_in_admin_order' ], 10, 1 );

		add_filter( 'woocommerce_checkout_fields', [ $this, 'remove_company_fields' ] );
	}

	public function remove_company_fields( $fields ) {
		// Remove company name from billing
		unset( $fields['billing']['billing_company'] );

		// Remove company name from shipping
		unset( $fields['shipping']['shipping_company'] );

		return $fields;
	}

	public function display_shipping_phone_in_admin_order( $order ) {
		$shipping_phone = $order->get_meta( 'shipping_phone');
		if ( $shipping_phone ) {
			echo '<p><strong>' . __( 'Shipping Phone' ) . ':</strong> ' . $shipping_phone . '</p>';
		}
	}

	public function save_shipping_phone_field( $order_id ) {
		if ( ! empty( $_POST['shipping_phone'] ) ) {
			$order = wc_get_order( $order_id );
			$order->update_meta_data( 'shipping_phone', sanitize_text_field( $_POST['shipping_phone'] ) );
			$order->save();
		}
	}
	public function add_shipping_phone_field( $fields ) {
		// Add shipping phone field
		$fields['shipping']['shipping_phone'] = array(
			'type'        => 'tel',
			'label'       => __('Phone', 'woocommerce'),
			'required'    => true,  // Set to true if you want it to be required
			'class'       => array('form-row-wide'),
			'priority'    => 125,
		);
		return $fields;
	}

	public function fix_payment_form( $appearance ) {
		$appearance->rules->{'.Label'} = [
			'font-size' => '16px',
			'line-height' => 'normal',
			'font-family' => 'Sofia Pro',
		];
		$appearance->rules->{'#root'} = [
			'font-family' => 'Sofia Pro',
		];
		$appearance->rules->{'.Input'} = [
			'backgroundColor' => '#fff',
			'border' => '1px solid #EBEBEB',
			'padding' => '11px 19px',
			'box-shadow' => 'none',
			'font-family' => 'Sofia Pro',
		];
		$appearance->rules->{'.Input:focus'} = [
			'outline' => 'none',
			'box-shadow' => 'none',
		];
		$appearance->rules->{'.p-Input--focused'} = [
			'outline' => 'none',
			'box-shadow' => 'none',
		];
		$appearance->rules->{'.Input--invalid'} = [
			'backgroundColor' => '#fff',
			'border' => '1px solid #EBEBEB',
			'padding' => '11px 29px',
		];

		$appearance->fonts = [
			[
				'cssSrc'    => 'url('. get_stylesheet_directory_uri() .'/assets/css/frontend/woocommerce/style-for-stripe.css)',
			]
		];
		$appearance->theme = 'flat';
		$appearance->base = [
			'fontFamily' => 'Sofia Pro',
		];
		$appearance->variables = array(
			'fontFamily' => 'Sofia Pro',
			'fontWeightNormal' => '300',
			'fontLineHeight' => 'normal',
			'borderRadius' => '12px',
			'colorBackground' => '#fff',
			'colorPrimary' => '#121212',
			'accessibleColorOnColorPrimary' => '#5E5E5E',
			'colorText' => '#5E5E5E',
			'colorTextSecondary' => '#5E5E5E',
			'colorTextPlaceholder' => '#5E5E5E',
			'fontSizeBase' => '16px',
			'focusBoxShadow' => 'none',
			'fontSizeSm' => '16px',
		);

		return $appearance;
	}


	public function custom_end_table() {
		echo '<div class="custom-checkboxes">';

		// Required checkbox: Agree to terms
		woocommerce_form_field( 'agree_terms', array(
			'type'     => 'checkbox',
			'class'    => array('form-row terms'),
			'label'    => 'I have read and agree to the website <a href="#" target="_blank">terms and conditions</a>',
			'required' => true,
		));

		// Optional checkbox: Sign up for email updates
		woocommerce_form_field( 'email_optin', array(
			'type'  => 'checkbox',
			'class' => array('form-row email-updates'),
			'label' => 'Sign me up to receive email updates and news',
			'required' => false,
		));

		// Optional checkbox: Sign up for SMS updates
		woocommerce_form_field( 'sms_optin', array(
			'type'  => 'checkbox',
			'class' => array('form-row sms-updates'),
			'label' => 'Sign me up to receive SMS updates and news',
			'required' => false,
		));

		echo '<p>By checking this box and entering your phone number above, you consent to receive marketing text messages (such as [promotion codes] and [cart reminders]) from [company name] at the number provided, including messages sent by autodialer. Consent is not a condition of any purchase. Message and data rates may apply. Message frequency varies. You can unsubscribe at any time by replying STOP or clicking the unsubscribe link (where available) in one of our messages. View our Privacy Policy and Terms of Service</p>';

		echo '</div>';
	}


	// Handle AJAX request to update cart quantity

	public function update_cart_quantity() {
		if ( isset( $_POST['cart_item_key'], $_POST['qty'] ) ) {
			$cart_item_key = sanitize_text_field( $_POST['cart_item_key'] );
			$new_quantity = intval( $_POST['qty'] );

			if ( $new_quantity > 0 ) {
				// Update the cart quantity
				WC()->cart->set_quantity( $cart_item_key, $new_quantity );
				WC()->cart->calculate_totals();

				wp_send_json_success();
			} else {
				wp_send_json_error( 'Invalid quantity.' );
			}
		} else {
			wp_send_json_error( 'Missing parameters.' );
		}

		wp_die(); // Required to terminate properly
	}

	public function apply_custom_coupon_callback() {
		// Check if a coupon code is passed
		if ( ! isset( $_POST['coupon_code'] ) || empty( $_POST['coupon_code'] ) ) {
			wp_send_json_error( __( 'No coupon code provided.', 'woocommerce' ) );
			wp_die();
		}

		$coupon_code = sanitize_text_field( $_POST['coupon_code'] );

		// Apply the coupon using WooCommerce's built-in function
		$coupon_applied = WC()->cart->apply_coupon( $coupon_code );

		if ( $coupon_applied ) {
			// If the coupon is successfully applied, respond with success
			wp_send_json_success();
		} else {
			// If coupon application fails, show an error message
			$error = WC()->cart->get_coupon_error_message( WC()->cart->get_last_error() );
			wp_send_json_error( $error );
		}

		wp_die();
	}

	public function quantity_input_type( $type ) {
		if ( apply_filters( 'fix_custom_type', false ) ) {
			$type = 'text';
		}
		return $type;
	}

	public function add_title_to_checkout() {
		?>
		<h1 class="wp-block-heading has-text-align-center"><?php the_title(); ?></h1>
		<?php
	}

	public static function enqueue_checkout_assets() {
		if(!function_exists('is_checkout')) {
			return;
		}

		if ( \is_checkout() ) {
			wp_enqueue_style(
				'theme-woocommerce-checkout',
				TENUP_THEME_TEMPLATE_URL . '/assets/css/frontend/woocommerce/checkout.css',
			);

			//TODO: fix versioning
			wp_register_script(
				'theme-woocommerce-checkout',
				TENUP_THEME_TEMPLATE_URL . '/assets/js/frontend/woocommerce/checkout.js'
			);
			wp_localize_script( 'theme-woocommerce-checkout', 'dvlp_checkout', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
			wp_enqueue_script( 'theme-woocommerce-checkout' );
		}
	}



	public function woocommerce_custom_summary_table() {
		$order_button_text = apply_filters( 'woocommerce_pay_order_button_text', __( 'Place order', 'woocommerce' ) );
		?>
		<div class="woocommerce-checkout-review-order-table-new">
			<h4><?php esc_html_e( 'Summary', 'woocommerce' ); ?></h4>
			<table class="shop_table woocommerce-checkout-review-order-table-new">
				<tbody>
					<?php
					do_action( 'woocommerce_review_order_before_cart_contents' );

					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
						/**
						 * Filter the product name.
						 *
						 * @since 2.1.0
						 * @param string $product_name Name of the product in the cart.
						 * @param array $cart_item The product in the cart.
						 * @param string $cart_item_key Key for the product in the cart.
						 */
						$product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
						?>
						<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
							<td class="product-thumbnail">
								<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

								if ( ! $product_permalink ) {
									echo $thumbnail; // PHPCS: XSS ok.
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
								}
								?>
							</td>
							<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
								<?php
								if ( ! $product_permalink ) {
									echo wp_kses_post( $product_name . '&nbsp;' );
								} else {
									/**
									 * This filter is documented above.
									 *
									 * @since 2.1.0
									 */
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
								}

								do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

								// Meta data.
								echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

								// Backorder notification.
								if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
								}
								?>
								<br/>
								<?php
								if ( $_product->is_sold_individually() ) {
									$min_quantity = 1;
									$max_quantity = 1;
								} else {
									$min_quantity = 0;
									$max_quantity = $_product->get_max_purchase_quantity();
								}

								add_filter( 'fix_custom_type', '__return_true', 10 );

								$product_quantity = woocommerce_quantity_input(
									array(
										'input_name'   => "cart[{$cart_item_key}][qty]",
										'input_value'  => $cart_item['quantity'],
										'max_value'    => $max_quantity,
										'min_value'    => $min_quantity,
										'product_name' => $product_name,
										'readonly' => 1,
										'type' => 'text',
									),
									$_product,
									false
								);

								remove_filter( 'fix_custom_type', '__return_true', 10 );

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
								?>
							</td>
							<td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
								<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
								?>
							</td>
						</tr>

						<?php
					}
					?>
					<tr>
						<td class="divider-line" colspan="3">
							<hr/>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<div class="custom-coupon-section">
								<?php woocommerce_checkout_coupon_form(); // Echo the coupon form ?>
							</div>
						</td>
					</tr>
				</tbody>
				<tfoot>

				<tr class="cart-subtotal">
					<th colspan="2"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
					<td><?php wc_cart_totals_subtotal_html(); ?></td>
				</tr>

				<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
					<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<th colspan="2"><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
						<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
					</tr>
				<?php endforeach; ?>

				<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

					<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

					<?php wc_cart_totals_shipping_html(); ?>

					<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

				<?php endif; ?>

				<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
					<tr class="fee">
						<th colspan="2"><?php echo esc_html( $fee->name ); ?></th>
						<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
					</tr>
				<?php endforeach; ?>

				<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
					<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
						<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
							<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
								<th colspan="2"><?php echo esc_html( $tax->label ); ?></th>
								<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr class="tax-total">
							<th colspan="2"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
							<td><?php wc_cart_totals_taxes_total_html(); ?></td>
						</tr>
					<?php endif; ?>
				<?php endif; ?>

				<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

				<tr class="order-total">
					<th colspan="2"><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
					<td><?php wc_cart_totals_order_total_html(); ?></td>
				</tr>
				<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
				</tfoot>
			</table>
			<div class="aligncenter">
				<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

				<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt' . esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ) . '" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine ?>

				<?php do_action( 'woocommerce_review_order_after_submit' ); ?>
			</div>

		</div>

		<?php
	}

	public function update_order_review_fragment( $fragments ) {
		ob_start();
		$this->woocommerce_custom_summary_table();
		$fragments['div.woocommerce-checkout-review-order-table-new'] = ob_get_clean();
		return $fragments;
	}

	public function validate_terms_checkbox() {
		if ( ! isset( $_POST['agree_terms'] ) ) {
			wc_add_notice( __( 'You must agree to the terms and conditions to proceed.' ), 'error' );
		}
	}

	public function save_optin_data_to_order( $order, $data ) {
		if ( isset( $_POST['email_optin'] ) ) {
			$order->update_meta_data( 'email_optin', 'yes' ); // Store 'yes' if the checkbox is checked
		} else {
			$order->update_meta_data( 'email_optin', 'no' );
		}

		if ( isset( $_POST['sms_optin'] ) ) {
			$order->update_meta_data( 'sms_optin', 'yes' ); // Store 'yes' if the checkbox is checked
		} else {
			$order->update_meta_data( 'sms_optin', 'no' );
		}
	}

	public function display_optin_data_in_admin_order( $order ) {
		$email_optin = $order->get_meta( 'email_optin' );
		$sms_optin = $order->get_meta( 'sms_optin' );

		echo '<p><strong>Email Updates Opt-in:</strong> ' . ucfirst( $email_optin ) . '</p>';
		echo '<p><strong>SMS Updates Opt-in:</strong> ' . ucfirst( $sms_optin ) . '</p>';
	}
}
// woocommerce_before_checkout_form

