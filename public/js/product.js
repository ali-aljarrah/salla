var swiper = new Swiper(".swiper-container", {
	slidesPerView: 3,
	loop: true,
	centeredSlides: true,
	spaceBetween: 5,
    autoplay: {
		delay: 3000,
        enabled: true
	},
    breakpoints: {
          1024: {
            slidesPerView: 3,
          },

          768: {
            slidesPerView: 1,
          },

          0: {
            slidesPerView: 1,
          },

    }
});
