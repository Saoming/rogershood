<?php
/**
 * Renders the E-books Image and Content Block
 *
 * @package rogershood-theme
 */

$id = 'e-books-full-and-text-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$fields = get_fields();

?>
<section
		class="rh-block rh-block--full-bleed e-books-full-and-text"
		id="<?php echo esc_attr( $id ); ?>"
>
	<div class="container">
		<div class="e-books-full-and-text__row row row--no-gap">
			<div class="col-sm-12 col-md-4 e-books-full-and-text__image-container  image--desktop">
				<?php
				if ( $fields["images"]["desktop"] ) {
					echo wp_get_attachment_image( $fields["images"]["desktop"], 'full', null, array( 'class' => 'e-books-full-and-text__image' ) );
				} else {
					?>
					<img class="missing-image e-books-full-and-text__image"
						 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
				<?php } ?>
			</div>

			<div class="col-sm-12 col-md-8 e-books-full-and-text__content"
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
						<h2 class="e-books-full-and-text__title text-center">
							<?php echo esc_attr( $fields["title"] ); ?>
						</h2>
						<?php
					}
					if ( $fields["images"]["mobile"] ) {
						?>
						<div class="e-books-full-and-text__image-container  image--mobile mb-20">
							<?php echo wp_get_attachment_image( $fields["images"]["mobile"], 'full', null, array( 'class' => 'e-books-full-and-text__image br-12' ) ); ?>
						</div>
						<?php
					}
					if ( $fields["description"] ) {
						?>
						<div class="e-books-full-and-text__description mb-50"><?php echo wp_kses_post( $fields["description"] ); ?></div>
						<?php
					}

					if ( $fields["call_to_action"] ) {
						?>
						<div class="e-books-full-and-text__cta text-center">
							<a class="button e-books-full-and-text__button"
							   href="<?php echo esc_url( $fields["call_to_action"]["url"] ); ?>"
							   target="<?php echo esc_attr( $fields["call_to_action"]["target"] ); ?>"><?php echo esc_html( $fields["call_to_action"]["title"] ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
