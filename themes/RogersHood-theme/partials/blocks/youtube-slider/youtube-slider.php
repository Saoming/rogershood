<?php
/**
 * Renders the Youtube Slider
 *
 */

$pretitle = get_field( 'pretitle' );
$title    = get_field( 'title' );


?>
<div class="rh-block rh-youtube-slider">
	<div class="container">
		<div class="rh-youtube-slider__pretitle text-center">
			<?php echo esc_attr( $pretitle ); ?>
		</div>
		<h2 class="rh-youtube-slider__title text-center">
			<?php echo esc_attr( $title ); ?>
		</h2>
	</div>

	<?php if ( have_rows( 'video_slider' ) ) : while ( have_rows( 'video_slider' ) ) : the_row();

		$videos        = get_sub_field( 'videos' );
		$video_count   = count( $videos );
		$video_content = $video_count > 1 ? 'videos' : 'video';
		?>
		<div class="rh-youtube-slider__container js-slider-container">
			<div class="rh-youtube-slider__slider">
				<div class="">
					<div class="container--relative ">
						<?php if ( $title ) { ?>
							<div class="rh-youtube-slider__slider-title text-body-22 fw-500">
								<?php echo esc_html( $title ); ?>
								<span
									class="rh-youtube-slider__description"><?php echo esc_attr( "$video_count $video_content" ); ?></span>
							</div>
						<?php } ?>
						<?php if ( $video_count > 2 ) { ?>
							<img src="<?php echo TENUP_THEME_DIST_URL . '/svg/circle-arrow.svg'; ?>"
								 class="rh-youtube-slider__arrow rh-youtube-slider__arrow--prev js-rh-youtube-slider__arrow-prev"
								 alt="Previous Video">
							<img src="<?php echo TENUP_THEME_DIST_URL . '/svg/circle-arrow.svg'; ?>"
								 class="rh-youtube-slider__arrow rh-youtube-slider__arrow--next js-rh-youtube-slider__arrow-next"
								 alt="Next Video">
						<?php } ?>
					</div>
					<div class="rh-youtube-slider__slides">
						<?php if ( have_rows( 'videos' ) ) : while ( have_rows( 'videos' ) ) :the_row();
							$video_title      = get_sub_field( 'video_title' );
							$youtube_video_id = get_sub_field( 'youtube_video_id' );
							?>
							<div class="rh-youtube-slider__slide">
								<div class="rh-youtube-slider__video">
									<iframe
										class="has-border-radius"
										width="400" height="225"
										src="https://www.youtube.com/embed/<?php echo esc_attr( $youtube_video_id ); ?>"
										frameborder="0"
										allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
										allowfullscreen></iframe>
								</div>
								<?php if ( $video_title ) { ?>
									<div
										class="rh-youtube-slider__video-title text-body-18"><?php echo esc_html( $video_title ); ?></div>
								<?php } ?>
							</div>

						<?php endwhile;
						endif; ?>

					</div>
				</div>
			</div>
		</div>
	<?php endwhile; endif; ?>
</div>
