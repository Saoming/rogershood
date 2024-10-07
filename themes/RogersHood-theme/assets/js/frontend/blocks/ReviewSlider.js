import $ from 'jquery';

const ReviewSlider = () => {
	$(document).ready(function () {


		$('.review-slider__slides').slick({
			slidesToScroll: 1,
			dots: false,
			arrows: false,
			autoplay: false,
			infinite: true,
			draggable: true,
			variableWidth: true,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						variableWidth: false,
						slidesToShow: true
					}
				}
			]
		});

		$('.js-reviews-slider__arrow-next').click(function () {
			$(this).closest('.review-slider').find('.review-slider__slides').slick('slickNext');
		});

		$('.js-reviews-slider__arrow-prev').click(function () {
			$(this).closest('.review-slider').find('.review-slider__slides').slick('slickPrev');
		});
	})
}

export default ReviewSlider;
