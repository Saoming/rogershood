<?php
/**
 * Register the Navigation Mobile Walker
 *
 * @package TenUpTheme
 */

namespace TenUpTheme\Theme;

use Walker_Nav_Menu;

class CustomNavWalker extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$title     = $item->title;
		$permalink = $item->url;
		$output   .= '<div class="wrapper-level-' . $depth . '' . esc_attr( implode( ' ', $item->classes ) ) . '" role="menu-item">';

		if ( $args->walker->has_children ) {
			$output .= '<div class="menu-item__container">';
			$output .= '<a href="' . esc_url( $permalink ) . '" class="menu-item-text">' . esc_html( $title ) . '</a>';

			if ( in_array( 'menu-item-has-children', $item->classes ) && $depth === 0 ) {
				$output .= '<svg width="9" height="6" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0.5 1L4.5 5L8.5 1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							';
			} else {
				$output .= '<svg width="9" height="6" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0.5 1L4.5 5L8.5 1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							';
			}
			$output .= '</div>';

		} else {
			$output .= '<div class="single_menu-item__container">';
			$output .= '<a href="' . esc_url( $permalink ) . '" class="menu-item-text">' . esc_html( $title ) . '</a>';
			$output .= '</div>';
		}
	}

	function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$output .= '</div>';
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= '<div class="sub-menu" role="menu" aria-hidden="true">';
		$output .= '<div class="inner">';
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= '</div>';
		$output .= '</div>';
	}
}
