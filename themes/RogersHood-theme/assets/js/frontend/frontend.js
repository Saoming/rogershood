import '../../css/frontend/style.css';

import Cart from './components/Cart';
import Blocks from './blocks/blocks';

document.addEventListener('DOMContentLoaded', function () {
	const cards = document.querySelectorAll('.community-card');
	// prettier-ignore
	cards.forEach(card => {
		card.addEventListener('mouseover', () => {
			cards.forEach(c => c.classList.remove('is-active'));
			card.classList.add('is-active');
		});

		card.addEventListener('mouseout', () => {
			card.classList.remove('is-active');
		});
	});
});

Cart();
Blocks();



document.addEventListener("DOMContentLoaded", function() {
	const selectElements = document.querySelectorAll(".custom-quantity-dropdown__select");

	// Set initial labels based on the default selection
	selectElements.forEach(selectElement => {
		updateLabel(selectElement);

		// Add event listener for each select element
		selectElement.addEventListener("change", function() {
			updateLabel(selectElement);
		});
	});
});

function updateLabel(selectElement) {
	const labelElement = selectElement.parentElement.querySelector(".custom-quantity-dropdown__label");
	const selectedValue = selectElement.options[selectElement.selectedIndex].text;

	labelElement.textContent = `${selectedValue} Qty`;
}
