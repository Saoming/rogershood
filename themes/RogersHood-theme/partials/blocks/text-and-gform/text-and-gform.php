<?php
/**
 * Renders the One Image with Content Block
 *
 * @package rogershood-theme
 */

$id = 'text-and-gform-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$fields = get_fields();

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section
			class="rh-block text-and-gform bg-light-beige"
			id="<?php echo esc_attr( $id ); ?>"
	>
		<div class="container">
			<div class="text-and-gform__row row">

				<div class="col-md-5 text-and-gform__content text-center">
					<?php if ( $fields["pretitle"] ) { ?>
						<div class="text-and-gform__pretitle pretitle ">
							<?php echo esc_attr( $fields["pretitle"] ); ?>
						</div>
						<?php
					}
					if ( $fields["title"] ) {
						?>
						<h2 class="text-and-gform__title">
							<?php echo esc_attr( $fields["title"] ); ?>
						</h2>
						<?php
					}
					if ( $fields["description"] ) {
						?>
						<div class="text-and-gform__description mb-50"><?php echo wp_kses_post( $fields["description"] ); ?></div>
						<?php
					}
					if ( $fields["image"] ) {
						echo wp_get_attachment_image( $fields["image"], 'full', null, array( 'class' => 'text-and-gform__image' ) );
					} else {
						?>
						<img class="missing-image text-and-gform__image"
							 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
					<?php } ?>
				</div>
				<div class="col-sm-hidden col-md-1"></div>
				<div class="col-md-6 text-and-gform__gform">
					<?php gravity_form( $fields["gravity_form"], false, false, false, '', true ); ?>
				</div>
			</div>
		</div>
	</section>
<?php } else { ?>
	<div data="gutenberg-preview-img">
		<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ) ?>"/>
	</div>
<?php } ?>
