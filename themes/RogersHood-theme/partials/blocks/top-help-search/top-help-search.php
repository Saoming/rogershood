<?php
/**
 * Renders the Benefits Section Block
 *
 * @package TenUpTheme
 */
$id = 'top-help-search-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$args['id'] = $id;

if ( function_exists( 'get_field' ) ) {
	$args['top_help_search_title']       = get_field( 'top_help_search_title' );
	$args['top_help_search_description'] = get_field( 'top_help_search_description' );
	$args['activate_search']             = get_field( 'activate_search' );
}

if ( ! get_field( 'block_preview' ) ) {

	get_template_part( 'partials/blocks/top-help-search/top', 'view', $args );

} else {
	echo "
		<div data='gutenberg-preview-img'>
			<img style='max-width:100%; height:auto;' src='" . get_field( 'block_preview' ) . "'>
		</div>
		";
}
