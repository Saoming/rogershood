<section class="testimonials-container rh-block" id="<?php echo esc_attr( $args['id'] ); ?>">
	<div class="testimonials-arrow-controls">
			<button class="testimonial-arrow-prev">
				<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle cx="25" cy="25" r="25" transform="rotate(-180 25 25)" fill="#B5C3CD"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M37.5 25C37.5 24.779 37.4106 24.5671 37.2516 24.4108C37.0925 24.2546 36.8768 24.1668 36.6518 24.1668L16.6471 24.1668L23.6818 18.9242C23.841 18.7677 23.9305 18.5555 23.9305 18.3343C23.9305 18.113 23.841 17.9008 23.6818 17.7444C23.5225 17.5879 23.3065 17.5 23.0813 17.5C22.856 17.5 22.64 17.5879 22.4808 17.7444L13.9992 24.4101C13.9202 24.4875 13.8575 24.5794 13.8148 24.6807C13.772 24.7819 13.75 24.8904 13.75 25C13.75 25.1096 13.772 25.2181 13.8148 25.3193C13.8575 25.4206 13.9202 25.5125 13.9992 25.5899L22.4808 32.2556C22.5596 32.3331 22.6533 32.3946 22.7563 32.4365C22.8593 32.4784 22.9698 32.5 23.0813 32.5C23.3065 32.5 23.5225 32.4121 23.6818 32.2556C23.841 32.0992 23.9305 31.887 23.9305 31.6657C23.9305 31.4445 23.841 31.2323 23.6818 31.0758L16.6471 25.8332L36.6518 25.8332C36.8768 25.8332 37.0925 25.7454 37.2516 25.5892C37.4106 25.4329 37.5 25.221 37.5 25Z" fill="white"/>
				</svg>
			</button>

			<button class="testimonial-arrow-next">
				<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle cx="25" cy="25" r="25" fill="#B5C3CD"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 25C12.5 25.221 12.5894 25.4329 12.7484 25.5892C12.9075 25.7454 13.1232 25.8332 13.3482 25.8332L33.3529 25.8332L26.3182 31.0758C26.159 31.2323 26.0695 31.4445 26.0695 31.6657C26.0695 31.887 26.159 32.0992 26.3182 32.2556C26.4775 32.4121 26.6935 32.5 26.9187 32.5C27.144 32.5 27.36 32.4121 27.5192 32.2556L36.0008 25.5899C36.0798 25.5125 36.1425 25.4206 36.1852 25.3193C36.228 25.2181 36.25 25.1096 36.25 25C36.25 24.8904 36.228 24.7819 36.1852 24.6807C36.1425 24.5794 36.0798 24.4875 36.0008 24.4101L27.5192 17.7444C27.4404 17.6669 27.3467 17.6054 27.2437 17.5635C27.1407 17.5216 27.0302 17.5 26.9187 17.5C26.6935 17.5 26.4775 17.5879 26.3182 17.7444C26.159 17.9008 26.0695 18.113 26.0695 18.3343C26.0695 18.5555 26.159 18.7677 26.3182 18.9242L33.3529 24.1668L13.3482 24.1668C13.1232 24.1668 12.9075 24.2546 12.7484 24.4108C12.5894 24.5671 12.5 24.779 12.5 25Z" fill="white"/>
				</svg>
			</button>
	</div>
	<div class="testimonials-inner text-center">
		<div class="sub-heading-testimonials"><?php echo esc_attr( $args['sub_heading_grid_text'] ); ?></div>
		<h2 class="heading-testimonials"><?php echo esc_attr( $args['heading_grid_text'] ); ?></h2>
		<?php if ( $args['testimonials_repeaters'] ) : ?>
			<section
				id="testimonialPersonSlider"
				class="testimonial-person-container splide"
				role="group"
				aria-label="Check our Testimonials Content Slider"
				data-splide='{"type": "slide", "start": 3, "trimSpace": false, "arrows": false, "autoplay": false, "fixedWidth": "206px", "perPage": 5, "perMove": 1, "pagination": false, "focus": "center", "drag": false, "autoScroll": { "autoStart": false }}'
			>
			<div class="splide__track">
				<ul class="testimonial-list list-none splide__list">
					<?php foreach ( $args['testimonials_repeaters'] as $testimonials_repeater ) : ?>
						<li class="testimonial-item splide__slide">
							<img class="testimonial-img" src="<?php echo esc_url( $testimonials_repeater['testimonial_person_image']['url'] ); ?>" alt="<?php echo esc_attr( $testimonials_repeater['testimonial_person_image']['alt'] ); ?>" />
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			</section>
		<?php endif; ?>

		<?php if ( $args['testimonials_repeaters'] ) : ?>
			<section
				id="testimonialsCarousel"
				class="testimonial-box-container splide"
				role="group"
				aria-label="Check our Testimonials Content Slider"
				data-splide='{"type": "slide", "start": 3, "arrows": false, "autoplay": false, "perPage": 1, "pagination": false, "focus": "center", "drag": true, "autoScroll": { "autoStart": false }}'
			>
				<div class="splide__track">
					<ul class="list-none splide__list">
						<?php foreach ( $args['testimonials_repeaters'] as $testimonials_repeater ) : ?>
							<?php
							$cta = $testimonials_repeater['instagram_url'];
							if ( $cta ) {
								$cta_link   = $cta['url'];
								$cta_target = $cta['target'] ? $cta['target'] : '_self';
							}
							$cta2 = $testimonials_repeater['tiktok_url'];
							if ( $cta2 ) {
								$cta_link2   = $cta2['url'];
								$cta_target2 = $cta2['target'] ? $cta2['target'] : '_self';
							}
							?>
							<li class="testimonial-box-item text-center splide__slide">
								<svg width="30" height="25" viewBox="0 0 30 25" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M14.1615 0C6.80124 3.50379 4.28571 8.99621 3.91304 13.7311C4.65839 13.5417 5.31056 13.447 6.0559 13.447C9.13043 13.447 11.7391 16.0985 11.7391 19.2235C11.7391 22.4432 9.13043 25 6.0559 25C2.14286 25 0 21.875 0 18.6553C0 8.80682 7.26708 1.04166 14.1615 0ZM21.8944 13.447C24.9689 13.447 27.5776 16.0985 27.5776 19.2235C27.5776 22.4432 24.9689 25 21.8944 25C17.9814 25 15.8385 21.875 15.8385 18.6553C15.8385 8.80682 23.1056 1.04166 30 0C22.6397 3.50379 20.1242 8.99621 19.7516 13.7311C20.4969 13.5417 21.1491 13.447 21.8944 13.447Z" fill="#B5C3CD"/>
								</svg>
								<div class="testimonial-description">
									<?php echo wp_kses_post( $testimonials_repeater['testimonials_description'] ); ?>
								</div>
								<div class="testimonial-person">
									<strong><?php echo esc_attr( $testimonials_repeater['testimonial_person_name'] ); ?> </strong>,
									<?php echo esc_attr( $testimonials_repeater['testimonial_person_job_title'] ); ?>
								</div>

								<div class="testimonial-social">
									<?php if ( $cta ) : ?>
									<a
										href="<?php echo esc_url( $cta_link ); ?>"
										target="<?php echo esc_attr( $cta_target ); ?>"
										aria-label="Click to go to Instagram URL"
									>
										<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M13.0001 18.3332C14.4146 18.3332 15.7711 17.7713 16.7713 16.7711C17.7715 15.7709 18.3334 14.4143 18.3334 12.9998C18.3334 11.5853 17.7715 10.2288 16.7713 9.2286C15.7711 8.22841 14.4146 7.6665 13.0001 7.6665C11.5856 7.6665 10.229 8.22841 9.22885 9.2286C8.22865 10.2288 7.66675 11.5853 7.66675 12.9998C7.66675 14.4143 8.22865 15.7709 9.22885 16.7711C10.229 17.7713 11.5856 18.3332 13.0001 18.3332Z" stroke="#121212" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M1 18.3333V7.66667C1 5.89856 1.70238 4.20286 2.95262 2.95262C4.20286 1.70238 5.89856 1 7.66667 1H18.3333C20.1014 1 21.7971 1.70238 23.0474 2.95262C24.2976 4.20286 25 5.89856 25 7.66667V18.3333C25 20.1014 24.2976 21.7971 23.0474 23.0474C21.7971 24.2976 20.1014 25 18.3333 25H7.66667C5.89856 25 4.20286 24.2976 2.95262 23.0474C1.70238 21.7971 1 20.1014 1 18.3333Z" stroke="#121212" stroke-width="1.5"/>
											<path d="M20.3333 5.68081L20.3471 5.66553" stroke="#121212" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</a>
									<?php endif; ?>
									<?php if ( $cta2 ) : ?>
									<a
										href="<?php echo esc_url( $cta_link2 ); ?>"
										target="<?php echo esc_attr( $cta_target2 ); ?>"
										aria-label="Click to go to Tiktok URL"
									>
										<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M25 7.66667V18.3333C25 20.1014 24.2976 21.7971 23.0474 23.0474C21.7971 24.2976 20.1014 25 18.3333 25H7.66667C5.89856 25 4.20286 24.2976 2.95262 23.0474C1.70238 21.7971 1 20.1014 1 18.3333V7.66667C1 5.89856 1.70238 4.20286 2.95262 2.95262C4.20286 1.70238 5.89856 1 7.66667 1H18.3333C20.1014 1 21.7971 1.70238 23.0474 2.95262C24.2976 4.20286 25 5.89856 25 7.66667Z" stroke="#121212" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M10.333 13C9.54188 13 8.76852 13.2346 8.11073 13.6741C7.45293 14.1136 6.94024 14.7384 6.63749 15.4693C6.33474 16.2002 6.25553 17.0044 6.40987 17.7804C6.56421 18.5563 6.94517 19.269 7.50458 19.8284C8.06399 20.3878 8.77672 20.7688 9.55265 20.9231C10.3286 21.0775 11.1328 20.9983 11.8637 20.6955C12.5946 20.3928 13.2194 19.8801 13.6589 19.2223C14.0984 18.5645 14.333 17.7911 14.333 17V5C14.777 6.33333 16.4663 9 19.6663 9" stroke="#121212" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</a>
									<?php endif; ?>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</section>
		<?php endif; ?>
	</div>
</section>
