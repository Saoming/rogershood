class HeroSlider {
	constructor(element) {
		this.element = element;
	}

	swiperSettings() {
		// eslint-disable-next-line no-undef
		const swiper = new Swiper('.swiper', {
			loop: true,
			slidesPerView: 4.3,
			spaceBetween: 12,
			autoplay: {
				delay: 5000,
			},
			breakpoints: {
				320: {
					slidesPerView: 1.3,
					spaceBetween: 12,
					centeredSlides: true,
				},
				480: {
					slidesPerView: 1.3,
					spaceBetween: 12,
					centeredSlides: true,
				},
				768: {
					slidesPerView: 2.3,
					spaceBetween: 12,
				},
				1024: {
					slidesPerView: 4.3,
					spaceBetween: 12,
				},
			},
			on: {
				init() {
					// eslint-disable-next-line no-undef
					this.slides.forEach((slide) => {
						slide.style.width = '311px';
						slide.style.height = '342px';
					});
				},
			},
		});

		swiper.init();
	}

	fireWhenReady(func) {
		// call method when DOM is loaded
		return document.addEventListener('DOMContentLoaded', func);
	}

	init() {
		this.fireWhenReady(this.swiperSettings);
	}
}

export default HeroSlider;
