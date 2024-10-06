import '../../css/frontend/style.css';

import cart from './components/cart';
import Blocks from './blocks/blocks';
import Header from './components/header';
import SplideCarousel from './components/carousel';

document.addEventListener('DOMContentLoaded', function () {
	const cards = document.querySelectorAll('.community-card');
	// prettier-ignore
	cards.forEach(card => {
		card.addEventListener('mouseover', () => {
			cards.forEach(c => c.classList.remove('is-active'));
			card.classList.add('is-active');
		});

		card.addEventListener('mouseout', () => {
			card.classList.remove('is-active');
		});
	});
});

cart();
Blocks();

const header = new Header();
header.init();

const splideCarousel = new SplideCarousel();
splideCarousel.init();
