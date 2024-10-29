<div class="rh-block tiktok-feed">
		<div class="container container--relative">
			<?php if ( $args['title'] ) { ?>
				<h2 class="tiktok-feed__title text-center">
					<?php echo esc_html( $args['title'] ); ?>
				</h2>
				<?php
			}
			if ( $args['description'] ) {
				?>
				<div class="tiktok-feed__description text-center">
					<?php echo wp_kses_post( $args['description'] ); ?>
				</div>
				<?php
			}
			?>
			<div class="tiktok-feed__socials-container">
				<?php if ( $args['facebook_link'] ) { ?>
					<a href="<?php echo esc_url( $args['facebook_link'] ); ?>" class="tiktok-feed__social-link" target="_blank">
						<img src="<?php echo TENUP_THEME_DIST_URL . '/svg/social-icons/facebook.svg'; ?>"
							alt="Facebook">
					</a>
					<?php
				}
				if ( $args['instagram_link'] ) {
					?>
					<a href="<?php echo esc_url( $args['instagram_link'] ); ?>" class="tiktok-feed__social-link"
						target="_blank">
						<img src="<?php echo TENUP_THEME_DIST_URL . '/svg/social-icons/instagram.svg'; ?>"
							alt="Instagram">
					</a>
					<?php
				}
				if ( $args['tiktok_link'] ) {
					?>
					<a href="<?php echo esc_url( $args['tiktok_link'] ); ?>" class="tiktok-feed__social-link" target="_blank">
						<img src="<?php echo TENUP_THEME_DIST_URL . '/svg/social-icons/tiktok.svg'; ?>" alt="Tiktok">
					</a>
				<?php } ?>
			</div>

			<?php if ( $args['video_repeater'] ) : ?>
				<div class="video-feed__container">
					<?php foreach ( $args['video_repeater'] as $video_repeater ) : ?>
						<div class="video-feed__item">
							<video width="230" height="394" src=<?php echo esc_url( $video_repeater['video_url']['url'] ); ?>" controls poster="<?php echo esc_url( $video_repeater['video_poster_background']['url'] ); ?>" type="video/mp4" ></video>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
