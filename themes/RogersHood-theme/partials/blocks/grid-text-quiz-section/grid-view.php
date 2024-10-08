<section class="grid-text-quiz-container rh-block" id="<?php echo esc_attr( $args['id'] ); ?>">
	<div class="grid-text-quiz-inner row">
		<div class="col-sm-12 col-lg-6">
			<div class="quiz-img-inner">
			<?php foreach ( $args['grid_image_repeater_grid_text'] as $grid_image_repeater_grid_text ) : ?>
				<img role="presentation" src="<?php echo esc_url( $grid_image_repeater_grid_text['image_grid_text']['url'] ); ?>" alt="<?php echo esc_attr( $grid_image_repeater_grid_text['image_grid_text']['alt'] ); ?>" />
			<?php endforeach; ?>
			</div>
		</div>
		<div class="col-sm-12 col-lg-6 text-center">
			<div class="sub-heading-grid-text-quiz"><?php echo esc_attr( $args['sub_heading_grid_text'] ); ?></div>
			<h2 class="heading-grid-text-quiz"><?php echo esc_attr( $args['heading_grid_text'] ); ?></h2>
			<div class="grid-text-wysig-video__container">
				<?php echo wp_kses_post( $args['description_grid_text'] ); ?>
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
