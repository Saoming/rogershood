const Tabs = () => {

	document.addEventListener('DOMContentLoaded', () => {
		const tabContainers = document.querySelectorAll('.rh-tabs');

		tabContainers.forEach((container) => {
			const tabTitles = container.querySelectorAll('.rh-tab__title');
			const tabContents = container.querySelectorAll('.rh-tab__content');

			tabTitles.forEach((title) => {
				title.addEventListener('click', () => {
					const targetTab = title.getAttribute('data-tab');

					// Remove 'active' class from all titles and contents
					tabTitles.forEach((item) => item.classList.remove('active'));
					tabContents.forEach((content) => content.classList.remove('active'));

					// Add 'active' class to the clicked title and corresponding content
					title.classList.add('active');
					const targetContent = container.querySelector('#' + targetTab);
					if (targetContent) {
						targetContent.classList.add('active');
					}
				});
			});
		});
	});
}

export default Tabs;
