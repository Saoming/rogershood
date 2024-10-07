<section class="hero-container bg-blue rh-block" id="<?php echo esc_attr( $args['id'] ); ?>" style="background: url('<?php echo esc_url( $args['hero_background']['url'] ); ?>'); background-size: cover; background-repeat: no-repeat;">
	<div class="hero-inner row">
		<div class="hero-child-inner text-center">
			<h1 class="hero-section-final-title"><?php echo esc_attr( $args['hero_heading'] ); ?></h1>
			<div class="wysig-video__container">
				<?php echo wp_kses_post( $args['hero_description'] ); ?>
			</div>
			<?php if ( $args['cta'] ) : ?>
			<a
				class="button-rh"
				href="<?php echo esc_url( $args['cta']['link'] ); ?>"
				aria-label="Link to <?php esc_attr( $args['cta']['title'] ); ?> page"
				target="<?php echo esc_attr( $args['cta']['target'] ); ?>"
			>
				<?php echo esc_html( $args['cta']['title'] ); ?>
			</a>
			<?php endif; ?>
		</div>
	</div>
</section>
<svg class="w-full" preserveAspectRatio="none" width="1440" height="62" viewBox="0 0 1440 62" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M5.49237e-06 -7.6895e-05L1440 4.57764e-05C1440 4.57764e-05 1304.38 40.3397 1121.88 25.8374C939.391 11.3351 632.413 11.1995 415.845 47.3118C203.435 82.7309 1.96444e-06 39.3233 1.96444e-06 39.3233L5.49237e-06 -7.6895e-05Z" fill="#E0EAF"/>
</svg>
