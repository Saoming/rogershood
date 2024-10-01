<?php
/**
 * Site Header Menu Mobile LightBox Default HTML
 *
 * @package TenUpTheme
 *
 */

?>

<section
	x-show="modal"
	id="mobile-navigation"
	class="fixed top-0 bottom-0 left-0 right-0 backdrop-blur-sm z-[200]"
	x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
	x-cloak
	tabindex="-1" role="dialog" aria-labelledby="mobile-menu">

    <div class="absolute top-0 bottom-0 right-0 z-10 w-11/12 py-4 transition-all bg-white drop-shadow-2xl">
		<div class="flex flex-row justify-between w-full px-5 border-b border-gray-400 border-inherit pb-[21px]">
			<span id="mobile-menu-title" class="font-bold text-[28px]"> Navigation Menu </span>

			<!-- Close Button -->
			<button
				type="button"
				x-on:click="modal = ! modal"
				:aria-expanded="modal"
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

	  <div class="flex flex-row items-center justify-center gap-8 xl:hidden 2xl:flex pt-[30px]">
				<a
					href="<?php echo esc_url($args['social_link']['url']) ?>"
					rel="no-follow noopener"
					class="outline-black"
					aria-label="<?php echo esc_attr($args['social_link']['title']) ?>"
				>
					<img
						src="<?php echo esc_url( TENUP_THEME_DIST_URL . 'images/social-icons/linkedin-icon-black.svg' ); ?>"
						alt="Linkedin icon"
					/>
				</a>

				<a
					href="<?php echo esc_url($args['navigation_button']['url']) ?>"
					aria-label="Link to Contact Page"
					class="text-black btn"
				>
					<?php echo esc_attr($args['navigation_button']['title']) ?>
				</a>
	   </div>
	</div>
</section>
