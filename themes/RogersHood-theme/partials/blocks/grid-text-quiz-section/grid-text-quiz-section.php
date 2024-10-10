	<?php
	/**
	 * Renders the Hero Section Block
	 *
	 * @package TenUpTheme
	 */
	$id = 'grid-text-quiz-section-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	$args['id'] = $id;

	if ( function_exists( 'get_field' ) ) {
		$args['grid_image_repeater_grid_text'] = get_field( 'grid_image_repeater_grid_text' ); // if it true v1 else v2
		$args['sub_heading_grid_text']         = get_field( 'sub_heading_grid_text' );
		$args['heading_grid_text']             = get_field( 'heading_grid_text' );
		$args['description_grid_text']         = get_field( 'description_grid_text' );
		$args['cta']                           = get_field( 'cta_grid_text' );

		if ( $args['cta'] ) {
			$args['cta']['link']   = $args['cta']['url'];
			$args['cta']['title']  = $args['cta']['title'];
			$args['cta']['target'] = $args['cta']['target'] ? $args['cta']['target'] : '_self';
		}
	}

	if ( ! get_field( 'block_preview' ) ) {
		get_template_part( 'partials/blocks/grid-text-quiz-section/grid', 'view', $args );
	} else {
		echo "
			<div data='gutenberg-preview-img'>
				<img style='max-width:100%; height:auto;' src='" . get_field( 'block_preview' ) . "'>
			</div>
			";
	}
