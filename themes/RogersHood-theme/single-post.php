<?php

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
<div class="page-container bg-beige">
	<div class="single-post__inner">
			<?php echo \TenupTheme\Utility\render_post_breadcrumbs(); ?>
		<div class="single-post__category container container--narrow text-center">
			<?php the_category(); ?>
		</div>
		<h1 class="single-post__title container container--narrow text-center">
			<?php echo the_title(); ?>
		</h1>
		<div class="single_post__disclaimer container container--narrow text-center">
			The information provided is for informational purposes only and should not be considered as medical advice. Always consult with a healthcare professional before using any supplements, especially if you are pregnant, nursing, have a medical condition, or are taking medications.
		</div>
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="single-post__image container container--narrow">
			<div class="parallax" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
		</div>
		<?php endif; ?>
		<div class="single-post__content container container--tiny">
			<?php the_content(); ?>
		</div>

		<?php
	endwhile;
endif;

get_footer();

