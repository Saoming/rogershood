jQuery(document).ready(function($) {

	$(document).on('click','.js-cart-quantity-control',function(e){
		e.preventDefault();
		$reduce = parseInt($(this).data('change'));

		$amount = parseInt($(this).parent().find('.js-cart-quantity').val());
		$(this).parent().find('.js-cart-quantity').data('cart_item_key', $(this).data('cart-item-key'))
		console.log('dance 3322', $reduce, $amount);
		$amount += $reduce;
		console.log('dance 3322', $reduce, $amount);
		if( $amount > 0 ) {
			$(this).parent().find('.js-cart-quantity').val( $amount ).trigger('change');
		}
	});

	$(document).on('change', '.quantity-field .js-cart-quantity', function() {
		var qty = $(this).val();
		var cart_item_key = $(this).data('cart_item_key'); // Get the cart item key
		var qtyInput = $(this);

		// AJAX call to update cart quantity
		$.ajax({
			type: 'POST',
			url: dvlp_checkout.ajax_url,
			data: {
				action: 'update_cart_quantity',
				cart_item_key: cart_item_key,
				qty: qty
			},
			beforeSend: function() {
				qtyInput.prop('disabled', true); // Disable input during AJAX call
			},
			success: function(response) {
				if (response.success) {
					// Reload the checkout fragments to update totals
					$('body').trigger('update_checkout');
				} else {
					console.log('Error updating quantity');
				}
			},
			complete: function() {
				qtyInput.prop('disabled', false); // Re-enable input
			}
		});
	});

	$(document).on('click', '.woocommerce-remove-coupon', function(event) {
		$.ajax({
			type: 'POST',
			success: function (response) {
				if (response.success) {
					jQuery('body').trigger('update_checkout');
				} else {
					couponResult.text(response.data); // Show error message
				}
			},
			error: function () {
				couponResult.text("Something went wrong. Please try again.");
			}
		});
	});
	$(document).on('click', '#woo_apply_coupon', function(event) {
		event.preventDefault(); // Prevent the default button action

		var couponCode = $('#coupon_code').val().trim(); // Get the coupon code
		var couponResult = $('#coupon-result'); // Result container

		// Ensure the coupon code field is not empty
		if (couponCode === "") {
			couponResult.text("Please enter a coupon code.");
			return;
		}

		// AJAX request to apply the coupon
		$.ajax({
			type: 'POST',
			url:  dvlp_checkout.ajax_url,
			data: {
				action: 'apply_custom_coupon', // WordPress AJAX action
				coupon_code: couponCode // Pass the coupon code to the server
			},
			beforeSend: function() {
				couponResult.text("Applying coupon..."); // Show a loading message
			},
			success: function(response) {
				if (response.success) {
					couponResult.text("Coupon applied successfully!");
					jQuery('body').trigger('update_checkout');

				} else {
					couponResult.text(response.data); // Show error message
				}
			},
			error: function() {
				couponResult.text("Something went wrong. Please try again.");
			}
		});
	});
});
