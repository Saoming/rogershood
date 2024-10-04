<?php
/**
 * Renders the One Image with Content Block
 *
 * @package stride-theme
 */

$id = 'product-what-is-it-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
// Block content
$fields = get_fields();
echo '<pre>';
var_dump( $fields );
echo '</pre>';

include TENUP_THEME_PATH . 'partials/dynamic-stylesheets/block-spacing-stylesheet.php';

?>

<section class="rh-full-block product-what-is-it"
		 id="<?php echo esc_attr( $id ); ?>"
>
		<div class="product-what-is-it__row row">

			<div class="col-md-6 product-what-is-it__content"
				 style="background: <?php echo esc_attr( " $background_color " ); ?> ">
				<div class="product-what-is-it__content__inner">
					<?
					if ( $fields["title"] ) {
						?>
						<h2 class="product-what-is-it__title">
							<?php echo esc_attr( $fields["title"] ); ?>
						</h2>
						<?php
					}
					if ( $fields["product_title"] ) {
						?>
						<div class="product-what-is-it__description-container">
							<div class="product-what-is-it__description"><?php echo wp_kses_post( $fields["product_title"] ); ?></div>
						</div>
						<?php
					}

					if ( $fields["what_is_it"] ) {
						?>
						<div class="product-what-is-it__description-container">
							<div class="product-what-is-it__description"><?php echo wp_kses_post( $fields["what_is_it"]["description"] ); ?></div>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-6 product-what-is-it__column product-what-is-it__image-container">
				<?php
				if ( $fields["image"]  ) {
					// TODO: Set image sizes when design
					echo wp_get_attachment_image( $fields["image"] , 'full', null, array( 'class' => 'product-what-is-it__image' ) );
				} else {
					?>
					<img class="missing-image"
						 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
				<?php } ?>
			</div>
		</div>
<!--	</div>-->
</section>
