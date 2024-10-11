<section class="top-search-container bg-blue rh-block" id="<?php echo esc_attr( $args['id'] ); ?>">
	<div class="row">
		<div class="top-search-inner text-center">
			<h2 class="top-search-title"><?php echo esc_attr( $args['top_help_search_title'] ); ?></h2>
			<div class="wysig-top-search__container">
				<?php echo wp_kses_post( $args['top_help_search_description'] ); ?>
			</div>
			<?php if ( $args['activate_search'] ) : ?>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<svg class="w-full" preserveAspectRatio="none" width="1440" height="67" viewBox="0 0 1440 67" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M5.49237e-06 0.000164195L1440 0.000297546C1440 0.000297546 1304.38 43.8519 1121.88 28.0871C939.391 12.3222 632.413 12.1748 415.845 51.4311C203.435 89.9337 1.96444e-06 42.7471 1.96444e-06 42.7471L5.49237e-06 0.000164195Z" fill="#E0EAF"/>
</svg>
