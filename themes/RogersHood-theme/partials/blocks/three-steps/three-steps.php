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
echo '<pre>';
//var_dump( $fields );
echo '</pre>';
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
				<div class="three-steps__step__title mb-20"><?php echo esc_attr( $fields["step_1"]["title"] ); ?></div>
				<div class="three-steps__step__description"><?php echo esc_attr( $fields["step_1"]["description"] ); ?></div>
			</div>
			<div class="three-steps__step col-sm-12 col-md-4">
				<div class="three-steps__step__number mb-20">2</div>
				<div class="three-steps__step__title mb-20"><?php echo esc_attr( $fields["step_2"]["title"] ); ?></div>
				<div class="three-steps__step__description"><?php echo esc_attr( $fields["step_2"]["description"] ); ?></div>
			</div>
			<div class="three-steps__step col-sm-12 col-md-4">
				<div class="three-steps__step__number mb-20">3</div>
				<div class="three-steps__step__title mb-20"><?php echo esc_attr( $fields["step_3"]["title"] ); ?></div>
				<div class="three-steps__step__description"><?php echo esc_attr( $fields["step_3"]["description"] ); ?></div>
			</div>
		</div>
	</div>
</section>
