<?php
/**
 * SimplesToggle Links Ordering
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="toggle-link__container">
<div class="toggle-link__inner">
	<a
		class="
		<?php
		if ( is_shop() ) {
			echo 'current';
		}
		?>
		toggle-link"
		href="<?php echo esc_url( get_permalink( rh_get_shop_page_id() ) ); ?>"
		aria-label="Link to Shop page"
	>
	All
	</a>

	<a
		class="
		<?php
		if ( is_product_category( 'kits' ) ) {
			echo 'current';
		}
		?>
		toggle-link"
		href="<?php echo esc_url( get_term_link( 'kits', 'product_cat' ) ); ?>"
		aria-label="Link to Kits page"
	>
	Kits
	</a>

	<a
		class="
		<?php
		if ( is_product_category( 'products' ) ) {
			echo 'current';
		}
		?>
		toggle-link"
		href="<?php echo esc_url( get_term_link( 'products', 'product_cat' ) ); ?>"
		aria-label="Link to Products page"
	>
	Products
	</a>
</div>
</section>
