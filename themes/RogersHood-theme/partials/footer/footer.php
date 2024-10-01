<?php
/**
 * Site Header
 *
 * @package TenUpTheme
 */

$args['footer_shop'] = wp_nav_menu(
	array(
		'container'       => 'nav',
		'container_class' => 'footer__menu-container',
		'echo'            => false,
		'menu_class'      => 'footer__menu',
		'theme_location'  => 'footer_shop',
		'link_before'     => '<span class="footer-menu-item-text">',
		'link_after'      => '</span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
	)
);

$args['footer_learn'] = wp_nav_menu(
	array(
		'container'       => 'nav',
		'container_class' => 'footer__menu-container',
		'echo'            => false,
		'menu_class'      => 'footer__menu',
		'theme_location'  => 'footer_learn',
		'link_before'     => '<span class="footer-menu-item-text">',
		'link_after'      => '</span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
	)
);

$args['footer_connect'] = wp_nav_menu(
	array(
		'container'       => 'nav',
		'container_class' => 'footer__menu-container',
		'echo'            => false,
		'menu_class'      => 'footer__menu',
		'theme_location'  => 'footer_connect',
		'link_before'     => '<span class="footer-menu-item-text">',
		'link_after'      => '</span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
	)
);

$args['footer_general'] = wp_nav_menu(
	array(
		'container'       => 'nav',
		'container_class' => 'footer__menu-container',
		'echo'            => false,
		'menu_class'      => 'footer__menu',
		'theme_location'  => 'footer_general',
		'link_before'     => '<span class="footer-menu-item-text">',
		'link_after'      => '</span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
	)
);

if ( function_exists( 'get_field' ) ) {
	$args['disclaimer'] = get_field( 'disclaimer', 'option' ); // in future replaces  in network site options
}


get_template_part( 'partials/footer/footer', 'view', $args );
