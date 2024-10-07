<?php
/**
 * Renders the One Image with Content Block
 *
 * @package rogershood-theme
 */

$id = 'product-benefits-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$fields = get_fields();

?>
<section
		class="rh-block rh-block--full-bleed product-benefits"
		id="<?php echo esc_attr( $id ); ?>"
>
	<!--	<div class="container">-->
	<div class="product-benefits__row row">

		<div class="col-sm-hidden col-md-1"></div>
		<div class="col-md-4 product-benefits__image-container">
			<?php
			if ( $fields["image"] ) {
				echo wp_get_attachment_image( $fields["image"], 'full', null, array( 'class' => 'product-benefits__image' ) );
			} else {
				?>
				<img class="missing-image"
					 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
			<?php } ?>
		</div>
		<div class="col-sm-hidden col-md-1"></div>
		<div class="col-md-6 product-benefits__content">
			<?php foreach ( $fields["benefits"] as $benefit ) { ?>
				<div class="product-benefits__benefit">
					<?php
					if ( $benefit["icon"] ) {
						echo wp_get_attachment_image( $benefit["icon"], 'thumbnail', null, array( 'class' => 'product-benefits__icon  mb-20 br-12' ) );
					} else {
						?>
						<img class="missing-image product-benefits__icon"
							 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
					<?php }


					if ( $benefit["title"] ) {
						?>
						<div class="product-benefits__title"><?php echo wp_kses_post( $benefit["title"] ); ?></div>
						<?php
					}

					if ( $benefit["description"] ) {
						?>
						<div class="product-benefits__description"><?php echo wp_kses_post( $benefit["description"] ); ?></div>
						<?php
					} ?>
				</div>
			<?php } ?>
		</div>
	</div>
	</div>
	<!--	</div>-->
</section>
