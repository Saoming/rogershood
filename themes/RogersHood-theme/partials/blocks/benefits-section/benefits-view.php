<section
	class="benefits-section__container page-container"
>
	<?php if ( $args['sub_heading_benefits'] ) : ?>
		<div class="sub-heading-benefits"><?php echo esc_attr( $args['sub_heading_benefits'] ); ?></div>
		<?php endif; ?>
	<?php
	if ( $args['heading_benefits'] ) :
		?>
		<h2 class="heading-benefits"><?php echo esc_attr( $args['heading_benefits'] ); ?></h2>
	<?php endif; ?>
	<?php
	if ( $args['cards_repeater_benefits'] ) :
		?>
		<section
			class="benefits-card-container splide"
			role="group"
			aria-label="Check our Testimonials Slider"
			data-splide='{"type":"slide", "arrows": false, "autoplay": false, "pagination": false, "focus": "center", "drag": true, "autoScroll": { "autoStart": false }, "mediaQuery": "min", "breakpoints": {"640": {"destroy": true, "perPage": "1"}}}'
		>
			<div class="splide__track">
				<ul class="splide__list" data-splide-interval="8000">
					<?php
					foreach ( $args['cards_repeater_benefits'] as  $single_benefit ) :
						?>
						<li class="benefit-card-item splide__slide">
						<?php
						echo wp_get_attachment_image(
							$single_benefit['icon_benefits']['id'],
							array( 50, 50 ),
							false,
							array( 'class' => 'img-responsive' )
						);
						?>
						<?php if ( $single_benefit['title_card_benefits'] ) : ?>
						<h5 class="benefit-card-heading"><?php echo esc_attr( $single_benefit['title_card_benefits'] ); ?></h5>
						<?php endif; ?>
						<?php if ( $single_benefit['description_benefits'] ) : ?>
						<p class="benefit-card-desc"><?php echo esc_textarea( $single_benefit['description_benefits'] ); ?></p>
						<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>
	<?php endif; ?>
</section>
