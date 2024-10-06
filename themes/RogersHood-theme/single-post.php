<?php

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();
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
			<?php the_post_thumbnail( 'rh-post-feature-image' ); ?>
		</div>
		<div class="single-post__content container container--tiny">
			<?php  the_content(); ?>
		</div>
		<div class="single-post__share">
			<div class="single-post__share-title">
				Share
			</div>
			<div class="single-post__share-buttons">
				<a href="#"><img src="<?php echo TENUP_THEME_DIST_URL . 'svg/sharer/email-icon.svg' ?>" alt="Email Icon" ></a>
				<a href="#"><img src="<?php echo TENUP_THEME_DIST_URL . 'svg/sharer/fb-icon.svg' ?>" alt="Facebook Icon" ></a>
				<a href="#"><img src="<?php echo TENUP_THEME_DIST_URL . 'svg/sharer/x-icon.svg' ?>" alt="X Icon" ></a>
			</div>
		</div>
	</div>
</div>

<?php
endwhile; endif;

get_footer();

