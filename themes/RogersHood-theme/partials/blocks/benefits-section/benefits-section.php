<?php
/**
 * Renders the Benefits Section Block
 *
 * @package TenUpTheme
 */
$id = 'benefits-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$args['id'] = $id;

if ( function_exists( 'get_field' ) ) {
	$args['sub_heading_benefits']    = get_field( 'sub_heading_benefits' );
	$args['heading_benefits']        = get_field( 'heading_benefits' );
	$args['cards_repeater_benefits'] = get_field( 'cards_repeater_benefits' );
}

if ( ! get_field( 'block_preview' ) ) {
	get_template_part( 'partials/blocks/benefits-section/benefits', 'view', $args );
} else {
	echo "		<div data='gutenberg-preview-img'>
			<img style='max-width:100%; height:auto;' src='" . get_field( 'block_preview' ) . "'>
		</div>";
}
