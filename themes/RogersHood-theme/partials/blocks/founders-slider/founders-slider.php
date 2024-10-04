<?php
/**
 * Renders the Founders Slider
 */

$title  = get_field( 'title' );
$founders = get_field( 'founders' );

?>


<div class="rh-block founders-slider">
	<div class="container">
		<?php if ( $founders ) {
			foreach ( $founders as $key => $founder) {


				?>
				<div class="founders-slider__inner">
					<div class="founders-slider__image">
						<?php echo wp_get_attachment_image( $founder['image'], 'full' ); ?>
					</div>
					<div class="founders-slider__content">
						<div class="founders-slider__main-title">
							<?php echo esc_html( $title ); ?>
						</div>
						<div class="founder-slider__name">
							<?php echo esc_html( $founder['name'] ); ?>
						</div>
						<div class="founder-slider__description">
							<?php echo wp_kses_post( $founder['description'] ); ?>
						</div>
					</div>
					<div class="founders-slider__next">

					</div>
				</div>
			<?php }
			} ?>
	</div>
</div>
