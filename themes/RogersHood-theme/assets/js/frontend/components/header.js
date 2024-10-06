class Header {
	constructor(element) {
		this.element = element;
	}

	toggleMenu() {
		const mobilebtn = document.querySelector('#mobile-navigation-button');
		const closebtn = document.querySelector('#mobile-nav__close');
		const nav = document.querySelector('#mobile-navigation');

		closebtn.addEventListener('click', () => {
			nav.classList.toggle('hidden');
		});

		mobilebtn.addEventListener('click', () => {
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
			});
			item.addEventListener('mouseleave', () => {
				item.classList.remove('is-hovered');
			});
		});
	}

	toggleMegaMobile() {
		const menuItems = document.querySelectorAll('#menu-mobile-menu .wrapper-level-0');
		let activeItem = null;

		menuItems.forEach((item) => {
			const mega = item.querySelector('.mobile-sub-menu');
			const svg = item.querySelector('.mobile-menu-item__container svg');
			if (mega) {
				item.addEventListener('click', () => {
					if (activeItem && activeItem !== item) {
						const activeMega = activeItem.querySelector('.mobile-sub-menu');
						svg.classList.remove('rotate-90');
						activeMega.classList.remove('is-active');
						activeMega.setAttribute('aria-hidden', 'true');
					}

					svg.classList.toggle('rotate-90');
					mega.classList.toggle('is-active');
					const isActive = mega.classList.contains('is-active');
					mega.setAttribute('aria-hidden', isActive ? 'false' : 'true');

					activeItem = isActive ? item : null;
				});
			}
		});
	}

	fireWhenReady(func) {
		// call method when DOM is loaded
		return document.addEventListener('DOMContentLoaded', func);
	}

	init() {
		this.fireWhenReady(this.toggleMenu);
		this.fireWhenReady(this.toggleMega);
		this.fireWhenReady(this.toggleMegaMobile);
	}
}

export default Header;
