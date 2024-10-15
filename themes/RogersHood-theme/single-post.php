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
		<div class="single-post__image container container--narrow">
			<div class="parallax" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
		</div>
		<div class="single-post__content container container--tiny">
			<?php the_content(); ?>
		</div>

	</div>
</div>

		<?php
endwhile;
endif;

get_footer();

