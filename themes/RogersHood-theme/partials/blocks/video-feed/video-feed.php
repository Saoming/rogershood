<?php

$id = 'video-feed-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$args['id'] = $id;

if ( function_exists( 'get_field' ) ) {
	$args['title']          = get_field( 'title' );
	$args['description']    = get_field( 'description' );
	$args['facebook_link']  = get_field( 'facebook_link' );
	$args['instagram_link'] = get_field( 'instagram_link' );
	$args['tiktok_link']    = get_field( 'tiktok_link' );
	$args['video_repeater'] = get_field( 'video_repeater' );
}


if ( ! get_field( 'block_preview' ) ) {
	get_template_part( 'partials/blocks/video-feed/video', 'view', $args );
} else {
	echo "
		<div data='gutenberg-preview-img'>
			<img style='max-width:100%; height:auto;' src='" . get_field( 'block_preview' ) . "'>
		</div>
		";
}
