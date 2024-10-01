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
		if ( '/shop/' === $_SERVER['REQUEST_URI'] ) {
			echo 'current';
		}
		?>
		toggle-link"
		href="/shop/"
		aria-label="Link to Shop page"
	>
	All
	</a>

	<a
		class="
		<?php
		if ( '/product-category/kits/' === $_SERVER['REQUEST_URI'] ) {
			echo 'current';
		}
		?>
		toggle-link"
		href="/product-category/kits/"
		aria-label="Link to Kits page"
	>
	Kits
	</a>

	<a
		class="
		<?php
		if ( '/product-category/products/' === $_SERVER['REQUEST_URI'] ) {
			echo 'current';
		}
		?>
		toggle-link"
		href="/product-category/products/"
		aria-label="Link to Products page"
	>
	Products
	</a>
</div>
</section>
