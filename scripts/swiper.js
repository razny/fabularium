var mySwiper = new Swiper('.swiper', {
    loop: true,
    centeredSlides: false,
    autoplay: {
        enabled: true,
        delay: 1600,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    observer: false,
    breakpoints: {
        768: {
            slidesPerView: 1,
        },
        769: {
            slidesPerView: 'auto',
        },
        992: {
            slidesPerView: 'auto',
        },
    }
});