<?php

namespace TenUpTheme\WooCommerceCustomization;

class MyAccountLogin {

	public function init_hooks() {
		add_action( 'woocommerce_before_customer_login_form', array( $this, 'login_page_wrapper_start' ), 10 );
		add_action( 'woocommerce_after_customer_login_form', array( $this, 'add_a_link_to_register_page' ), 8 );
		add_action( 'woocommerce_after_customer_login_form', array( $this, 'login_page_wrapper_end' ), 20 );
	}

	public function login_page_wrapper_start() {
		?>
		<div class="login-page-wrapper">
			<div class="rh-block rh-block--full-bleed rh-login-page">
				<div class="row">
					<div class="col-md-6 bg-beige rh-login-page__photo-container">
						<img src="<?php echo esc_url(TENUP_THEME_DIST_URL . '/images/login-page-photo.png'); ?>" alt="Login Page Photo" />
					</div>
					<div class="col-md-6 rh-login-page__form-container">
		<?php
	}

	public function login_page_wrapper_end() {
		?>
					</div>
				</div>
			</div>
		<?php
	}

	public function add_a_link_to_register_page() {
		?>
		<?php
	}

}
