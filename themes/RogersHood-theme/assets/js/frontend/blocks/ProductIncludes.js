import $ from 'jquery';

const ProductIncludes = () => {
	$(document).ready(function ($) {
		// Hide all products initially
		$('.product-includes__product').hide();
		// Add click event to topics
		$('.product-includes__topic').on('click', function () {
			// Get the index of the clicked topic
			const productIndex = $(this).data('product-index');
			$('.product-includes__topic').removeClass('is-active');

			// Hide all products
			$('.product-includes__product').hide();
			$(this).addClass('is-active');
			// Show the corresponding product
			$(`.product-includes__product[data-product-index="${productIndex}"]`).fadeIn();
		});

		// Optionally, automatically select the first topic and product
		$('.product-includes__topic:first').trigger('click');
	});
};
export default ProductIncludes;
