<?php
/**
 * Description - Renders the Informational Health Info Block
 *
 * @package rogershood-theme
 */

$id = 'two-images-and-content-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$fields = get_fields();
?>
<section
		class="rh-block two-images-and-content"
		id="<?php echo esc_attr( $id ); ?>"
>
	<div class="container">
		<div class="two-images-and-content__row row ">
			<div class="col-sm-12 col-md-3 two-images-and-content__image-container  image--desktop">
				<?php
				if ( $fields["title"] ) {
					?>
					<h2 class="two-images-and-content__title text-center title-mobile">
						<?php echo esc_attr( $fields["title"] ); ?>
					</h2>
					<?php
				}
				if ( $fields["images"]["top"] ) {
					echo wp_get_attachment_image( $fields["images"]["top"], 'full', null, array( 'class' => 'two-images-and-content__image mb-20 br-4' ) );
				} else {
					?>
					<img class="missing-image"
						 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
					<?php
				}
				if ( $fields["images"]["bottom"] ) {
					echo wp_get_attachment_image( $fields["images"]["bottom"], 'full', null, array( 'class' => 'two-images-and-content__image br-4' ) );
				} else {
					?>
					<img class="missing-image"
						 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
				<?php }
				?>
			</div>
			<div class="col-sm-hidden col-md-1"></div>
			<div class="col-sm-12 col-md-8 two-images-and-content__content">
				<div class="two-images-and-content__content__inner">
					<?php
					if ( $fields["title"] ) {
						?>
						<h2 class="two-images-and-content__title title-desktop">
							<?php echo esc_attr( $fields["title"] ); ?>
						</h2>
						<?php
					}
					if ( $fields["description"] ) {
						?>
						<div class="two-images-and-content__description mb-20">
							<?php echo esc_attr( $fields["description"] ); ?>
						</div>
						<?php
					}
					foreach ( $fields["content"] as $item ) {
						?>
						<div class="two-images-and-content__item faq-block__question">
							<?php
							if ( $item["title"] ) {
								?>
								<div class="two-images-and-content__item-title faq-block__question-title fw-500">
									<?php echo esc_attr( $item["title"] ); ?>
									<span class="faq-block__question-icon"></span>
								</div>
								<?php
							}
							if ( $item["description"] ) {
								?>
								<div class="two-images-and-content__item-description faq-block__question-answer fw-300">
									<div class="faq-block__question-answer--inner">
										<?php echo wp_kses_post( $item["description"] ); ?>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
</section>
