<?php
/**
 * Renders the One Image with Content Block
 *
 * @package rogershood-theme
 */

$id = 'product-includes-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
// Block content
$fields               = get_fields();
$nr_included_products = count( $fields["products"] );
?>

<section class="rh-block product-includes bg-ivory"
		 id="<?php echo esc_attr( $id ); ?>"
>
	<div class="container container--narrow">
		<?php if ( $fields["title"] ) { ?>
			<h2 class="product-includes__title text-center mb-50">
				<?php echo esc_attr( $fields["title"] ); ?>
			</h2>
		<?php } ?>
		<?php if ( $nr_included_products > 1 ) { ?>
			<div class="product-includes__topics">
				<?php foreach ( $fields["products"] as $index => $product ) { ?>
					<div class="product-includes__topic" data-product-index="<?php echo $index; ?>">
						<?php echo esc_attr( $product["title"] ); ?>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="container--inner">
			<div class="product-includes__products">
				<?php foreach ( $fields["products"] as $index => $product ) { ?>
					<div class="product-includes__product" data-product-index="<?php echo $index; ?>"
						<?php if ( $index > 0 ) : ?> style="display: none;"<?php endif; ?>>
						<div class="product-includes__product__row row">
							<div class="col-md-5 product-includes__product__image-container">
								<?php
								if ( $product["image"] ) {
									echo wp_get_attachment_image( $product["image"], 'full', null, array( 'class' => 'product-includes__product__image' ) );
								} else {
									?>
									<img class="missing-image product-includes__product__image"
										 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
								<?php } ?>
							</div>
							<div class="col-md-7 product-includes__product__content">
								<div class="product-includes__product__content__inner">
									<?php if ( $product["title"] ) { ?>
										<div class="product-includes__product__title"><?php echo wp_kses_post( $product["title"] ); ?></div>
									<?php } ?>
									<div class="product-includes__product__section faq-block__question">
										<?php
										if ( $product["section_title_1"] ) {
											?>
											<div class="product-includes__product__section-title  faq-block__question-title uppercase fw-500">
												<?php echo wp_kses_post( $product["section_title_1"] ); ?>
												<span class="remove-on-mobile">:</span>
												<span class="faq-block__question-icon product-includes__product__section__icon"></span>
											</div>
											<?php
										}
										if ( $product["section_description_1"] ) {
											?>
											<div class="product-includes__product__section-description faq-block__question-answer">
												<div class="faq-block__question-answer--inner product-includes__product__section__question-answer--inner">
													<?php echo wp_kses_post( $product["section_description_1"] ); ?>
												</div>
											</div>
										<?php } ?>
									</div>
									<div class="product-includes__product__section faq-block__question">
										<?php
										if ( $product["section_title_2"] ) {
											?>
											<div class="product-includes__product__section-title  faq-block__question-title uppercase fw-500">
												<?php echo wp_kses_post( $product["section_title_2"] ); ?>
												<span class="remove-on-mobile">:</span>
												<span class="faq-block__question-icon product-includes__product__section__icon"></span>
											</div>
											<?php
										}
										if ( $product["section_description_2"] ) {
											?>
											<div class="product-includes__product__section-description faq-block__question-answer">
												<div class="faq-block__question-answer--inner">
													<?php echo wp_kses_post( $product["section_description_2"] ); ?>
												</div>
											</div>
										<?php } ?>
									</div>
									<div class="product-includes__product__section faq-block__question">
										<?php
										if ( $product["section_title_3"] ) {
											?>
											<div class="product-includes__product__section-title  faq-block__question-title uppercase fw-500">
												<?php echo wp_kses_post( $product["section_title_3"] ); ?>
												<span class="remove-on-mobile">:</span>
												<span class="faq-block__question-icon product-includes__product__section__icon"></span>
											</div>
											<?php
										}
										if ( $product["section_description_3"] ) {
											?>
											<div class="product-includes__product__section-description faq-block__question-answer">
												<div class="faq-block__question-answer--inner">
													<?php echo wp_kses_post( $product["section_description_3"] ); ?>
												</div>
											</div>
										<?php } ?>
									</div>

								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
