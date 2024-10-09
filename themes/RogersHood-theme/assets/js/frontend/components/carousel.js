class SplideCarousel {
	constructor(element) {
		this.element = element;
	}

	splideSettings() {
		const elms = document.getElementsByClassName('splide');

		for (let i = 0; i < elms.length; i++) {
			// const { AutoScroll } = window.splide.Extensions;
			// eslint-disable-next-line no-undef
			const splide = new Splide(elms[i]).mount();
			const carouselID = splide.root.id;
			const btnPrev = document.querySelector('.testimonial-arrow-prev');
			const btnNext = document.querySelector('.testimonial-arrow-next');

			if (carouselID === 'testimonialsCarousel' || carouselID === 'testimonialPersonSlider') {
				btnPrev.addEventListener('click', (e) => {
					console.log(e.target);
					splide.go('-1');
				});
				btnNext.addEventListener('click', (e) => {
					console.log(e.target);
					splide.go('+1');
				});
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
