<?php

namespace TenUpTheme\WooCommerceCustomization;

class MyAccountRegister {

	public function init_hooks() {
		add_action( 'woocommerce_register_form_end', array( $this, 'add_sign_in_link' ) );
	}

	public function add_sign_in_link() {
		?>
		<div class="rh-login-page__register-link">
			<p>Already have an account? <a href="<?php echo esc_url(home_url('/my-account')); ?>"><?php esc_html_e( 'Sign in', 'woocommerce' ); ?></a></p>
		</div>
		<?php
	}


}
