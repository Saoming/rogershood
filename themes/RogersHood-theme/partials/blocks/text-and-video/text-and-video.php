<?php
/**
 * Renders the Text and Video Block
 *
 * @package TenUpTheme
 */
$id = 'text-and-video-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$args['id'] = $id;

if ( function_exists( 'get_field' ) ) {
	$args['text_and_video_subheading']  = get_field( 'text_and_video_subheading' );
	$args['text_and_video_heading']     = get_field( 'text_and_video_heading' );
	$args['text_and_video_video']       = get_field( 'text_and_video_video' );
	$args['text_and_video_background']  = get_field( 'text_and_video_background' );
	$args['text_video_poster_image']    = get_field( 'text_video_poster_image' );
	$args['text_and_video_description'] = get_field( 'text_and_video_description' );
	$args['text_video_cta']             = get_field( 'text_and_video_button' );

	if ( $args['text_video_cta'] ) {
		$args['text_video_cta']['link']   = $args['text_video_cta']['url'];
		$args['text_video_cta']['title']  = $args['text_video_cta']['title'];
		$args['text_video_cta']['target'] = $args['text_video_cta']['target'] ? $args['text_video_cta']['target'] : '_self';
	}
}

if ( ! get_field( 'block_preview' ) ) {
	get_template_part( 'partials/blocks/text-and-video/section', 'view', $args );
} else {
	echo "
		<div data='gutenberg-preview-img'>
			<img style='max-width:100%; height:auto;' src='" . get_field( 'block_preview' ) . "'>
		</div>
		";
}
