<?php
/**
 * Renders the One Image with Content Block
 *
 * @package stride-theme
 */

$id = 'community-cards-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}


// Block content
$fields = get_fields();
echo '<pre>';
//var_dump( $fields );
echo '</pre>';
?>

<section class="rh-block rh-block--full-bleed  community-cards"
		 id="<?php echo esc_attr( $id ); ?>"
		 style="background-image: url(<?php echo esc_attr( $fields["background_image"]["url"] ); ?>"
>
	<div class="container container--narrow"
	>
		<?php if ( $fields["pretitle"] ) { ?>
			<h2 class="community-cards__pretitle text-center">
				<?php echo esc_attr( $fields["pretitle"] ); ?>
			</h2>
		<?php } ?>
		<?php if ( $fields["title"] ) { ?>
			<h2 class="community-cards__title text-center">
				<?php echo esc_attr( $fields["title"] ); ?>
			</h2>
		<?php } ?>
		<div class="container--inner">
			<?php foreach ( $fields["communities"] as $community ) { ?>
			<div class="community-cards__product">
				<div class="community-cards__product__row row">
					<div class="col-md-5 community-cards__product__image-container">
						<?php
						if ( $community["image"] ) {
							// TODO: Set image sizes when design
							echo wp_get_attachment_image( $community["image"], 'full', null, array( 'class' => 'community-cards__product__image' ) );
						} else {
							?>
							<img class="missing-image"
								 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
						<?php } ?>
					</div>
					<div class="col-md-7 community-cards__product__content">
						<div class="community-cards__product__content__inner">
							<?php if ( $community["title"] ) { ?>
								<div class="community-cards__product__title"><?php echo wp_kses_post( $community["title"] ); ?></div>
							<?php } ?>
							<div class="community-cards__product__section">
								<?php
								if ( $community["section_title_1"] ) {
									?>
									<div class="community-cards__product__section-title uppercase fw-500">
										<?php echo wp_kses_post( $community["section_title_1"] ); ?><span
												class="remove-on-mobile">:</span>
									</div>
									<?php
								}
								if ( $community["section_description_1"] ) {
									?>
									<div class="community-cards__product__section-description">
										<?php echo wp_kses_post( $community["section_description_1"] ); ?>
									</div>
								<?php } ?>
							</div>

					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
