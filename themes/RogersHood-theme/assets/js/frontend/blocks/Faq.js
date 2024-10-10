const Faq = () => {


	document.addEventListener("DOMContentLoaded", function() {
		// Select all question titles
		const faqQuestions = document.querySelectorAll('.faq-block__question-title');

		if(!faqQuestions) {
			return;
		}

		faqQuestions.forEach((question) => {
			// Set ARIA attributes for accessibility
			question.setAttribute('aria-expanded', 'false');
			const answer = question.nextElementSibling;
			if (answer) {
				answer.setAttribute('aria-hidden', 'true');
			}

			// Add click event listener
			question.addEventListener('click', () => {
				const parentBlock = question.closest('.faq-block__question');
				if (parentBlock) {
					const isActive = parentBlock.classList.toggle('faq-block__question--active');

					// Update ARIA attributes based on active state
					question.setAttribute('aria-expanded', isActive.toString());
					if (answer) {
						answer.setAttribute('aria-hidden', (!isActive).toString());
					}
				}
			});
		});
	});
}

export default Faq;
