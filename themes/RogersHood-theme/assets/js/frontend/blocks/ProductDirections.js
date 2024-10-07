import $ from 'jquery';

const ProductDirections = () => {

	$(document).ready(function () {

		// Check if the screen width is less than 768px
		if (window.innerWidth < 768) {
			$('.product-directions__items').slick({
				slidesToScroll: 1,
				dots: true,
				arrows: false,
				autoplay: false,
				infinite: true,
				draggable: true,
				variableWidth: true
			});
		}

		// Remove Slick slider when resizing above 768px
		$(window).on('resize', function () {
			if (window.innerWidth >= 768) {
				if ($('.product-directions__items').hasClass('slick-initialized')) {
					$('.product-directions__items').slick('unslick');
				}
			} else {
				if (!$('.product-directions__items').hasClass('slick-initialized')) {
					$('.product-directions__items').slick({
						slidesToScroll: 1,
						dots: true,
						arrows: false,
						autoplay: false,
						infinite: true,
						draggable: true,
						variableWidth: true
					});
				}
			}
		});
	});
}

export default ProductDirections;
