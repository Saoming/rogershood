<?php
$title    = get_field( 'title' );
$products = get_field( 'products' );
?>

<div class="rh-block bg-beige suggested-products">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-4 suggested-products__title-container">
				<h2 class="suggested-products__title"><?php echo esc_html( $title ); ?></h2>
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
