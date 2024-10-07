<?php


$title    = get_field( 'title' );
$pretitle = get_field( 'pretitle' );

?>

<div class="rh-block review-slider bg-blue">
	<div class="container container--relative">
		<?php if ( $pretitle ) { ?>
			<div class="review-slider__pretitle">
				<?php echo esc_textarea( $pretitle ); ?>
			</div>
		<?php }
		if ( $title ) { ?>
			<h2 class="review-slider__title">
				<?php echo esc_html( $title ); ?>
			</h2>
		<?php } ?>
		<img src="<?php echo TENUP_THEME_DIST_URL . '/svg/circle-arrow.svg'; ?>"
			 class="reviews-slider__arrow reviews-slider__arrow--prev js-reviews-slider__arrow-prev"
			 alt="Previous Review">
		<img src="<?php echo TENUP_THEME_DIST_URL . '/svg/circle-arrow.svg'; ?>"
			 class="reviews-slider__arrow reviews-slider__arrow--next js-reviews-slider__arrow-next"
			 alt="Next Review">
	</div>
	<div class="review-slider__slider">
		<div class="review-slider__container">
			<div class="review-slider__slides">
				<?php if ( have_rows( 'reviews' ) ) : while ( have_rows( 'reviews' ) ) :
				the_row();
				$product_name   = get_sub_field( 'product_name' );
				$product_image  = get_sub_field( 'product_image' );
				$star_rating    = get_sub_field( 'star_rating' );
				$review_content = get_sub_field( 'review_content' );
				$reviewer_name  = get_sub_field( 'reviewer_name' );
				?>
				<div class="review-slider__slide has-border-radius bg-white">
					<div class="review-slider__product-info">
						<div class="review-slider__product-image">
							<?php echo wp_get_attachment_image( $product_image, [ 40, 40 ] ); ?>
						</div>
						<div class="review-slider__product-name">
							<?php echo esc_attr( $product_name ); ?>
						</div>
					</div>
					<div class="review-slider__review">
						<div class="review-slider__star-rating">
							<?php echo \TenUpTheme\Utility\generate_rating_starts( $star_rating ); ?>
						</div>
						<div class="review-slider__content">
							<?php echo esc_attr( $review_content ); ?>
						</div>
						<div class="review-slider__reviewer">
							<?php echo esc_attr( $reviewer_name ); ?>
						</div>
					</div>
				</div>

					<?php endwhile;
					endif; ?>

			</div>
		</div>
	</div>
</div>
