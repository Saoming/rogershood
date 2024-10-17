import $ from 'jquery';

const Cart = () => {

	if( ! document.querySelector('body').classList.contains('woocommerce-cart')) {
		return;
	}

	document.addEventListener('DOMContentLoaded', () => {
		addEventListeners();
	});

	$(document.body).on('updated_cart_totals', () => {
		addEventListeners();
	})

	function updateCart () {
		const updateCartButton = document.querySelector('.js-cart-update-cart');
		if( ! updateCartButton) {
			return;
		}

		updateCartButton.click();
	}


	function addEventListeners() {
		addInputValueChangeEventListener();
		addInputIncrementalButtonsEventListener();
	}

	function addInputValueChangeEventListener() {

		const quantityInputs = document.querySelectorAll('.js-cart-quantity');

		quantityInputs.forEach( input => {
			let debounceTimer;
			input.addEventListener('keyup', (e) => {
				if(e.target.value) {
					clearTimeout(debounceTimer);
					debounceTimer = setTimeout(() => {
						updateCart();
					}, 2000);
				}
			})
		});
	}

	function addInputIncrementalButtonsEventListener() {
		const cartButtons = document.querySelectorAll('.js-cart-quantity-control');

		if( ! cartButtons) {
			return;
		}

		cartButtons.forEach( button => {
			button.addEventListener('click', (e) => {
				e.preventDefault();
				let debounceTimer;

				const button = e.target.parentElement;
				const change = parseInt(button.dataset.change);
				const quantityInput = button.parentElement.querySelector('.js-cart-quantity');
				const value = parseInt(quantityInput.value);
				const newValue = value + change;

				if(newValue < 1) {
					return;
				}

				quantityInput.value = newValue;
				const updateCartButton = document.querySelector('.js-cart-update-cart');
				updateCartButton.disabled = false;


				clearTimeout(debounceTimer);
				debounceTimer = setTimeout(() => {
					updateCart();
				}, 2000);
			})
		})
	}
}


export default Cart;
