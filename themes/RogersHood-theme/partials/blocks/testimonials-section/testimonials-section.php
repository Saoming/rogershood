<?php
/**
 * Renders the Hero Section Block
 *
 * @package TenUpTheme
 */
$id = 'testimonials-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$args['id'] = $id;

if ( function_exists( 'get_field' ) ) {
	$args['sub_heading_grid_text']  = get_field( 'sub_heading_testimonials_section' );
	$args['heading_grid_text']      = get_field( 'heading_testimonials_section' );
	$args['testimonials_repeaters'] = get_field( 'testimonials_repeaters' );
}

if ( ! get_field( 'block_preview' ) ) {
	get_template_part( 'partials/blocks/testimonials-section/testimonials', 'view', $args );
} else {
	echo "
		<div data='gutenberg-preview-img'>
			<img style='max-width:100%; height:auto;' src='" . get_field( 'block_preview' ) . "'>
		</div>
		";
}
