<?php
/**
 * Renders the Founders Slider
 */

$title    = get_field( 'title' );
$founders = get_field( 'founders' );

if ( ! get_field( 'block_preview' ) ) {


	?>
	<div class="rh-block founders-slider bg-beige">
		<div class="container">
			<div class="founders-slider__slider">
				<?php if ( $founders ) {
					foreach ( $founders as $key => $founder ) {
						?>
						<div class="founders-slider__slide">
							<div class="founders-slider__inner">
								<div class="founders-slider__image">
									<div class="founders-slider__image-container">
										<?php echo wp_get_attachment_image( $founder['image'], 'full' ); ?>
										<div
											class="founders-slider__nickname text-font-scilla text-body-18 text-center">
											<?php echo esc_html( $founder['nickname'] ); ?>
										</div>

									</div>
								</div>
								<div class="founders-slider__content">
									<div class="founders-slider__main-title text-body-20">
										<?php echo esc_html( $title ); ?>
									</div>
									<div class="founder-slider__name is-style-h2">
										<?php echo esc_html( $founder['name'] ); ?>
									</div>
									<div class="founder-slider__description">
										<?php echo wp_kses_post( $founder['description'] ); ?>
									</div>
									<div class="founders-slider__next">
										<div class="founders-slider__next-button">
											<img src="<?php echo TENUP_THEME_DIST_URL . '/svg/circle-arrow.svg'; ?>"
												 class="founders-slider__arrow-next js-founders-slider__arrow-next"
												 alt="Next Founder">
										</div>
										<?php echo wp_get_attachment_image( $founder['next_founder'], 'full' ); ?>
									</div>
								</div>
							</div>

						</div>
					<?php }
				} ?>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div data="gutenberg-preview-img">
		<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ) ?>">
	</div>
<?php } ?>
