<section class="text-video-container rh-block bg-blue" id="<?php echo esc_attr( $args['id'] ); ?>" style="background: url('<?php echo esc_url( $args['text_and_video_background']['url'] ); ?>')">
	<div class="text-video-inner row">
		<div class="col-sm-12 col-lg-6 text-center text-video-inner-content">
			<div class="text-video-subheading"><?php echo esc_attr( $args['text_and_video_subheading'] ); ?></div>
			<h2 class="text-video-section-title"><?php echo esc_attr( $args['text_and_video_heading'] ); ?></h2>
			<div class="wysig-text-video__container">
				<?php echo wp_kses_post( $args['text_and_video_description'] ); ?>
			</div>
			<?php if ( $args['text_video_cta'] ) : ?>
			<a
				class="rh-button"
				href="<?php echo esc_url( $args['text_video_cta']['link'] ); ?>"
				aria-label="Link to <?php esc_attr( $args['text_video_cta']['title'] ); ?> page"
				target="<?php echo esc_attr( $args['text_video_cta']['target'] ); ?>"
			>
				<?php echo esc_html( $args['text_video_cta']['title'] ); ?>
			</a>
			<?php endif; ?>
		</div>

		<video class="col-sm-12 col-lg-6 w-full object-cover" controls poster="<?php echo esc_url( $args['text_video_poster_image']['url'] ); ?>" >
			<source src="<?php echo esc_url( $args['text_and_video_video'] ); ?>" type="video/mp4" />
		</video>
	</div>
</section>


