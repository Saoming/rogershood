<?php

namespace TenUpTheme\Shortcodes;

class RegisterPage {

	public function init_hooks() {
//		add_shortcode( 'rh_woocommerce_registration_form', array( $this, 'render_separate_registration_form' ) );
	}

	/**
	 * https://www.businessbloomer.com/woocommerce-separate-login-registration/
	 */
	public function render_separate_registration_form() {
		if ( is_user_logged_in() ) return '<p>You are already registered</p>';

		ob_start();
		do_action( 'woocommerce_before_customer_login_form' );

		// Get the registration form template
		$html = wc_get_template_html( 'myaccount/form-login-with-register.php' );

		// Use DOMDocument to manipulate the HTML
		$dom = new \DOMDocument();

		// Suppress warnings for invalid HTML structures and ensure proper UTF-8 handling
		libxml_use_internal_errors(true);

		// Load the HTML without utf8_decode since WooCommerce already uses UTF-8
		$dom->loadHTML('<?xml encoding="UTF-8">' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

		// Clear libxml errors after loading
		libxml_clear_errors();

		// Use DOMXPath to find the registration form
		$xpath = new \DOMXPath( $dom );
		$form = $xpath->query( '//form[contains(@class,"register")]' )->item(0);

		// Check if the form was found and output it
		if ($form) {
			echo $dom->saveHTML($form);
		} else {
			// Return an error message if the form is not found
			echo '<p>Registration form not found.</p>';
		}

		return ob_get_clean();
	}
}
