<?php
/**
 * Renders the One Image with Content Block
 *
 * @package stride-theme
 */

$id = 'product-includes-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
// Block content
$fields = get_fields();
echo '<pre>';
//var_dump( $fields );
echo '</pre>';
?>

<section class="rh-block product-includes"
		 id="<?php echo esc_attr( $id ); ?>"
>
	<div class="container container--narrow">
	<?php if ( $fields["title"] ) { ?>
		<h2 class="product-includes__title text-center">
			<?php echo esc_attr( $fields["title"] ); ?>
		</h2>
	<?php } ?>
	<div class="product-includes__topics">
		<?php foreach ( $fields["products"] as $product ) { ?>
			<a class="product-includes__topic">
				<?php echo esc_attr( $product["title"] ); ?>
			</a>
		<?php } ?>
	</div>
	<div class="container--inner">
		<?php foreach ( $fields["products"] as $product ) { ?>
		<div class="product-includes__product">
			<div class="product-includes__product__row row">
				<div class="col-md-5 product-includes__product__image-container">
					<?php
					if ( $product["image"] ) {
						// TODO: Set image sizes when design
						echo wp_get_attachment_image( $product["image"], 'full', null, array( 'class' => 'product-includes__product__image' ) );
					} else {
						?>
						<img class="missing-image"
							 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
					<?php } ?>
				</div>
				<div class="col-md-7 product-includes__product__content">
					<div class="product-includes__product__content__inner">
						<?php if ( $product["title"] ) { ?>
							<div class="product-includes__product__title"><?php echo wp_kses_post( $product["title"] ); ?></div>
						<?php } ?>
						<div class="product-includes__product__section">
							<?php
							if ( $product["section_title_1"] ) {
								?>
								<div class="product-includes__product__section-title uppercase fw-500">
									<?php echo wp_kses_post( $product["section_title_1"] ); ?><span
											class="remove-on-mobile">:</span>
								</div>
								<?php
							}
							if ( $product["section_description_1"] ) {
								?>
								<div class="product-includes__product__section-description">
									<?php echo wp_kses_post( $product["section_description_1"] ); ?>
								</div>
							<?php } ?>
						</div>
						<div class="product-includes__product__section">
							<?php
							if ( $product["section_title_2"] ) {
								?>
								<div class="product-includes__product__section-title uppercase fw-500">
									<?php echo wp_kses_post( $product["section_title_2"] ); ?><span
											class="remove-on-mobile">:</span>
								</div>
								<?php
							}
							if ( $product["section_description_2"] ) {
								?>
								<div class="product-includes__product__section-description">
									<?php echo wp_kses_post( $product["section_description_2"] ); ?>
								</div>
							<?php } ?>
						</div>
						<div class="product-includes__product__section">
							<?php
							if ( $product["section_title_3"] ) {
								?>
								<div class="product-includes__product__section-title uppercase fw-500">
									<?php echo wp_kses_post( $product["section_title_3"] ); ?><span
											class="remove-on-mobile">:</span>
								</div>
								<?php
							}
							if ( $product["section_description_3"] ) {
								?>
								<div class="product-includes__product__section-description">
									<?php echo wp_kses_post( $product["section_description_3"] ); ?>
								</div>
							<?php } ?>
						</div>
					</div>

				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	</div>
</section>
