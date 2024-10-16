<?php
$pretitle = get_field( 'pretitle' );
$title    = get_field( 'title' );
$products = get_field( 'products' );

if ( $products ) {
	$product_count = count( $products );
	$title_class   = $product_count > 2 ? 'col-lg-12' : 'col-lg-4';
} else {
	$title_class = 'col-lg-12';
}
?>

<div class="rh-block bg-beige suggested-products">
	<div class="container">
		<div class="row">
			<div class="col-md-12  <?php echo esc_attr( $title_class ); ?> suggested-products__title-container">
				<?php if ( $pretitle ) { ?>
					<div class="suggested-products__pretitle">
						<?php echo esc_attr( $pretitle ); ?>
					</div>
				<?php }
				if ( $title ) { ?>
					<h2 class="suggested-products__title">
						<?php echo esc_html( $title ); ?>
					</h2>
				<?php } ?>
			</div>
			<?php
			foreach ( $products as $product_id ) { ?>
				<div class="col-md-6 col-lg-4">
					<div class="suggested-products__inner">
						<?php $product_id = get_sub_field( 'product' );
						echo do_shortcode( '[product id="' . $product_id . '"]' );
						?>
					</div>
				</div>
			<?php } ?>
		</div>

	</div>
</div>
