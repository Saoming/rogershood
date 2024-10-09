class SplideCarousel {
	constructor(element) {
		this.element = element;
	}

	splideSettings() {
		const elms = document.getElementsByClassName('splide');

		for (let i = 0; i < elms.length; i++) {
			// eslint-disable-next-line no-undef
			const splide = new Splide(elms[i]);
			const carouselID = splide.root.id;
			const { AutoScroll } = window.splide.Extensions;
			// eslint-disable-next-line no-undef
			const primary = new Splide('#testimonialsCarousel');
			// eslint-disable-next-line no-undef
			const secondary = new Splide('#testimonialPersonSlider');
			const btnPrev = document.querySelector('.testimonial-arrow-prev');
			const btnNext = document.querySelector('.testimonial-arrow-next');

			switch (carouselID) {
				case 'testimonialsCarousel':
				case 'testimonialPersonSlider':
					primary.sync(secondary);
					primary.mount();
					secondary.mount();

					btnPrev.addEventListener('click', () => {
						primary.go('-1');
					});
					btnNext.addEventListener('click', () => {
						primary.go('+1');
					});
					break;
				case 'headerBanner':
					splide.mount({ AutoScroll });
					break;
				default:
					splide.mount();
					break;
			}
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
