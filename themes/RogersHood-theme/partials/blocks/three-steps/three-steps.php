<?php
/**
 * Renders the One Image with Content Block
 *
 * @package rogershood-theme
 */

$id = 'three-steps-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
// Block content
$fields = get_fields();
if ( ! get_field( 'block_preview' ) ) {
	?>

	<section class="rh-block rh-block-full-bleed three-steps"
			 id="<?php echo esc_attr( $id ); ?>"
	>
		<div class="three-steps__container container br-8">
			<?php if ( $fields["title"] ) { ?>
				<h2 class="three-steps__title text-center">
					<?php echo esc_attr( $fields["title"] ); ?>
				</h2>
			<?php } ?>
			<div class="row three-steps__steps">
				<div class="three-steps__step col-sm-12 col-md-4">
					<div class="three-steps__step__number mb-20">1</div>
					<?php if ( $fields["step_1"]["title"] ) { ?>
						<div class="three-steps__step__title mb-20"><?php echo esc_attr( $fields["step_1"]["title"] ); ?></div>
					<?php } ?>
					<?php if ( $fields["step_1"]["description"] ) { ?>
						<div class="three-steps__step__description"><?php echo esc_attr( $fields["step_1"]["description"] ); ?></div>
					<?php } ?>
				</div>
				<div class="three-steps__step col-sm-12 col-md-4">
					<div class="three-steps__step__number mb-20">2</div>
					<?php if ( $fields["step_2"]["title"] ) { ?>
						<div class="three-steps__step__title mb-20"><?php echo esc_attr( $fields["step_2"]["title"] ); ?></div>
					<?php } ?>
					<?php if ( $fields["step_2"]["description"] ) { ?>
						<div class="three-steps__step__description"><?php echo esc_attr( $fields["step_2"]["description"] ); ?></div>
					<?php } ?>
				</div>
				<div class="three-steps__step col-sm-12 col-md-4">
					<div class="three-steps__step__number mb-20">3</div>
					<?php if ( $fields["step_3"]["title"] ) { ?>
						<div class="three-steps__step__title mb-20"><?php echo esc_attr( $fields["step_3"]["title"] ); ?></div>
					<?php } ?>
					<?php if ( $fields["step_3"]["description"] ) { ?>
						<div class="three-steps__step__description"><?php echo esc_attr( $fields["step_3"]["description"] ); ?></div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
<?php } else { ?>
	<div data="gutenberg-preview-img">
		<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ) ?>">
	</div>
<?php } ?>
