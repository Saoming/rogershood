<?php
/**
 * Site Header Menu Mobile Default HTML
 *
 * @package TenUpTheme
 */

?>

<section
	x-show="mobile"
	id="mobile-navigation"
	class="hidden mobile-navigation__container"
	x-transition:enter="transition ease-out duration-300"
	x-transition:enter-start="opacity-0 scale-90"
	x-transition:enter-end="opacity-100 scale-100"
	x-transition:leave="transition ease-in duration-300"
	x-transition:leave-start="opacity-100 scale-100"
	x-transition:leave-end="opacity-0 scale-90"
	tabindex="-1" role="dialog" aria-labelledby="mobile-menu">

	<div class="mobile-nav_inner">
		<div class="button-close__container">
			<!-- Close Button -->
			<button
				type="button"
				class="button-close"
				x-on:click="mobile = ! mobile"
				:aria-expanded="mobile"
				aria-controls="mobile-navigation"
				aria-label="Close Navigation Menu"
			>
				<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="14.9836" y="0.712708" width="20.2052" height="0.962152" transform="rotate(135 14.9836 0.712708)" fill="currentColor"/>
					<rect x="14.3032" y="14.9676" width="20.2052" height="0.962152" transform="rotate(-135 14.3032 14.9676)" fill="currentColor"/>
				</svg>
			</button>

		</div>

		<?php echo wp_kses_post( $args['menu_header_mobile'] ); ?>
	</div>
</section>
