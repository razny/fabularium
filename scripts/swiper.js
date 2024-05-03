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
        // When window width is <= 768px (mobile)
        768: {
            slidesPerView: 1,
        },
        // When window width is > 768px (desktop)
        992: {
            slidesPerView: 'auto',
        }
    }
});