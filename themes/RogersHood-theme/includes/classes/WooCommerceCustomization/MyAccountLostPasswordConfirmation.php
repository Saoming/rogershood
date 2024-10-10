<?php

namespace TenUpTheme\WooCommerceCustomization;

class MyAccountLostPasswordConfirmation {

	public function init_hooks() {
		add_action( 'woocommerce_before_lost_password_form', array( $this, 'lost_password_page_wrapper_start' ), 10 );
		add_action( 'woocommerce_after_lost_password_form', array( $this, 'add_a_link_to_register_page' ), 8 );
		add_action( 'woocommerce_after_lost_password_form', array( $this, 'login_page_wrapper_end' ), 20 );
	}

	public function lost_password_page_wrapper_start() {
		custom_theme_error_log('woocommerce_before_lost_password_form');
		?>
		<div class="login-page-wrapper ">
			<div class="rh-block rh-block--full-bleed  rh-login-page">
				<div class="row">
					<div class="col-md-6 bg-beige rh-login-page__photo-container">
						<img src="<?php echo esc_url(TENUP_THEME_DIST_URL . '/images/login-page-photo.png'); ?>" alt="Login Page Photo" />
					</div>
					<div class="col-md-6 rh-login-page__form-container">
						<h1>Forgot Password?</h1>
		<?php
	}

	public function login_page_wrapper_end() {
		?>
						<div class="rh-login-page__register-link">
							<p>Don't have an account? <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></a></p>
						</div>
					</div>
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
