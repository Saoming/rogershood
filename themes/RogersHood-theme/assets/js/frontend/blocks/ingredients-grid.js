import * as basicLightbox from 'basiclightbox';

const IngredientsGrid = () => {
	document.addEventListener('DOMContentLoaded', () => {
		const ingredientsGridElements = document.querySelectorAll('.ingredient-grid__single');

		if (!ingredientsGridElements) {
			return;
		}

		ingredientsGridElements.forEach((ingredient) => {
			ingredient.addEventListener('click', (e) => {
				// Use e.currentTarget to make sure you have the right element
				const element = e.currentTarget;

				const description = element.querySelector('.js-ingredient-grid__single-description');

				// Check if description exists before proceeding
				if (!description) {
					return;
				}

				const descriptionContent = description.innerHTML;

				// Correct the typo in "descriptionContent"
				const instance = basicLightbox.create(
					`<div class="modal">${descriptionContent}</div>`
				);
				instance.show();
			});
		});
	});
};

export default IngredientsGrid;
