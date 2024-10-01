<?php
/**
 * Site Header Default HTML
 *
 * @package TenUpTheme
 */

?>

<?php if ( $args['activate_site_notifications'] ) : ?>
	<?php if ( $args['site_notifications'] || $args['number_of_site_notifications'] ) : ?>
	<!-- Store Notifications -->
	<div class="store-notifications__container" role="alert">
		<?php
		$i = 0;
		while ( $i < $args['number_of_site_notifications'] ) :
			?>
			<span class="store-notifications__text">
				<?php echo esc_attr( $args['site_notifications'] ); ?>
			</span>
			<?php
			++$i;
			endwhile;
		?>
	</div>
	<?php endif; ?>
<?php endif; ?>
<header role="banner" class="header__container page-container">
	<div class="header__menu-mobile">
		<button
			type="button"
			class="header__menu-mobile-button"
			:aria-expanded="modal"
			aria-controls="mobile-navigation"
			aria-label="Navigation Menu"
		>
			<svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M0 10.77V9.76998H16V10.77H0ZM0 5.99998V4.99998H16V5.99998H0ZM0 1.22998V0.22998H16V1.22998H0Z" fill="currentColor"/>
			</svg>
		</button>
	</div>

	<div class="header__brand">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__brand-link">
			<img src="<?php echo esc_url( $args['header_brand']['url'] ); ?>" alt="RogersHood Logo" class="header__brand-image">
		</a>
	</div>

	<?php echo wp_kses_post( $args['menu_header'] ); ?>

	<div class="header__woo">
		<a href="/my-account/" class="header__woo-link">
			<svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M9 11C11.7614 11 14 8.76142 14 6C14 3.23858 11.7614 1 9 1C6.23858 1 4 3.23858 4 6C4 8.76142 6.23858 11 9 11Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M17 19C17 16.8783 16.1571 14.8434 14.6569 13.3431C13.1566 11.8429 11.1217 11 9 11C6.87827 11 4.84344 11.8429 3.34315 13.3431C1.84285 14.8434 1 16.8783 1 19" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</a>

		<a href="/cart/" class="header__woo-link">
			<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1.71 3.4H16.924C18.302 3.4 19.297 4.67 18.919 5.948L17.265 11.548C17.01 12.408 16.196 13 15.27 13H6.112C5.185 13 4.37 12.407 4.116 11.548L1.71 3.4ZM1.71 3.4L1 1M14.5 19C14.8978 19 15.2794 18.842 15.5607 18.5607C15.842 18.2794 16 17.8978 16 17.5C16 17.1022 15.842 16.7206 15.5607 16.4393C15.2794 16.158 14.8978 16 14.5 16C14.1022 16 13.7206 16.158 13.4393 16.4393C13.158 16.7206 13 17.1022 13 17.5C13 17.8978 13.158 18.2794 13.4393 18.5607C13.7206 18.842 14.1022 19 14.5 19ZM6.5 19C6.89782 19 7.27936 18.842 7.56066 18.5607C7.84196 18.2794 8 17.8978 8 17.5C8 17.1022 7.84196 16.7206 7.56066 16.4393C7.27936 16.158 6.89782 16 6.5 16C6.10218 16 5.72064 16.158 5.43934 16.4393C5.15804 16.7206 5 17.1022 5 17.5C5 17.8978 5.15804 18.2794 5.43934 18.5607C5.72064 18.842 6.10218 19 6.5 19Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</a>
	</div>
</header>
