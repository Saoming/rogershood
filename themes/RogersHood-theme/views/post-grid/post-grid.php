<div class="rh-block post-grid">
	<div class="container">
		<?php if ( $pretitle ) { ?>
			<div class="post-grid__pretitle text-center">
				<?php echo esc_textarea( $pretitle ); ?>
			</div>

		<?php }
		if ( $title ) { ?>
			<h2 class="post-grid__title text-center">
				<?php echo esc_textarea( $title ); ?>
			</h2>
		<?php } ?>
		<div class="row post-grid__row">
			<?php if ( $posts_data ) {
				foreach ( $posts_data as $post ) {
					?>
					<div class="col-md-6 col-lg-4 post-grid__post">
						<a href="<?php echo esc_url( $post['permalink'] ); ?>"
						   class="posts-grid__image-container has-border-radius">
							<?php
							if ( isset( $post['thumbnail'] ) && $post['thumbnail'] ) {
								echo wp_get_attachment_image( $post['thumbnail'], 'rh-post-thumbnail' );
							} else { ?>
								<img
									src="<?php echo esc_url( TENUP_THEME_DIST_URL . 'images/placeholder/post-placeholder.jpeg' ); ?>"
									alt="Post Placeholder Image">
							<?php } ?>
						</a>

						<a href="<?php echo esc_url( $post['permalink'] ); ?>"
						   class="posts-grid__title-container fc-black fw-500">
							<?php echo esc_textarea( $post['title'] ); ?>
						</a>
						<?php if ( isset( $post['excerpt'] ) && $post['excerpt'] ) { ?>
							<div class="posts-grid__excerpt-container">
								<?php echo wp_kses_post( $post['excerpt'] ); ?>
							</div>
						<?php } ?>

						<?php if ( isset( $post['category_name'] ) && $post['category_name'] ) {
							$category_class = \TenUpTheme\Utility\convert_category_to_class( $post['category_name'] );
							?>
							<a href="<?php echo esc_url( $post['category_link'] ); ?>"
							   class="posts-grid__category-container post-grid--<?php echo esc_attr( $category_class ); ?>">
								<?php echo wp_kses_post( $post['category_name'] ); ?>
							</a>
						<?php } ?>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</div>
