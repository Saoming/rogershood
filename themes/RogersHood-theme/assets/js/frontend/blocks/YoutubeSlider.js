import $ from 'jquery';

const YoutubeSlider = () => {
	$(document).ready(function () {
		$('.rh-youtube-slider__slides').slick({
			slidesToScroll: 1,
			dots: false,
			arrows: false,
			autoplay: false,
			infinite: false,
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

		$('.js-rh-youtube-slider__arrow-next').click(function () {
			$(this).closest('.js-slider-container').find('.rh-youtube-slider__slides').slick('slickNext');
		});

		$('.js-rh-youtube-slider__arrow-prev').click(function () {
			$(this).closest('.js-slider-container').find('.rh-youtube-slider__slides').slick('slickPrev');
		});
	})
}

export default YoutubeSlider;
