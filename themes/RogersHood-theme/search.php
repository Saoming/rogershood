<?php
/**
 * The template for displaying search results pages.
 *
 * @package TenUpTheme
 */

get_header(); ?>
	<section class="page-container" itemscope itemtype="https://schema.org/SearchResultsPage">
		<?php if ( have_posts() ) : ?>

			<div role="banner" class="search-result-banner rh-block">
				<div class="search-result-container bg-blue" id="<?php echo esc_attr( $args['id'] ); ?>">
					<div class="row">
						<div class="top-search-inner text-center">
							<h1 class="top-search-title">
							<?php
								/* translators: the search query */
								printf(
									esc_html(
										_n(
											'%1$s Search Result for: "%2$s"',
											'%1$s Search Results for: "%2$s"',
											$wp_query->found_posts,
											'tenup-theme',
										)
									),
									esc_html( $wp_query->found_posts ),
									'<span>' . esc_html( get_search_query() ) . '</span>',
								);
							?>
							</h1>
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
				<svg class="w-full" preserveAspectRatio="none" width="1440" height="67" viewBox="0 0 1440 67" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M5.49237e-06 -0.000812367L1440 -0.000679016C1440 -0.000679016 1304.38 43.851 1121.88 28.0861C939.391 12.3212 632.413 12.1738 415.845 51.4301C203.435 89.9327 1.96444e-06 42.7461 1.96444e-06 42.7461L5.49237e-06 -0.000812367Z" fill="#E0EAF7"/>
				</svg>
			</div>

			<ul class="search-result-list">
			<?php
			while ( have_posts() ) :
				the_post();
				?>

				<li class="search-result-item" itemscope itemtype="https://schema.org/Thing">
					<div class="search-result-item-inner">
						<div class="search-result-image">
						<?php
						if ( has_post_thumbnail() ) {
							echo wp_get_attachment_image( get_post_thumbnail_id(), array( 106, 106 ), false, array( 'itemprop' => 'image' ) );
						}
						?>
						</div>
						<div class="search-result-content">
							<?php
							the_title( '<span itemprop="name"><a href="' . esc_url( get_permalink() ) . '" itemprop="url">', '</a></span>' );
							?>
							<div class="description" itemprop="description">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>
				</li>

			<?php endwhile; ?>
			</ul>

			<?php the_posts_navigation(); ?>
		<?php else : ?>
			<section class="rh-block notfound__content bg-blue">
				<div class="container notfound__container text-center">
					<h1 class="notfound__title">
						<?php
							/* translators: the search query */
							printf(
								esc_html(
									_n(
										'%1$s Search Result for: "%2$s"',
										'%1$s Search Results for: "%2$s"',
										$wp_query->found_posts,
										'tenup-theme',
									)
								),
								esc_html( $wp_query->found_posts ),
								'<span>' . esc_html( get_search_query() ) . '</span>',
							);
						?>
					</h1>
					<?php get_search_form(); ?>
				</div>
			</section>
		<?php endif; ?>
	</section>

<?php
get_footer();
