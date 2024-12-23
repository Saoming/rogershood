<?php
/**
 * The template for displaying the header.
 *
 * @package TenUpTheme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

		<?php get_template_part( 'partials/header/header' ); ?>

		<a href="#main" class="skip-to-content-link visually-hidden-focusable"><?php esc_html_e( 'Skip to main content', 'tenup-theme' ); ?></a>

		<main id="main" role="main" tabindex="-1">
