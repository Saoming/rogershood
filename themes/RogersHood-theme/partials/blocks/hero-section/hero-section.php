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
	$select_version              = get_field( 'select_version' );
	$args['hero_heading_title']  = get_field( 'hero_heading_title' );
	$args['hero_title_list']     = get_field( 'hero_title_list' );
	$args['hero_final_heading']  = get_field( 'hero_final_heading' );
	$args['hero_video']          = get_field( 'hero_video' );
	$args['hero_description']    = get_field( 'hero_description' );
	$args['cta']                 = get_field( 'hero_button_v1' );
	$args['cta2']                = get_field( 'hero_button_v2' );
	$args['title_text_v2']       = get_field( 'title_text_v2' );
	$args['description_text_v2'] = get_field( 'description_text_v2' );
	$args['curve']               = get_field( 'curve' );


	if ( $args['cta'] ) {
		$args['cta']['link']   = $args['cta']['url'];
		$args['cta']['title']  = $args['cta']['title'];
		$args['cta']['target'] = $args['cta']['target'] ? $args['cta']['target'] : '_self';
	}


	if ( $args['cta2'] ) {
		$args['cta2']['link']   = $args['cta2']['url'];
		$args['cta2']['title']  = $args['cta2']['title'];
		$args['cta2']['target'] = $args['cta2']['target'] ? $args['cta2']['target'] : '_self';
	}
}

if ( ! get_field( 'block_preview' ) ) {
	if ( $select_version === true ) {
		get_template_part( 'partials/blocks/hero-section/hero', 'view', $args );
	} else {
		get_template_part( 'partials/blocks/hero-section/hero', 'view2', $args );
	}
} else {
	echo "		<div data='gutenberg-preview-img'>
			<img style='max-width:100%; height:auto;' src='" . get_field( 'block_preview' ) . "'>
		</div>";
}
