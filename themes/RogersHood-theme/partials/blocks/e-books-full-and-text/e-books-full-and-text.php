<?php
/**
 * Renders the One Image with Content Block
 *
 * @package stride-theme
 */

$id = 'e-books-full-and-text-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$fields = get_fields();
echo '<pre>';
var_dump( $fields );
echo '</pre>';

// Image position - default LEFT
$image_position = $fields["image_position"] ? '' : 'e-books-full-and-text--image-left';
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
		class="rh-block rh-block--full-bleed e-books-full-and-text <?php echo esc_attr( " $image_position " ); ?>"
		id="<?php echo esc_attr( $id ); ?>"
>
	<div class="container">
		<div class="e-books-full-and-text__row row row--no-gap">
			<div class="col-md-4 e-books-full-and-text__column e-books-full-and-text__image-container">
				<?php
				if ( $fields["image"] ) {
					// TODO: Set image sizes when design
					echo wp_get_attachment_image( $fields["image"], 'full', null, array( 'class' => 'e-books-full-and-text__image' ) );
				} else {
					?>
					<img class="missing-image"
						 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
				<?php } ?>
			</div>

			<div class="col-md-8 e-books-full-and-text__content"
				 style="background-image: url('<?php echo esc_url( $fields["background_image"]["url"] ); ?>')"
			>
			<div class="e-books-full-and-text__content__inner">
				<?php if ( $fields["pretitle"] ) { ?>
					<div class="e-books-full-and-text__pretitle pretitle ">
						<?php echo esc_attr( $fields["pretitle"] ); ?>
					</div>
					<?php
				}
				if ( $fields["title"] ) {
					?>
					<h2 class="e-books-full-and-text__title">
						<?php echo esc_attr( $fields["title"] ); ?>
					</h2>
					<?php
				}
				if ( $fields["description"] ) {
					?>
					<div class="e-books-full-and-text__description-container">
						<div class="e-books-full-and-text__description"><?php echo wp_kses_post( $fields["description"] ); ?></div>
					</div>
					<?php
				}

				if ( $fields["call_to_action"] ) {
					?>
					<div class="e-books-full-and-text__cta">
						<a class="button e-books-full-and-text__button  <?php echo( esc_attr( $button_style_class ) ); ?>"
						   href="<?php echo esc_url( $fields["call_to_action"]["url"] ); ?>"
						   target="<?php echo esc_attr( $fields["call_to_action"]["target"] ); ?>"><?php echo esc_html( $fields["call_to_action"]["title"] ); ?></a>
					</div>
				<?php } ?>
			</div>
		</div>

	</div>
	</div>
</section>
