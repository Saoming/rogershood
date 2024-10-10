import $ from 'jquery';

const PopularReels = () => {

	$(document).ready(function() {


		$('.popular-reels__videos').slick({
			slidesToScroll: 1,
			dots: false,
			arrows: false,
			autoplay: false,
			infinite: true,
			draggable: true,
			variableWidth: true
		});

		$('.js-popular-reels__arrow-next').click(function() {
			$(this).closest('.popular-reels__slider').find('.popular-reels__videos').slick('slickNext');
		});
	})
}

export default PopularReels;
