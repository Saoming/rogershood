import $ from 'jquery'

const SingleProductSlider = () => {


	$(document).ready(function () {

		$('.single-product-slider__slider').slick({
			slidesToScroll: 1,
			arrows: false,
			dots: false,
			autoplay: false,
			draggable: false,
			fade: true,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						dots: true
					}
				}
			]


		});

		$('.js-products-slider__arrow-next').click(function () {
			$(this).closest('.container').find('.single-product-slider__slider').slick('slickNext');
		});
	})


}

export default SingleProductSlider;
