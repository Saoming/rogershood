<?php
/**
 * Renders the post list block
 */


$pretitle   = get_field( 'pretitle' );
$title      = get_field( 'title' );
$block_type = get_field( 'block_type' ) ? 'repeater' : 'relationship';

$posts_data = [];

if ( $block_type === 'repeater' ) {
	if ( have_rows( 'posts_repeater' ) ) : while ( have_rows( 'posts_repeater' ) ) : the_row();
		$posts_data[] = [
			'title'     => get_sub_field( 'title' ),
			'permalink' => get_sub_field( 'link' ),
			'excerpt'   => get_sub_field( 'description' ),
			'thumbnail' => get_sub_field( 'image' ),
		];
	endwhile; endif;
} else {
	$posts = get_field( 'posts_relationship' );
	foreach ( $posts as $post ) {

		$category = get_the_category( $post->ID );
		if ( $category ) {
			$category      = $category[0];
			$category_name = $category->name;
			$category_link = get_category_link( $category->term_id );
		}

		$posts_data[] = [
			'title'         => $post->post_title,
			'permalink'     => get_permalink( $post->ID ),
			'excerpt'       => $post->post_excerpt,
			'thumbnail'     => get_post_thumbnail_id( $post->ID ),
			'category_name' => $category_name,
			'category_link' => $category_link,
		];
	}
}
if ( ! get_field( 'block_preview' ) ) {

	include TENUP_THEME_PATH . '/views/post-grid/post-grid.php';
} else {
	?>
	<div data="gutenberg-preview-img">
		<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ) ?>">
	</div>
<?php } ?>
?>


