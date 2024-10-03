<?php
/**
 * Renders the One Image with Content Block
 *
 * @package stride-theme
 */

$id = 'text-and-image-callout-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
// Block content
$image          = get_field( 'image' );
$pretitle       = get_field( 'pretitle' );
$title          = get_field( 'title' );
$description    = get_field( 'description' );
$call_to_action = get_field( 'call_to_action' );
if ( $call_to_action ) {
	$call_to_action_url    = $call_to_action['url'];
	$call_to_action_title  = $call_to_action['title'];
	$call_to_action_target = $call_to_action['target'] ? $call_to_action['target'] : '_self';
}

// Block settings
$background_color = get_field( 'background_color' );
$background_color = ! $background_color || 'none' === $background_color ? '' : $background_color;

// Image position - default LEFT
$image_position = get_field( 'image_position' ) ? 'text-and-image-callout--left' : '';

// Button Style - default PRIMARY
$button_style = get_field( 'button_style' );
if ( $button_style ) {
	$button_style_class = 'is-style--secondary';
} else {
	$button_style_class = 'is-style--primary';
}


wp_print_styles( 'text-and-image-callout' );
include TENUP_THEME_PATH . 'partials/dynamic-stylesheets/block-spacing-stylesheet.php';

?>
<!--TODO delete container class-->
<section
		class="rh-block text-and-image-callout <?php echo esc_attr( " $image_position " ); ?>"
		id="<?php echo esc_attr( $id ); ?>"
>
	<div class="text-and-image-callout__container container"
	>
		<div class="text-and-image-callout__row row">

			<div class="col-md-6 text-and-image-callout__column  text-and-image-callout__content"
				 style="background: <?php echo esc_attr( " $background_color " ); ?> ">
				<div class="text-and-image-callout__content__inner">
					<?php if ( $pretitle ) { ?>
						<div class="text-and-image-callout__pretitle pretitle ">
							<?php echo esc_attr( $pretitle ); ?>
						</div>
						<?php
					}
					if ( $title ) {
						?>
						<h2 class="text-and-image-callout__title">
							<?php echo esc_attr( $title ); ?>
						</h2>
						<?php
					}
					if ( $description ) {
						?>
						<div class="text-and-image-callout__description-container">
							<div class="text-and-image-callout__description"><?php echo wp_kses_post( $description ); ?></div>
						</div>
						<?php
					}

					if ( $call_to_action ) {
						?>
						<div class="text-and-image-callout__cta">
							<a class="button text-and-image-callout__button  <?php echo( esc_attr( $button_style_class ) ); ?>"
							   href="<?php echo esc_url( $call_to_action_url ); ?>"
							   target="<?php echo esc_attr( $call_to_action_target ); ?>"><?php echo esc_html( $call_to_action_title ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-6 text-and-image-callout__column text-and-image-callout__image-container">
				<?php
				if ( $image ) {
					// TODO: Set image sizes when design
					echo wp_get_attachment_image( $image, 'full', null, array( 'class' => 'text-and-image-callout__image' ) );
				} else {
					?>
					<img class="missing-image"
						 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
				<?php } ?>
			</div>
		</div>
	</div>
</section>
