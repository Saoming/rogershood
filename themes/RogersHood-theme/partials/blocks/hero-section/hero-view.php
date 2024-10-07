<section class="hero-container rh-block bg-blue" id="<?php echo esc_attr( $args['id'] ); ?>" style="background: url('<?php echo esc_url( $args['hero_background']['url'] ); ?>')">
				<div class="hero-inner row">
					<div class="col-sm-12 col-lg-6 text-center">
						<h1 class="hero-section-final-title"><?php echo esc_attr( $args['hero_heading'] ); ?></h1>
						<div class="wysig-video__container">
							<?php echo wp_kses_post( $args['hero_description'] ); ?>
						</div>
						<?php if ( $args['cta'] ) : ?>
						<a
							class="button"
							href="<?php echo esc_url( $args['cta']['link'] ); ?>"
							aria-label="Link to <?php esc_attr( $args['cta']['title'] ); ?> page"
							target="<?php echo esc_attr( $args['cta']['target'] ); ?>"
						>
							<?php echo esc_html( $args['cta']['title'] ); ?>
						</a>
						<?php endif; ?>
					</div>

					<video class="col-sm-12 col-lg-6 w-full object-cover" controls poster="<?php echo esc_url( $args['video_poster_image']['url'] ); ?>" >
						<source src="<?php echo esc_url( $args['hero_video'] ); ?>" type="video/mp4" />
					</video>
				</div>

</section>


