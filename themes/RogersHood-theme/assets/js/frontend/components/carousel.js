class SplideCarousel {
	constructor(element) {
		this.element = element;
	}

	splideSettings() {
		const elms = document.getElementsByClassName('splide');
		const { AutoScroll } = window.splide.Extensions;
		const storeNotification = document.getElementsByClassName('store-notifications__container');

		for (let i = 0; i < elms.length; i++) {
			// eslint-disable-next-line no-undef
			if (storeNotification) {
				new Splide(elms[i]).mount({ AutoScroll });
			}
			new Splide(elms[i]).mount();
		}
	}

	fireWhenReady(func) {
		// call method when DOM is loaded
		return document.addEventListener('DOMContentLoaded', func);
	}

	init() {
		this.fireWhenReady(this.splideSettings);
	}
}

export default SplideCarousel;
