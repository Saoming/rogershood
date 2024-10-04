import '../../css/frontend/style.css';

// import foo from './components/bar';
import Header from './components/header';
import SplideCarousel from './components/carousel';

const header = new Header();
header.init();

const splideCarousel = new SplideCarousel();
splideCarousel.init();
