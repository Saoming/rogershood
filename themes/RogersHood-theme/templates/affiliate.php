<?php
/**
 * Template Name: Affiliate Form
 *
 * @package TenUpTheme
 */
get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>
	<div class="page-container  bg-beige"
	style="padding-top:100px; padding-bottom:100px">
		<div class="affiliate__inner">
			<h1 class="affiliate__title text-center">
				<?php the_title(); ?>
			</h1>
			<div class="container container--tiny">
				<div class="affiliate__content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
<?php
endwhile; endif;

get_footer();
