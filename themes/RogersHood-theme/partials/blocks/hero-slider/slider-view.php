<section class="hero-slider-container rh-block bg-blue" id="<?php echo esc_attr( $args['id'] ); ?>" style="background: url('<?php echo esc_url( $args['hero_slider_background']['url'] ); ?>'; background-repeat: no-repeat; background-size: cover;)">
	<div class="hero-slider-inner">
		<div class="hero-slider-inner-content">
			<div class="hero-slider-inner-content-text">
				<h1 class="hero-slider-section-final-title"><?php echo esc_attr( $args['hero_slider_heading'] ); ?></h1>
				<div class="wysig-hero-slider__container">
					<?php echo wp_kses_post( $args['hero_slider__description'] ); ?>
				</div>
			</div>

			<?php if ( $args['hero_slider_cta'] ) : ?>
			<a
				class="rh-button"
				href="<?php echo esc_url( $args['hero_slider_cta']['link'] ); ?>"
				aria-label="Link to <?php esc_attr( $args['hero_slider_cta']['title'] ); ?> page"
				target="<?php echo esc_attr( $args['hero_slider_cta']['target'] ); ?>"
			>
				<?php echo esc_html( $args['hero_slider_cta']['title'] ); ?>
			</a>
			<?php endif; ?>
		</div>

		<?php if ( $args['hero_slider_repeater'] ) : ?>
			<div class="hero-slider-inner-swiper-container">
				<div class="swiper">
					<div class="swiper-wrapper">
						<?php foreach ( $args['hero_slider_repeater'] as $slider_item ) : ?>
							<div class="swiper-slide">
								<a href="<?php echo esc_url( $slider_item['hero_product_url'] ); ?>" class="hero-product-slider" aria-label="Link to <?php echo esc_attr( $slider_item['hero_repeater_title'] ); ?> shop page">
									<div class="product-slider-shadow"></div>
									<img class="hero-slider-img" src="<?php echo esc_url( $slider_item['hero_slider_image']['url'] ); ?>" alt="<?php echo esc_attr( $slider_item['hero_slider_image']['alt'] ); ?>" />
									<div class="hero-slider-text-container text-center">
										<h5> <?php echo esc_attr( $slider_item['hero_repeater_title'] ); ?></h5>
										<div><?php echo esc_attr( $slider_item['hero_reward_points'] ); ?></div>
										<div><?php echo esc_attr( $slider_item['hero_price'] ); ?></div>
									</div>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

		<?php endif; ?>
	</div>
</section>


