<?php
/**
 * Register the Navigation Mobile Walker
 *
 * @package TenUpTheme
 */

namespace TenUpTheme\Theme;

use Walker_Nav_Menu;

if ( ! class_exists( 'CustomMobileNavWalker' ) ) {
	class CustomMobileNavWalker extends Walker_Nav_Menu {
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$title     = $item->title;
			$permalink = $item->url;

			$output .= '<div class="wrapper-level-' . $depth . ' ' . esc_attr( implode( ' ', $item->classes ) ) . '" role="menu-item">';

			// Add SPAN if no Permalink
			if ( in_array( 'menu-item-has-children', $item->classes ) ) {
				$output .= '<div class="mobile-menu-item__container">';
			} else {
				$output .= '<div class="mobile-single_menu-item__container">';
			}

			$output .= '<a href="' . $permalink . '" class="menu-item-text">';
			$output .= $title;
			$output .= '</a>';

			if ( in_array( 'menu-item-has-children', $item->classes ) ) {
				$output .= '<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1.00513 11L7.00513 6L1.00513 1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
				';
			}

			$output .= '</div>';
		}

		function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$output .= '</div>';
		}

		function start_lvl( &$output, $depth = 0, $args = null ) {
			$output .= '<div class="mobile-sub-menu" role="menu" aria-hidden="true">';
		}

		function end_lvl( &$output, $depth = 0, $args = null ) {
			$output .= '</div>';
		}
	}
}
