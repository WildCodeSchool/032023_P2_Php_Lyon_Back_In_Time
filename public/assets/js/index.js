function showSlider() {
	var sliderContainer = document.querySelector('#carousel');
	var sliderWrapper = document.querySelector('#slider-wrapper');
	var images = sliderWrapper.querySelectorAll('img');
	var activeIndex = 0;
	
	// Show the slider container
	sliderContainer.style.display = 'block';
	
	// Move to the next image on click
	sliderContainer.addEventListener('click', function() {
	  images[activeIndex].classList.remove('active');
	  activeIndex = (activeIndex + 1) % images.length;
	  images[activeIndex].classList.add('active');
	});
  }