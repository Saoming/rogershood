<?php
/**
 * Renders the Support Cards Block
 *
 * @package rogershood-theme
 */

$id = 'support-cards-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}
// Block content
$fields = get_fields();
if ( ! get_field( 'block_preview' ) ) {
	?>

	<section class="rh-block support-cards"
			id="<?php echo esc_attr( $id ); ?>"
	>
		<div class="support-cards__container container container--narrow br-8">
			<?php if ( $fields['title'] ) { ?>
				<h2 class="support-cards__title text-center">
					<?php echo esc_html( $fields['title'] ?? '' ); ?>
				</h2>
			<?php } ?>
			<div class="row support-cards__cards">
				<?php foreach ( $fields['cards'] as $card ) { ?>
					<a class="support-cards___link col-sm-12 col-md-4"
						href="<?php echo esc_url( $card['cta']['url'] ?? '' ); ?>"
						target="<?php echo esc_attr( ! empty( $card['cta']['target'] ? $card['cta']['target'] : '' ) ); ?>">
						<div class="support-cards__card ">
							<?php echo esc_html( ! empty( $fields['cta']['title'] ) ? $fields['cta']['title'] : '' ); ?>

							<?php
							if ( $card['icon'] ) {
								echo wp_get_attachment_image( $card['icon'], 'full', null, array( 'class' => 'support-cards__card__icon' ) );
							} else {
								?>
								<img class="missing-image support-cards__card__icon"
									src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
							<?php } ?>
							<div class="support-cards__card__text">
								<?php if ( $card['title'] ) { ?>
									<h3 class="support-cards__card__title fs-18 mb-20"><?php echo esc_attr( ! empty( $card['title'] ) ? $card['title'] : '' ); ?></h3>
								<?php } ?>
								<?php if ( $card['description'] ) { ?>
									<div class="support-cards__card__description"><?php echo esc_attr( ! empty( $card['description'] ) ? $card['description'] : '' ); ?></div>
								<?php } ?>
							</div>
						</div>
					</a>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } else { ?>
	<div data="gutenberg-preview-img">
		<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
	</div>
<?php } ?>
