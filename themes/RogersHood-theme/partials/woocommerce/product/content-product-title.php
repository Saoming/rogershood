<div class="woo-product-link__container">
	<?php
	echo woocommerce_get_product_thumbnail();
	if ( has_term( array( 'kits' ), 'product_cat', $product->ID ) ) {
	// do something if product with ID 50 is either in category "sneakers" or "backpacks"
	echo '<div class="product-indicator">' . 'Kit' . '</div>';
	}
	echo '<div class="woo-product-link__hover">';
		foreach ( $product->get_gallery_image_ids() as  $index => $image_id ) {
		if ( 0 == $index ) {
		printf( '<img class="woo-product-img__hover" src="%s">', esc_url( wp_get_attachment_url( $image_id ) ) );
		}
		break;
		}
		echo woocommerce_template_loop_add_to_cart();
		echo '</div>';
	echo '</div>';

wc_get_template( 'loop/rating.php' );
