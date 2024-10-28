<div class="rh-block tiktok-feed">
		<div class="container container--relative">
			<?php if ( $title ) { ?>
				<h2 class="tiktok-feed__title text-center">
					<?php echo esc_html( $title ); ?>
				</h2>
			<?php }
			if ( $description ) { ?>
				<div class="tiktok-feed__description text-center">
					<?php echo wp_kses_post( $description ); ?>
				</div>
				<?php
			}
			?>
			<div class="tiktok-feed__socials-container">
				<?php if ( $facebook_link ) { ?>
					<a href="<?php echo esc_url( $facebook_link ); ?>" class="tiktok-feed__social-link" target="_blank">
						<img src="<?php echo TENUP_THEME_DIST_URL . '/svg/social-icons/facebook.svg'; ?>"
							 alt="Facebook">
					</a>
				<?php }
				if ( $instagram_link ) { ?>
					<a href="<?php echo esc_url( $instagram_link ); ?>" class="tiktok-feed__social-link"
					   target="_blank">
						<img src="<?php echo TENUP_THEME_DIST_URL . '/svg/social-icons/instagram.svg'; ?>"
							 alt="Instagram">
					</a>
				<?php }
				if ( $tiktok_link ) { ?>
					<a href="<?php echo esc_url( $tiktok_link ); ?>" class="tiktok-feed__social-link" target="_blank">
						<img src="<?php echo TENUP_THEME_DIST_URL . '/svg/social-icons/tiktok.svg'; ?>" alt="Tiktok">
					</a>
				<?php } ?>
			</div>
			<?php
			if ( $feed_shortcode_id ) { ?>
				<div class="tiktok-feed__feed">
					<?php echo do_shortcode( "[sbtt-tiktok feed=1]" ); ?>
				</div>
			<?php } ?>
		</div>
	</div>
