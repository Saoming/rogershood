<section class="benefits-section__container page-container">
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
		<ul class="benefits-card-container">
			<?php
			foreach ( $args['cards_repeater_benefits'] as  $single_benefit ) :
				?>
				<li class="benefit-card-item">
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
	<?php endif; ?>

</section>
