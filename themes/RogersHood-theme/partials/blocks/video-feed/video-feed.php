<?php

$id = 'video-feed-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$args['id'] = $id;

if ( function_exists('get_field')) {
	$args['title']  	= get_field( 'title' );
	$description       = get_field( 'description' );
	$facebook_link     = get_field( 'facebook_link' );
	$instagram_link    = get_field( 'instagram_link' );
	$tiktok_link       = get_field( 'tiktok_link' );
	$feed_shortcode_id = get_field( 'feed_shortcode_id' );
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
