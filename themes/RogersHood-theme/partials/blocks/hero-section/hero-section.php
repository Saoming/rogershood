<?php
/**
 * Renders the Hero Section Block
 *
 * @package TenUpTheme
 */
$id = 'hero-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$args['id'] = $id;

if ( function_exists( 'get_field' ) ) {
	$args['version']            = get_field( 'v1_v2' ); // if it true v1 else v2
	$args['hero_heading']       = get_field( 'hero_heading' );
	$args['hero_video']         = get_field( 'hero_video' );
	$args['hero_background']    = get_field( 'hero_background' );
	$args['video_poster_image'] = get_field( 'video_poster_image' );
	$args['hero_description']   = get_field( 'hero_description' );
	$args['cta']                = get_field( 'hero_button_v1' );

	if ( $args['cta'] ) {
		$args['cta']['link']   = $args['cta']['url'];
		$args['cta']['title']  = $args['cta']['title'];
		$args['cta']['target'] = $args['cta']['target'] ? $args['cta']['target'] : '_self';
	}
}

if ( ! get_field( 'block_preview' ) ) {
	if ( $args['version'] == true ) {
		get_template_part( 'partials/blocks/hero-section/hero', 'view2', $args );
	} else {
		get_template_part( 'partials/blocks/hero-section/hero', 'view', $args );
	}
} else {
	echo "
		<div data='gutenberg-preview-img'>
			<img style='max-width:100%; height:auto;' src='" . get_field( 'block_preview' ) . "'>
		</div>
		";
}
