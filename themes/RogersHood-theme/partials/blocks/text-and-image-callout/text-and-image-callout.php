<?php
/**
 * Renders the One Image with Content Block
 *
 * @package stride-theme
 */

$id = 'text-and-image-callout-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$fields = get_fields();

$fields["background_color"] = ! $fields["background_color"] || 'none' === $fields["background_color"] ? '' : $fields["background_color"];

// Image position - default LEFT
$image_position = $fields["image_position"] ? '' : 'text-and-image-callout--image-left';
//TODO apply button properly
// Button Style - default PRIMARY
//$button_style = get_field( 'button_style' );
//if ( $button_style ) {
//	$button_style_class = 'is-style--secondary';
//} else {
//	$button_style_class = 'is-style--primary';
//}

?>
<section
		class="rh-block rh-block--full-bleed text-and-image-callout <?php echo esc_attr( " $image_position " ); ?>"
		id="<?php echo esc_attr( $id ); ?>"
>
	<div class="container">
		<div class="text-and-image-callout__row row row--no-gap">

			<div class="col-md-6 text-and-image-callout__content"
				 style="background: <?php echo esc_attr( $fields["background_color"] ); ?> ">
				<div class="text-and-image-callout__content__inner">
					<?php if ( $fields["pretitle"] ) { ?>
						<div class="text-and-image-callout__pretitle pretitle ">
							<?php echo esc_attr( $fields["pretitle"] ); ?>
						</div>
						<?php
					}
					if ( $fields["title"] ) {
						?>
						<h2 class="text-and-image-callout__title">
							<?php echo esc_attr( $fields["title"] ); ?>
						</h2>
						<?php
					}
					if ( $fields["description"] ) {
						?>
						<div class="text-and-image-callout__description-container">
							<div class="text-and-image-callout__description"><?php echo wp_kses_post( $fields["description"] ); ?></div>
						</div>
						<?php
					}

					if ( $fields["call_to_action"] ) {
						?>
						<div class="text-and-image-callout__cta">
							<a class="button text-and-image-callout__button  <?php echo( esc_attr( $button_style_class ) ); ?>"
							   href="<?php echo esc_url( $fields["call_to_action"]["url"] ); ?>"
							   target="<?php echo esc_attr( $fields["call_to_action"]["target"] ); ?>"><?php echo esc_html( $fields["call_to_action"]["title"] ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-6 text-and-image-callout__column text-and-image-callout__image-container">
				<?php
				if ( $fields["image"] ) {
					// TODO: Set image sizes when design
					echo wp_get_attachment_image( $fields["image"], 'full', null, array( 'class' => 'text-and-image-callout__image' ) );
				} else {
					?>
					<img class="missing-image"
						 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
				<?php } ?>
			</div>
		</div>
	</div>
</section>
