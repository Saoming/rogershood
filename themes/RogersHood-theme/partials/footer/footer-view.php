<footer role="contentinfo" class="footer__container page-container">
	<div class="footer_subscribe__container show-on-mobile">
		<h3 class="footer_subscribe_heading">Join Our Hood</h3>
		<p class="footer_subscribe_text">Promos, product launches, and events delivered straight to your inbox</p>
		<div class="footer_subscribe_form">
			<?php echo do_shortcode( '[gravityform name="Subscribe" title="false" description="false" ajax="true"]' ); ?>
		</div>
	</div>
	<div class="footer_menu__container">
		<div class="footer_menu__container_columns">
			<h3 class="footer_menu_heading">Shop</h3>
			<?php echo wp_kses_post( $args['footer_shop'] ); ?>
		</div>
		<div class="footer_menu__container_columns">
			<h3 class="footer_menu_heading">Learn</h3>
			<?php echo wp_kses_post( $args['footer_learn'] ); ?>
		</div>
		<div class="footer_menu__container_columns">
			<h3 class="footer_menu_heading">Connect</h3>
			<?php echo wp_kses_post( $args['footer_connect'] ); ?>
		</div>
		<div class="footer_menu__container_columns">
			<h3 class="footer_menu_heading">General</h3>
			<?php echo wp_kses_post( $args['footer_general'] ); ?>
		</div>
	</div>

	<div class="footer_simple_content__container">
		<div class="footer_subscribe__container show-on-desktop">
			<h3 class="footer_subscribe_heading">Join Our Hood</h3>
			<p class="footer_subscribe_text">Promos, product launches, and events delivered straight to your inbox</p>
			<div class="footer_subscribe_form">
				<?php echo do_shortcode( '[gravityform name="Subscribe" title="false" description="false" ajax="true"]' ); ?>
			</div>
		</div>
		<div class="footer_disclaimer__container">
			<h3 class="footer_disclaimer_heading">Disclaimer</h3>
			<p class="footer_disclaimer_text"><?php echo esc_textarea( $args['disclaimer'] ); ?></p>
		</div>
	</div>
</footer>
