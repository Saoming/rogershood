<?php
/**
 * Renders the One Image with Content Block
 *
 * @package rogershood-theme
 */

$id = 'text-and-image-callout-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$fields = get_fields();

if ( $fields["background_color"] ) {
	$bg_color_class = 'bg-beige';
}

// Image position - default LEFT
$image_position = $fields["image_position"] ? 'text-and-image-callout--image-left' : '';
if ( ! get_field( 'block_preview' ) ) {
	?>
	<section
			class="rh-block rh-block--full-bleed text-and-image-callout <?php echo esc_attr( " $image_position " ); ?>"
			id="<?php echo esc_attr( $id ); ?>"
	>
		<div class="text-and-image-callout__row row row--no-gap">

			<div class="col-md-6 text-and-image-callout__content  <?php echo esc_attr( " $bg_color_class " ); ?>">
				<div class="text-and-image-callout__content__inner">
					<?php if ( $fields["pretitle"] ) { ?>
						<div class="text-and-image-callout__pretitle pretitle uppercase">
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
						<div class="text-and-image-callout__description"><?php echo wp_kses_post( $fields["description"] ); ?></div>
						<?php
					}

					if ( $fields["call_to_action"] ) {
						?>
						<div class="text-and-image-callout__cta">
							<a class="button text-and-image-callout__button"
							   href="<?php echo esc_url( $fields["call_to_action"]["url"] ); ?>"
							   target="<?php echo esc_attr( $fields["call_to_action"]["target"] ); ?>"><?php echo esc_html( $fields["call_to_action"]["title"] ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-6 text-and-image-callout__image-container">
				<?php
				if ( $fields["image"] ) {
					echo wp_get_attachment_image( $fields["image"], 'full', null, array( 'class' => 'text-and-image-callout__image' ) );
				} else {
					?>
					<img class="missing-image text-and-image-callout__image"
						 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
				<?php } ?>
			</div>
		</div>
	</section>
<?php } else { ?>
	<div data="gutenberg-preview-img">
		<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ) ?>">
	</div>
<?php } ?>
