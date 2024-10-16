<?php
/**
 * Description - Renders the Informational Health Info Block
 *
 * @package rogershood-theme
 */

$id = 'product-directions-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$fields = get_fields();
if ( ! get_field( 'block_preview' ) ) {
	?>
	<section
			class="rh-block product-directions bg-ivory"
			id="<?php echo esc_attr( $id ); ?>"
	>
		<div class="product-directions__container container">
			<div class="product-directions__row row ">
				<div class="col-sm-12 col-md-4 product-directions__image-container">
					<?php
					if ( $fields["title"] ) {
						?>
						<h2 class="product-directions__title text-center title-mobile">
							<?php echo esc_attr( $fields["title"] ); ?>
						</h2>
						<?php
					}
					if ( $fields["image"] ) {
						echo wp_get_attachment_image( $fields["image"], 'full', null, array( 'class' => 'product-directions__image mb-20 br-12' ) );
					} else {
						?>
						<img class="missing-image product-directions__image mb-20 br-12"
							 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
					<?php } ?>
				</div>
				<div class="col-sm-hidden col-md-1"></div>
				<div class="col-sm-12 col-md-7 product-directions__content">
					<div class="product-directions__content__inner">
						<?php
						if ( $fields["title"] ) {
							?>
							<h2 class="product-directions__title title-desktop">
								<?php echo esc_attr( $fields["title"] ); ?>
							</h2>
						<?php } ?>
						<div class="product-directions__items mb-50">
							<?php foreach ( $fields["content"] as $item ) { ?>
								<div class="product-directions__item br-4 <?php if ( $fields["has_content_background_white"] ) {
									echo 'bg-white';
								} ?>">
									<?php
									if ( $item["title"] ) {
										?>
										<div class="product-directions__item-title fw-500">
											<?php echo esc_attr( $item["title"] ); ?>
										</div>
										<?php
									}
									if ( $item["description"] ) {
										?>
										<div class="product-directions__item-description fw-300">
											<?php echo wp_kses_post( $item["description"] ); ?>
										</div>
										<?php
									}
									?>
								</div>
							<?php } ?>
						</div>
					</div>
					<?php if ( $fields["cta"] ) { ?>
						<div class="product-directions__cta">
							<a class="rh-button rh-button-primary product-directions__button"
							   href="<?php echo esc_url( $fields["cta"]["url"] ); ?>"
							   target="<?php echo esc_attr( $fields["cta"]["target"] ); ?>"><?php echo esc_html( $fields["cta"]["title"] ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
	</section>
<?php } else { ?>
	<div data="gutenberg-preview-img">
		<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ) ?>">
	</div>
<?php } ?>
