<?php
/**
 * Renders the ingredient grid block
 *
 */

$title = get_field( 'title' );
if ( ! get_field( 'block_preview' ) ) {

	?>

	<div class="ingredient-grid">
		<div class="row">
			<div class="col-md-12">
				<div class="ingredient-grid__title">
					<?php echo esc_html( $title ); ?>
				</div>
			</div>
			<?php if ( have_rows( 'ingredients' ) ) : while ( have_rows( 'ingredients' ) ) : the_row();
				$title       = get_sub_field( 'ingredient_name' );
				$description = get_sub_field( 'description' );
				$image       = get_sub_field( 'ingredient_photo' );
				?>
				<div class="col-md-4 col-lg-3">
					<div class="ingredient-grid__single">
						<div class="ingredient-grid__image">
							<?php
							// TODO: add size to image
							echo wp_get_attachment_image( $image, 'full' );
							?>
						</div>
						<div class="ingredient-grid__single-container">
							<div class="ingredient-grid__single-title">
								<?php echo wp_kses_post( $title ); ?>
							</div>
							<div class="ingredient-grid__single-icon">
								<img src="<?php echo esc_url( TENUP_THEME_DIST_URL . '/svg/plus.svg' ); ?>"
									 alt="Get Ingredient Details">
							</div>
						</div>
						<div class="ingredient-grid__single-description js-ingredient-grid__single-description" hidden>
							<?php echo wp_kses_post( $description ); ?>
						</div>
					</div>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
<?php } else { ?>
	<div data="gutenberg-preview-img">
		<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ) ?>">
	</div>
<?php } ?>
