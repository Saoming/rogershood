<?php

namespace TenUpTheme\WooCommerceCustomization;

class MyAccountAccount {

	public function init_hooks() {
		add_action( 'woocommerce_edit_account_form_start', array( $this, 'woocommerce_edit_account_form_start' ), 10 );
		add_action( 'woocommerce_edit_account_form_fields', array( $this, 'woocommerce_edit_account_form_fields' ), 8 );
		add_action( 'woocommerce_edit_account_form', array( $this, 'woocommerce_edit_account_form' ), 20 );
	}

	public function woocommerce_edit_account_form_start() {
		?>
		<div class="row login-page--row">
			<div class="col-sm-12 col-md-6 rh_account_page_column rh_account_page_column--right">
				<legend>Account Information</legend>
		<?php
	}

	public function woocommerce_edit_account_form_fields() {
		?>
			</div>
		<div class="col-sm-12 col-md-6 rh_account_page_column rh_account_page_column--left">
		<?php
	}

	public function woocommerce_edit_account_form() {
		?>
			</div>
		</div>
		<?php
	}
}
