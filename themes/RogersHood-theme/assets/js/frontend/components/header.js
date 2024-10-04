class Header {
	constructor(element) {
		this.element = element;
	}

	toggleMenu() {
		const mobilebtn = document.querySelector('#mobile-navigation-button');

		mobilebtn.addEventListener('click', () => {
			const nav = document.querySelector('#mobile-navigation');
			nav.classList.toggle('hidden');
		});
	}

	toggleMega() {
		// const menuItems = document.querySelectorAll('#menu-primary-menu .wrapper-level-0 ');
	}

	fireWhenReady(func) {
		// call method when DOM is loaded
		return document.addEventListener('DOMContentLoaded', func);
	}

	init() {
		this.fireWhenReady(this.toggleMenu);
	}
}

export default Header;
