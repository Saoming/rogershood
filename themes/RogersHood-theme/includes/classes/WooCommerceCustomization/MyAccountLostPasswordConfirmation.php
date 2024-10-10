<?php

namespace TenUpTheme\WooCommerceCustomization;

class MyAccountLostPasswordConfirmation {

	public function init_hooks() {
		add_action( 'woocommerce_before_lost_password_confirmation_message', array( $this, 'lost_password_page_wrapper_start' ), 10 );
		add_filter( 'woocommerce_lost_password_confirmation_message', array( $this, 'rh_woocommerce_lost_password_confirmation_message' ), 8 );
		add_action( 'woocommerce_after_lost_password_confirmation_message', array( $this, 'login_page_wrapper_end' ), 20 );
	}

	public function lost_password_page_wrapper_start() {
		?>
		<div class="login-page-wrapper ">
			<div class="rh-block rh-block--full-bleed  rh-login-page">
				<div class="row login-page--row">
					<div class="col-sm-12 col-md-6 bg-beige rh-login-page__photo-container">
						<img src="<?php echo esc_url(TENUP_THEME_DIST_URL . '/images/login-page-photo.png'); ?>"
							 alt="Login Page Photo"
								class="rh-login-page__image"/>
					</div>
					<div class="col-md-6 rh-login-page__form-container">
						<h1>Check your emails</h1>
		<?php
	}

	public function login_page_wrapper_end() {
		?>
					<a class="rh-button"
						   href="<?php echo esc_url( home_url() ); ?>">
							Go back
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	public function rh_woocommerce_lost_password_confirmation_message($message) {
		$message = 'We sent an email with the password reset instructions.';

		return wp_kses_post($message);
	}

}
