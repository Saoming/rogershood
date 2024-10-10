<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package TenUpTheme
 */

get_header(); ?>

<div class="page-container">
	<section class="rh-block notfound__content bg-blue">
		<div class="container notfound__container text-center">
			<h1 class="notfound__title">404</h1>
			<div class="notfound__subtitle ff-scilla">Something went wrong</div>
			<div class="notfound__description">We can’t find the page you are looking for.</div>
			<div class="notfound__cta">
				<a class="rh-button"
				   href="<?php echo home_url(); ?>">
					Back to Home
				</a>
			</div>
		</div>
	</section>
</div>

<?php
get_footer();
?>
