<?php
/**
 * Renders the Popular Reeels block
 */


$pretitle = get_field( 'pretitle' );
$title    = get_field( 'title' );
if ( ! get_field( 'block_preview' ) ) {
	?>

	<div class="rh-block popular-reels">
		<div class="container">
			<?php if ( $pretitle ) { ?>
				<div class="popular-reels__pretitle text-center">
					<?php echo esc_textarea( $pretitle ); ?>
				</div>
			<?php }
			if ( $title ) { ?>
				<h2 class="popular-reels__title text-center">
					<?php echo esc_html( $title ); ?>
				</h2>
			<?php } ?>

		</div>
		<div class="popular-reels__slider">
			<div class="popular-reels__video-container">
				<div class="popular-reels__videos">
					<?php if ( have_rows( 'reels' ) ) : while ( have_rows( 'reels' ) ) : the_row();
						$short_id = get_sub_field( 'youtube_short_id' );
						?>
						<div class="popular-reels__video">
							<iframe width="315" height="560"
									src="https://www.youtube.com/embed/<?php echo esc_attr( $short_id ); ?>&controls=0&rel=0"
									title="YouTube video player"
									frameborder="0"
									class="popular-reels__embed"
									allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope"
									allowfullscreen
							></iframe>
						</div>
					<?php endwhile; endif; ?>
				</div>

			</div>
			<img src="<?php echo TENUP_THEME_DIST_URL . '/svg/circle-arrow.svg'; ?>"
				 class="popular-reels__arrow-next js-popular-reels__arrow-next"
				 alt="Next Reel">
		</div>
	</div>
<?php } else { ?>
	<div data="gutenberg-preview-img">
		<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ) ?>">
	</div>
<?php } ?>
