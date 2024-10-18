<?php
/**
 * Renders the Hero Slider Block
 *
 * @package TenUpTheme
 */
$id = 'hero-slider-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$args['id'] = $id;

if ( function_exists( 'get_field' ) ) {
	$args['hero_slider_heading']      = get_field( 'hero_slider_heading' );
	$args['hero_slider_background']   = get_field( 'hero_slider_background' );
	$args['hero_slider__description'] = get_field( 'hero_slider_description' );
	$args['hero_slider_repeater']     = get_field( 'hero_slider_repeater' );
	$args['hero_slider_cta']          = get_field( 'hero_slider_cta' );

	if ( $args['hero_slider_cta'] ) {
		$args['hero_slider_cta']['link']   = $args['hero_slider_cta']['url'];
		$args['hero_slider_cta']['title']  = $args['hero_slider_cta']['title'];
		$args['hero_slider_cta']['target'] = $args['hero_slider_cta']['target'] ? $args['hero_slider_cta']['target'] : '_self';
	}
}

if ( ! get_field( 'block_preview' ) ) {
	get_template_part( 'partials/blocks/hero-slider/slider', 'view', $args );
} else {
	echo "
		<div data='gutenberg-preview-img'>
			<img style='max-width:100%; height:auto;' src='" . get_field( 'block_preview' ) . "'>
		</div>
		";
}
