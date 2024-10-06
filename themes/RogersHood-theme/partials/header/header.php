<?php
/**
 * Site Header
 *
 * @package TenUpTheme
 */

$args['menu_header'] = wp_nav_menu(
	array(
		'container'       => 'nav',
		'container_class' => 'header__menu-container',
		'echo'            => false,
		'menu_class'      => 'header__menu',
		'theme_location'  => 'primary',
		'link_before'     => '<span class="menu-item-text">',
		'link_after'      => '</span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
		'walker'          => new \TenUpTheme\Theme\CustomNavWalker(),
	)
);

$args['menu_header_mobile'] = wp_nav_menu(
	array(
		'container'       => 'nav',
		'container_class' => 'header__menu-container-mobile',
		'echo'            => false,
		'menu_class'      => 'header__menu-mobile',
		'theme_location'  => 'mobile',
		'link_before'     => '<span class="menu-item-text">',
		'link_after'      => '</span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
	)
);

if ( function_exists( 'get_field' ) ) {
	$args['header_brand']                 = get_field( 'brand', 'option' ); // in future replaces  in network site options
	$args['site_notifications']           = get_field( 'site_notifications', 'option' ); // in future replace with network site options with function call
	$args['number_of_site_notifications'] = get_field( 'number_of_site_notifications', 'option' ); // in future replace with network site options with function call
	$args['activate_site_notifications']  = get_field( 'activate_site_notifications', 'option' ); // in future replace with network site options with function call
}

$args['allowed_html'] = array(
	'a'    => array(
		'href'       => array(),
		'target'     => array(),
		'rel'        => array(),
		'class'      => array(),
		'role'       => array(),
		'aria-title' => array(),
	),
	'nav'  => array(
		'class' => array(),
		'role'  => array(),
	),
	'ul'   => array(
		'id'    => array(),
		'class' => array(),
		'role'  => array(),
	),
	'li'   => array(
		'class' => array(),
		'role'  => array(),
	),
	'div'  => array(
		'class'         => array(),
		'role'          => array(),
		'aria-hidden'   => array(),
		'aria-label'    => array(),
		'aria-expanded' => array(),
	),
	'svg'  => array(
		'class'       => array(),
		'width'       => array(),
		'height'      => array(),
		'viewBox'     => array(),
		'fill'        => array(),
		'xmlns'       => array(),
		'aria-hidden' => array(),
	),
	'path' => array(
		'd'               => array(),
		'fill'            => array(),
		'stroke'          => array(),
		'stroke-linecap'  => array(),
		'stroke-linejoin' => array(),
		'stroke-width'    => array(),
	),
);

get_template_part( 'partials/header/header', 'view', $args );
get_template_part( 'partials/header/header', 'mobile', $args );
