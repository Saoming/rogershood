<?php
/**
 * Register the Navigation Mobile Walker
 *
 * @package TenUpTheme
 */

namespace TenUpTheme\Theme;

use Walker_Nav_Menu;

// class Mobile_Menu_Walker extends Walker_Nav_Menu {
// 	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
// 		$title     = $item->title;
// 		$permalink = $item->url;

// 		$output .= '<div class="wrapper-level-' . $depth . ' ' . esc_attr( implode( ' ', $item->classes ) ) . '" x-data="{ childExpand: false }">';

// 		// Add SPAN if no Permalink
// 		if ( in_array( 'menu-item-has-children', $item->classes ) ) {
// 			$output .= '<div class="w-full flex flex-row justify-between items-center py-[10px] border-b border-[#eaeaea]" x-on:click="childExpand = ! childExpand">';
// 		} else {
// 			$output .= '<div class="w-full flex flex-row justify-between items-center py-[10px] border-b border-[#eaeaea]">';
// 		}

// 		if ( $permalink && $permalink != '#' ) {
// 			$output .= '<a href="' . $permalink . '" class="' . esc_attr( implode( ' ', $item->classes ) ) . '">';
// 		} else {
// 			$output .= '<span href="' . $permalink . '" class="' . esc_attr( implode( ' ', $item->classes ) ) . '">';
// 		}

// 		$output .= $title;

// 		if ( $permalink && $permalink != '#' ) {
// 			$output .= '</a>';
// 		} else {
// 			$output .= '</span>';
// 		}

// 		if ( in_array( 'menu-item-has-children', $item->classes ) ) {
// 			$output .= '<svg xmlns="http://www.w3.org/2000/svg" width="9" height="14" viewBox="0 0 9 14" fill="none" :class="{\'rotate-90\': childExpand}">
// 			<path d="M0.999999 1L7 7L1 13" stroke="black" stroke-width="2" stroke-linecap="round"/>
// 			  </svg>';
// 		}

// 		$output .= '</div>';
// 	}

// 	function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
// 		$output .= '</div>';
// 	}

// 	function start_lvl( &$output, $depth = 0, $args = null ) {
// 		$output .= '<div class="ml-5 submenu" x-show="childExpand" x-transition>';
// 	}

// 	function end_lvl( &$output, $depth = 0, $args = null ) {
// 		$output .= '</div>';
// 	}
// }
