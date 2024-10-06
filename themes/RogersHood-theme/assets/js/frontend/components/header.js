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
		const menuItems = document.querySelectorAll('#menu-primary-menu .wrapper-level-0');
		const megaItems = document.querySelectorAll(
			' #menu-primary-menu .wrapper-level-0 .single_menu-item__container',
		);
		menuItems.forEach((item) => {
			const mega = item.querySelector('.sub-menu');
			const mega_item_container = item.querySelector('.menu-item__container');
			if (mega) {
				item.addEventListener('mouseenter', () => {
					mega_item_container.classList.add('is-hovered');
					mega.classList.add('is-active');
					mega.setAttribute('aria-hidden', 'false');
				});

				item.addEventListener('mouseleave', () => {
					mega_item_container.classList.remove('is-hovered');
					mega.classList.remove('is-active');
					mega.setAttribute('aria-hidden', 'true');
				});
			}
		});

		megaItems.forEach((item) => {
			item.addEventListener('mouseenter', () => {
				item.classList.add('is-hovered');
				item.setAttribute('aria-hidden', 'false');
			});
			item.addEventListener('mouseleave', () => {
				item.classList.remove('is-hovered');
				item.setAttribute('aria-hidden', 'true');
			});
		});
	}

	fireWhenReady(func) {
		// call method when DOM is loaded
		return document.addEventListener('DOMContentLoaded', func);
	}

	init() {
		this.fireWhenReady(this.toggleMenu);
		this.fireWhenReady(this.toggleMega);
	}
}

export default Header;
