<?php
global $product;
$product_id = $product->get_id();
?>
<div class="add-to-cart-bar page-container">
		<div class="container add-to-cart-bar__container">
			<div class="add-to-cart-bar__product-info">
				<div class="bar-thumbnail has-border-radius	">
					<?php echo $product->get_image('thumbnail'); ?>
				</div>
				<div class="bar-details">
					<div class="bar-title fw-500"><?php echo $product->get_name(); ?></div>
					<div class="bar-price"><?php echo $product->get_price_html(); ?></div>
				</div>
			</div>
			<div class="add-to-cart-bar__add-button">
				<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="rh-button rh-button--primary button--primary add-to-cart-button" data-product_id="<?php echo esc_attr($product_id); ?>" data-quantity="1">Add to Cart</a>
			</div>

		</div>
	</div>
</div>
