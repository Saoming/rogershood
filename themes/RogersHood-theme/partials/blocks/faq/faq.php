<?php
/**
 * Renders the FAQ Block
 */
?>

<style>
	.fs-block {
		width: 1440px;
		max-width: 100%;
		padding-left: 20px;
		padding-right: 20px;
		position: relative;
	}

	.container {
		max-width: 1180px;
		margin-left: auto;
		margin-right: auto;
	}

	.container--narrow {
		max-width: 1550px;
	}

	[class*=" col-"],
	[class^="col-"] {
		padding-left: 20px;
		padding-right: 20px;
	}
</style>
<?php

$title       = get_field( 'intro_title' );
$description = get_field( 'intro_description' );
$image       = get_field( 'intro_image' );
$cta         = get_field( 'intro_cta' );

$alignment_class        = get_field( 'alignment' ) ? 'text-center' : '';
$background_color_class = get_field( 'background_color' ) ? 'bg-blue' : '';

if ( $cta ) {
	$cta_text = isset( $cta['text'] ) ? $cta['text'] : '';
	$cta_link = isset( $cta['url'] ) ? $cta['url'] : '';
}
?>


<div class="fs-block faq-block">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-5">
				<div class="faq-intro__inner">
					<?php if ( $title ) { ?>
						<h2 class="faq-intro__title"><?php echo esc_html( $title ); ?></h2>
					<?php }
					if ( $description ) { ?>
						<div class="faq-intro__description"><?php echo wp_kses_post( $description ); ?></div>
					<?php }
					if ( $image ) { ?>
						<div class="faq-intro__image">
							<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
						</div>
					<?php }
					if ( $cta ) { ?>
						<div class="faq-intro__cta">
							<a href="<?php echo esc_url( $cta_link ); ?>"
							   class="btn btn-primary"><?php echo esc_html( $cta_text ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-6 col-lg-7">
				<?php
				if(have_rows('question_section')) : while(have_rows('question_section')) : the_row();
						$section_title = get_sub_field('section_title');
						if($section_title) {
							echo '<h3 class="faq-section-title">' . $section_title . '</h3>';
						}
						if(have_rows('questions')) : while(have_rows('questions')) : the_row();
							$question = get_sub_field('question_content');
							$answer = get_sub_field('answer_content');
							if($question && $answer) {
								echo '<div class="faq-question">';
								echo '<h4 class="faq-question__title">' . $question . '</h4>';
								echo '<div class="faq-question__answer">' . $answer . '</div>';
								echo '</div>';
							}
							endwhile;
							endif;
				?>
				<?php endwhile;  endif; ?>
			</div>

		</div>
	</div>
</div>
