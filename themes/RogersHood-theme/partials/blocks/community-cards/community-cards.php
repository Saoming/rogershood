<?php
/**
 * Renders the One Image with Content Block
 *
 * @package rogershood-theme
 */

$id = 'community-cards-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}


// Block content
$fields = get_fields();
?>

<section class="rh-block  community-cards"
		 id="<?php echo esc_attr( $id ); ?>"
		 style="background-image: url(<?php echo esc_attr( $fields["background_image"]["url"] ); ?>"
>
	<div class="container container--narrow"
	>
		<?php if ( $fields["pretitle"] ) { ?>
			<div class="community-cards__pretitle text-center fw-300 uppercase fs-16">
				<?php echo esc_attr( $fields["pretitle"] ); ?>
			</div>
		<?php } ?>
		<?php if ( $fields["title"] ) { ?>
			<h2 class="community-cards__title text-center">
				<?php echo esc_attr( $fields["title"] ); ?>
			</h2>
		<?php } ?>
		<div class="container--inner">
			<div class="community-card__row row">
				<?php
				$i = 1;
				foreach ( $fields["communities"] as $community ) { ?>
					<div class="community-card cols-sm-12  col-md-6 col-lg-3 <?php if ($i == 1) echo 'is-active'; ?> ">
						<div class=" community-card__image-container mb-20 br-12">
							<?php
							if ( $community["image"] ) {
								echo wp_get_attachment_image( $community["image"], 'full', null, array( 'class' => 'community-card__image br-12' ) );
							} else {
								?>
								<img class="missing-image"
									 src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/images/missing-image.png' ); ?>">
							<?php } ?>
							<?php if ( $community["cta"] ) { ?>
								<div class="community-card__cta">
									<a class="button community-card__button"
									   href="<?php echo esc_url( $community["cta"]["url"] ); ?>"
									   target="<?php echo esc_attr( $community["cta"]["target"] ); ?>"><?php echo esc_html( $community["cta"]["title"] ); ?></a>
								</div>
							<?php } ?>
						</div>
						<div class="community-card__content__inner text-center">
							<?php if ( $community["title"] ) { ?>
								<div class="community-card__title fs-22  ff-scilla mb-12"><?php echo wp_kses_post( $community["title"] ); ?></div>
								<?php
							}
							if ( $community["description"] ) { ?>
								<div class="community-card__title fs-16  fw-300"><?php echo wp_kses_post( $community["description"] ); ?></div>
							<?php } ?>
						</div>

					</div>
				<?php
				$i++;
				}
				?>
			</div>
		</div>
	</div>
</section>
