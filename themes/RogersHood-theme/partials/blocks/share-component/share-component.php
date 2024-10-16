<?php

if ( ! get_field( 'block_preview' ) ) { ?>
	<div class="single-post__share">
		<div class="single-post__share-title">
			Share
		</div>
		<div class="single-post__share-buttons">
			<button
					onclick='window.location.href = "mailto:?body=<?php the_permalink(); ?>"; '
			>

				<img src="<?php echo TENUP_THEME_DIST_URL . 'svg/sharer/email-icon.svg' ?>" alt="Email Icon">
			</button>
			<button data-sharer="facebook" data-url="<?php the_permalink(); ?>">
				<img src="<?php echo TENUP_THEME_DIST_URL . 'svg/sharer/fb-icon.svg' ?>" alt="Facebook Icon">
			</button>
			<button data-sharer="x" data-title="Check out this interesting post!" data-url="<?php the_permalink(); ?>">
				<img src="<?php echo TENUP_THEME_DIST_URL . 'svg/sharer/x-icon.svg' ?>" alt="X Icon">
			</button>
		</div>
	</div>
<?php } else { ?>
	<div data="gutenberg-preview-img">
		<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ) ?>">
	</div>
<?php } ?>
