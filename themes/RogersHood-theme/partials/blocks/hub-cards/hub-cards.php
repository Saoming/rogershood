<?php
/**
 * Renders the One Image with Content Block
 *
 * @package rogershood-theme
 */

$id = 'hub-cards-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}


// Block content
$fields                     = get_fields();
$fields["background_color"] = ! $fields["background_color"] || 'none' === $fields["background_color"] ? '' : $fields["background_color"];
if ( ! get_field( 'block_preview' ) ) {
	?>

	<section class="rh-block  hub-cards"
			 id="<?php echo esc_attr( $id ); ?>"
			 style="background: <?php echo esc_attr( $fields["background_color"] ); ?> ">
		<div class="container container--narrow">
			<div class="hub-cards__top text-center mb-50 max-width-headings">
				<?php if ( $fields["pretitle"] ) { ?>
					<div class="hub-cards__pretitle fw-300 uppercase fs-16 mb-16">
						<?php echo esc_attr( $fields["pretitle"] ); ?>
					</div>
				<?php } ?>
				<?php if ( $fields["title"] ) { ?>
					<h2 class="hub-cards__title">
						<?php echo esc_attr( $fields["title"] ); ?>
					</h2>
				<?php } ?>
				<?php if ( $fields["description"] ) { ?>
					<div class="hub-cards__description fs-20 fw-300">
						<?php echo esc_attr( $fields["description"] ); ?>
					</div>
				<?php } ?>
			</div>
			<div class="container--inner">
				<div class="hub-card__row row">
					<?php foreach ( $fields["cards"] as $cards ) { ?>
						<div class="hub-card cols-sm-12  col-md-4 br-4">
							<div class="hub-card__background_image__container">
								<?php echo wp_get_attachment_image( $cards["background_image"], 'full', null, array( 'class' => 'hub-card__background_image br-4' ) ); ?>
								<div class="overlay"></div>
							</div>
							<div class="hub-card__content__inner">
								<div class="hub-card__content__inner__top">
									<?php if ( $cards["icon"] ) { ?>
										<?php echo wp_get_attachment_image( $cards["icon"], 'thumbnail', null, array( 'class' => 'hub-card__icon  mb-20 br-12' ) ); ?>
									<?php } ?>
									<?php if ( $cards["title"] ) { ?>
										<div class="hub-card__title fs-32  ff-scilla mb-20"><?php echo wp_kses_post( $cards["title"] ); ?></div>
									<?php } ?>
									<?php if ( $cards["description"] ) { ?>
										<div class="hub-card__title fw-300"><?php echo wp_kses_post( $cards["description"] ); ?></div>
									<?php } ?>
								</div>
								<?php if ( $cards["cta"] ) { ?>
									<div class="hub-card__cta">
										<a class="rh-button hub-card__button"
										   href="<?php echo esc_url( $cards["cta"]["url"] ); ?>"
										   target="<?php echo esc_attr( $cards["cta"]["target"] ); ?>"><?php echo esc_html( $cards["cta"]["title"] ); ?></a>
									</div>
								<?php } ?>

							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
<?php } else { ?>
	<div data="gutenberg-preview-img">
		<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ) ?>">
	</div>
<?php } ?>
