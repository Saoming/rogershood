<?php
/**
 * Renders the Founders Slider
 */

$fields = get_fields();
$id     = uniqid( 'about-us-' );

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section
			class="rh-block about-us bg-ivory"
			id="<?php echo esc_attr( $id ); ?>"
	>
		<div class="container">
			<div class="about-us__row row">

				<div class="col-sm-12 col-md-5 about-us__content text-center">
					<div class="about-us__content__inner mb-50">
						<?php
						if ( $fields["pretitle"] ) {
							?>
							<div class="about-us__pretitle uppercase mb-16">
								<?php echo esc_attr( $fields["pretitle"] ); ?>
							</div>
							<?php
						}
						if ( $fields["title"] ) {
							?>
							<h2 class="about-us__title">
								<?php echo esc_attr( $fields["title"] ); ?>
							</h2>
							<?php
						}
						if ( $fields["description"] ) {
							?>
							<div class="about-us__description"><?php echo wp_kses_post( $fields["description"] ); ?></div>
							<?php
						}

						if ( $fields["cta"] ) {
							?>
							<div class="about-us__cta">
								<a class="button about-us__button"
								   href="<?php echo esc_url( $fields["cta"]["url"] ); ?>"
								   target="<?php echo esc_attr( $fields["cta"]["target"] ); ?>"><?php echo esc_html( $fields["cta"]["title"] ); ?></a>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="col-sm-hidden col-md-1"></div>
				<div class="cols-sm-12 col-md-5 about-us__right">
					<div class="about-us__image-and-caption">
						<div class="about-us__image-container">
							<?php
							if ( $fields["image"] ) {
								echo wp_get_attachment_image( $fields["image"], 'full', null, array( 'class' => 'about-us__image' ) );
							} else {
								?>
								<img class="missing-image about-us__image"
									 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
							<?php } ?>
						</div>
						<?php if ( $fields["caption"] ) {
							?>
							<div class="about-us__caption ff-scilla">
								<?php echo esc_attr( $fields["caption"] ); ?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
				<div class="col-sm-hidden col-md-1"></div>
			</div>
		</div>
	</section>
<?php } else { ?>
	<div data="gutenberg-preview-img">
		<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ) ?>">
	</div>
<?php } ?>
