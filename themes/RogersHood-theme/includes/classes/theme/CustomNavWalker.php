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
		$output   .= '<div class="wrapper-level-' . $depth . ' ' . esc_attr( implode( ' ', $item->classes ) ) . '">';

		if ( $args->walker->has_children ) {
			$output     .= '<div class="flex flex-row items-center justify-start hover:text-secondary">';
				$output .= '<span class="menu-item-text mr-[6px]" :class="{\'text-secondary\': childExpand}">' . esc_html( $title ) . '</span>';

			if ( in_array( 'menu-item-has-children', $item->classes ) && $depth == 0 ) {
				$output .= '<svg width="14" height="14" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1.02253 3.30813C1.13973 3.19096 1.29868 3.12514 1.46441 3.12514C1.63013 3.12514 1.78908 3.19096 1.90628 3.30813L5.00003 6.40188L8.09378 3.30813C8.21166 3.19428 8.36953 3.13128 8.53341 3.13271C8.69728 3.13413 8.85404 3.19986 8.96992 3.31574C9.0858 3.43162 9.15153 3.58838 9.15295 3.75225C9.15438 3.91613 9.09138 4.074 8.97753 4.19188L5.4419 7.7275C5.3247 7.84467 5.16576 7.9105 5.00003 7.9105C4.8343 7.9105 4.67536 7.84467 4.55816 7.7275L1.02253 4.19188C0.905361 4.07467 0.839539 3.91573 0.839539 3.75C0.839539 3.58428 0.905361 3.42533 1.02253 3.30813Z" fill="currentColor"/>
								</svg>
							';
			} else {
				$output .= '<svg width="14" height="14" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1.02253 3.30813C1.13973 3.19096 1.29868 3.12514 1.46441 3.12514C1.63013 3.12514 1.78908 3.19096 1.90628 3.30813L5.00003 6.40188L8.09378 3.30813C8.21166 3.19428 8.36953 3.13128 8.53341 3.13271C8.69728 3.13413 8.85404 3.19986 8.96992 3.31574C9.0858 3.43162 9.15153 3.58838 9.15295 3.75225C9.15438 3.91613 9.09138 4.074 8.97753 4.19188L5.4419 7.7275C5.3247 7.84467 5.16576 7.9105 5.00003 7.9105C4.8343 7.9105 4.67536 7.84467 4.55816 7.7275L1.02253 4.19188C0.905361 4.07467 0.839539 3.91573 0.839539 3.75C0.839539 3.58428 0.905361 3.42533 1.02253 3.30813Z" fill="currentColor"/>
								</svg>
							';
			}
				$output .= '</div>';

		} else {
			$output .= '<a href="' . esc_url( $permalink ) . '" class="menu-item-text">' . esc_html( $title ) . '</a>';
		}
	}

	function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$output .= '</div>';
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= '<div class="sub-menu">';
		$output .= '<div class="inner">';
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= '</div>';
		$output .= '</div>';
	}
}
