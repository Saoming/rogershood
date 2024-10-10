<?php
/**
 * Renders the Point Information block
 */

$class_name = isset( $block['className'] ) ? $block['className'] : '';

$title           = get_field( 'title' );
$description     = get_field( 'description' );
$columns         = get_field( 'columns' );
$container_class = count( $columns ) === 4 ? '' : 'container--narrow';
$column_class    = count( $columns ) === 4 ? 'col-md-3' : 'col-md-4';
if ( ! get_field( 'block_preview' ) ) {
	?>

	<div class="rh-block point-information bg-blue <?php echo esc_attr( $class_name ); ?>">
		<div class="container <?php echo $container_class; ?>">
			<?php if ( $title ) { ?>
				<h2 class="point-information__title text-center">
					<?php echo esc_html( $title ); ?>
				</h2>
			<?php }
			if ( $description ) { ?>
				<div class="point-information__description text-center text-body-20">
					<?php echo wp_kses_post( $description ); ?>
				</div>
			<?php } ?>
			<div class="row point-information__column-container">
				<?php if ( have_rows( 'columns' ) ) : while ( have_rows( 'columns' ) ) : the_row(); ?>
					<div class="point-information__column has-border-radius bg-white <?php echo $column_class; ?>">
						<?php
						$image_id           = get_sub_field( 'icon' );
						$column_title       = get_sub_field( 'title' );
						$column_description = get_sub_field( 'description' );
						?>
						<div class="product-information__image-container">
							<?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
						</div>
						<div class="product-information__column-content">
							<?php if ( $column_title ) { ?>
								<div class="product-information__column-title text-center text-body-22">
									<?php echo esc_html( $column_title ); ?>
								</div>
							<?php }
							if ( $column_description ) { ?>
								<div class="product-information__column-description text-center">
									<?php echo wp_kses_post( $column_description ); ?>
								</div>
							<?php } ?>
						</div>

					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div data="gutenberg-preview-img">
		<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ) ?>">
	</div>
<?php } ?>
