<?php
/**
 *  Single Product Slider
 */


$title = get_field( 'title' );

$products = get_field( 'products' );

?>

<div class="rh-block single-product-slider bg-gradient-blue">
	<div class="container container--relative">
		<div class="single-product-slider__slider col-md-12">

			<?php if ( have_rows( 'products' ) ) : while ( have_rows( 'products' ) ) : the_row();
				$pretitle             = get_sub_field( 'pretitle' );
				$title                = get_sub_field( 'title' );
				$review_star_rating   = get_sub_field( 'review_star_rating' );
				$review_count         = get_sub_field( 'review_count' );
				$review_count_content = $review_count === 1 ? "$review_count review" : "$review_count reviews";
				$description          = get_sub_field( 'description' );
				$cta                  = get_sub_field( 'cta' );

				if ( $cta ) {
					$cta_text   = isset( $cta['title'] ) ? $cta['title'] : '';
					$cta_link   = isset( $cta['url'] ) ? $cta['url'] : '';
					$cta_target = isset( $cta['target'] ) ? $cta['target'] : '';
				}

				$image = get_sub_field( 'product_photo' );

				?>
				<div class="">
					<div class="single-product-slider__single-slide row row--no-gap  bg-white">
						<div class="col-md-6 single-product-slider__content">
							<div class="single-product-slider__pretitle">
								<?php echo esc_html( $pretitle ); ?>
							</div>
							<h2 class="single-product-slider__title">
								<?php echo esc_html( $title ); ?>
							</h2>
							<div class="single-product-slider__rating">
								<div class="single-product-slider__rating-stars">
									<?php echo \TenUpTheme\Utility\generate_rating_starts( $review_star_rating ); ?>
								</div>
								<div class="single-product-slider__rating-count">
									<?php echo esc_html( $review_count_content ); ?>
								</div>
							</div>
							<div class="single-product-slider__description">
								<?php echo wp_kses_post( $description ); ?>
							</div>
							<div class="single-product-slider__cta">
								<?php if ( $cta ) { ?>
									<a href="<?php echo esc_url( $cta_link ); ?>" <?php echo esc_attr( $cta_target ); ?>
									   class="button button-primary"><?php echo esc_html( $cta_text ); ?></a>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-6 single-product-slider__image-container">
							<?php echo wp_get_attachment_image( $image, 'full', false, array( 'class' => 'single-product-slider__image' ) ); ?>
						</div>

					</div>

				</div>
			<?php endwhile; endif; ?>
		</div>
		<img src="<?php echo TENUP_THEME_DIST_URL . '/svg/circle-arrow.svg'; ?>"
			 class="products-slider__arrow-next js-products-slider__arrow-next"
			 alt="Next Product">

	</div>
</div>
