import $ from 'jquery';

const FoundersSlider = () => {


	document.addEventListener('DOMContentLoaded', () => {
		if (!document.querySelector('.founders-slider__slider')) {
			return;
		}

		$('.founders-slider__slider').slick({
			slidesToScroll: 1,
			arrows: false,
			dots: false,
			autoplay: false,
			draggable: false,
			fade: true
		});

		$('.founders-slider__next').click(function () {
			$(this).closest('.founders-slider__slider').slick('slickNext');
		});
	})

}

export default FoundersSlider;
