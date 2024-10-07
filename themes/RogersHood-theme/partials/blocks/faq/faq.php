<?php
/**
 * Renders the FAQ Block
 */

$title       = get_field( 'intro_title' );
$description = get_field( 'intro_description' );
$image       = get_field( 'intro_image' );
$cta         = get_field( 'intro_cta' );

$alignment_class        = get_field( 'text_align' ) ? 'text-center' : '';
$background_color_class = get_field( 'background_color' ) ? 'bg-blue' : '';

if ( $cta ) {
	$cta_text   = isset( $cta['title'] ) ? $cta['title'] : '';
	$cta_link   = isset( $cta['url'] ) ? $cta['url'] : '';
	$cta_target = isset( $cta['target'] ) ? $cta['target'] : '';
}

if ( ! get_field( 'block_preview' ) ) {

	?>


	<div class="rh-block faq-block <?php echo esc_attr( "$background_color_class" ); ?>">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-5">
					<div class="faq-block__intro__inner <?php echo esc_attr( "$alignment_class" ); ?>">
						<?php if ( $title ) { ?>
							<h2 class="faq-block__intro__title"><?php echo esc_html( $title ); ?></h2>
						<?php }
						if ( $description ) { ?>
							<div class="faq-block__intro__description text-body-20"><?php echo wp_kses_post( $description ); ?></div>
						<?php }
						if ( $cta ) { ?>
							<div class="faq-block__intro__cta button-primary">
								<a href="<?php echo esc_url( $cta_link ); ?>" <?php echo esc_attr( $cta_target ); ?>
								   class="button button-primary"><?php echo esc_html( $cta_text ); ?></a>
							</div>
						<?php }
						if ( $image ) { ?>
							<div class="faq-block__intro__image">
								<?php echo wp_get_attachment_image( $image, 'full' ); ?>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-6 col-lg-7">
					<div class="faq-block__questions-container">
						<?php
						if ( have_rows( 'question_section' ) ) : while ( have_rows( 'question_section' ) ) : the_row();
							$section_title = get_sub_field( 'section_title' );
							?>
							<div class="faq-block__questions-section">
								<?php
								if ( $section_title ) {
									echo '<h3 class="faq-block__section-title">' . $section_title . '</h3>';
								}
								if ( have_rows( 'questions' ) ) : while ( have_rows( 'questions' ) ) : the_row();
									$question = get_sub_field( 'question_content' );
									$answer   = get_sub_field( 'answer_content' );
									if ( $question && $answer ) {
										?>
										<div class="faq-block__question">
											<h4 class="faq-block__question-title"><?php echo wp_kses_post( $question ); ?>
												<span class="faq-block__question-icon"></span>
											</h4>

											<div class="faq-block__question-answer">
												<div class="faq-block__question-answer--inner">
													<?php echo wp_kses_post( $answer ); ?>
												</div>
											</div>
										</div>
										<?php
									}
								endwhile;
								endif;
								?>
							</div>
						<?php endwhile; endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div data="gutenberg-preview-img">
		<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ) ?>">
	</div>
<?php } ?>
