<?php
/**
 * Template Name: Plain Content
 *
 * @package TenUpTheme
 */
get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>
	<div class="page-container">
		<div class="plain-content__inner bg-beige">
			<h1 class="plain-content__title text-center">
				<?php the_title(); ?>
			</h1>
			<div class="container container--tiny">
				<div class="plain-content__content bg-white">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
<?php
endwhile; endif;

get_footer();
