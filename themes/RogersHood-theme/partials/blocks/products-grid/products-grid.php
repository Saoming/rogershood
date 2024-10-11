<?php
/**
 *  Products Grid Block
 *
 * This uses repeater rather than a custom query to display products, because this is another site of the multiste
 */

$title       = get_field( 'title' );
$description = get_field( 'description' );
if ( ! get_field( 'block_preview' ) ) {
	?>

	<div class="rh-block rh-products-grid">
		<div class="container">
			<?php if ( $title ) { ?>
				<h2 class="rh-products-grid__title text-center">
					<?php echo esc_html( $title ); ?>
				</h2>
			<?php }
			if ( $description ) { ?>
				<div class="rh-products-grid__description text-center text-body-20">
					<?php echo wp_kses_post( $description ); ?>
				</div>
			<?php } ?>
			<div class="row rh-products-grid__row">
				<?php if ( have_rows( 'products' ) ) : while ( have_rows( 'products' ) ) : the_row(); ?>

					<?php
					$product_image       = get_sub_field( 'background_image' );
					$product_name        = get_sub_field( 'product_name' );
					$product_description = get_sub_field( 'description' );
					$product_cta         = get_sub_field( 'cta' );

					$background_image_url = wp_get_attachment_image_url( $product_image, 'full' );

					if ( $product_cta ) {
						$product_cta_url    = $product_cta['url'];
						$product_cta_title  = $product_cta['title'];
						$product_cta_target = $product_cta['target'] ? $product_cta['target'] : '_self';
					}
					?>
					<div class="rh-products-grid__product col-md-4 has-border-radius fc-white text-center "
						 style="background-image: url('<?php echo esc_url( $background_image_url ); ?>')">
						<?php if ( $product_name ) { ?>
							<div class="rh-products-grid__name text-body-22 fw-500">
								<?php echo esc_html( $product_name ); ?>
							</div>
						<?php }
						if ( $product_description ) { ?>
							<div class="rh-products-grid__description text-body-18">
								<?php echo wp_kses_post( $product_description ); ?>
							</div>
						<?php }
						if ( $product_cta ) { ?>
							<a href="<?php echo esc_url( $product_cta_url ); ?>"
							   class="rh-products-grid__cta rh-button rh-button-primary" <?php echo esc_attr( $product_cta_title ); ?>>
								<?php echo esc_html( $product_cta_title ); ?>
							</a>
						<?php } ?>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>

<?php } else { ?>
	<div data="gutenberg-preview-img">
		<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ) ?>">
	</div>
<?php } ?>
