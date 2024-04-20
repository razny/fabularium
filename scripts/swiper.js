var mySwiper = new Swiper ('.swiper', {
    loop: true,
    slidesPerView: 'auto',
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
  });
