<?php
/**
 * Renders the category links block
 */

$pretitle   = get_field( 'pretitle' );
$title      = get_field( 'title' );
$block_type = get_field( 'block_type' ) ? 'taxonomy' : 'repeater';

$category_data = [];

if ( $block_type === 'repeater' ) {
	if ( have_rows( 'categories_repeater' ) ) : while ( have_rows( 'categories_repeater' ) ) : the_row();
		$category_data[] = [
			'title'     => get_sub_field( 'title' ),
			'permalink' => get_sub_field( 'link' ),
			'thumbnail' => get_sub_field( 'image' ),
		];
	endwhile; endif;
} else {
	$categories = get_field( 'categories_relationship' );
	foreach ( $categories as $category_id ) {
		$background_image = get_field( 'preview_image', 'category_' . $category_id );
		$category_name    = get_cat_name( $category_id );
		$category_link    = get_term_link( $category_id, 'category' );

		$category_data[] = [
			'title'     => $category_name,
			'permalink' => $category_link,
			'thumbnail' => $background_image,
		];
	}
}


?>
<div class="rh-block category-list">
	<div class="container container--narrow">
		<?php if ( $pretitle ) { ?>
			<div class="category-list__pretitle text-center">
				<?php echo esc_attr( $pretitle ); ?>
			</div>
		<?php }
		if ( $title ) { ?>
			<h2 class="category-list__title text-center">
				<?php echo esc_attr( $title ); ?>
			</h2>
		<?php } ?>
		<div class="row row__category-list">
			<?php if ( $category_data ) {
				foreach ( $category_data as $category ) {
					if ( isset( $category['thumbnail'] ) && $category['thumbnail'] ) {
						$thumbnail_image_src = wp_get_attachment_image_src( $category['thumbnail'], 'rh-post-thumbnail' )[0];
					} else {
						$thumbnail_image_src = '';
					}

					?>
					<a href="<?php echo esc_url( $category['permalink'] ); ?>"
					   class="category-list__single-category col-md-4 has-border-radius fw-500 fc-white text-body-22"
					   style="background-image:url('<?php echo esc_url( $thumbnail_image_src ); ?>')">
						<?php echo esc_attr( $category['title'] ); ?>
					</a>
				<?php }
			}
			?>

		</div>
	</div>
</div>
