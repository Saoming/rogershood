<section class="hero-slider-container rh-block bg-blue" id="<?php echo esc_attr( $args['id'] ); ?>" style="background: url('<?php echo esc_url( $args['hero_slider_background']['url'] ); ?>')">
				<div class="hero-slider-inner">
					<div class="hero-slider-inner-content">
						<div class="">
							<h1 class="hero-slider-section-final-title"><?php echo esc_attr( $args['hero_slider_heading'] ); ?>'</h1>
							<div class="wysig-video__container">
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
				</div>

</section>


