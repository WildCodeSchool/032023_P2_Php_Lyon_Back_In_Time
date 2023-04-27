
import Lightbox from '/assets/js/bs5-lightbox.js';

const options = {
	keyboard: true,
	size: 'lg',
    constrain : true
};

document.querySelectorAll('.my-lightbox-toggle').forEach((el) => el.addEventListener('click', (e) => {
	e.preventDefault();
	const lightbox = new Lightbox(el, options);
	lightbox.show();
}));