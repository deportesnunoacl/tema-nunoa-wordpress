document.addEventListener("DOMContentLoaded", () => {
  new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
});

document.addEventListener("DOMContentLoaded", () => {
  // Slider principal de Sobre Nosotros
  const sobreNosotrosSwiper = new Swiper(".sobre-nosotros-swiper", {
    loop: true,
    centeredSlides: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    speed: 800,
    spaceBetween: 20,
    slidesPerView: 1,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 1,
      },
      1024: {
        slidesPerView: 1,
      },
    },
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const recintosSwiper = new Swiper('.recintos-programas-slider', {
    slidesPerView: 3,
    spaceBetween: 20,
    centeredSlides: false,
    
    navigation: {
      nextEl: '.swiper-btn-next',
      prevEl: '.swiper-btn-prev',
    },
    
    grabCursor: true,
    
    breakpoints: {
      // Mobile
      320: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      // Tablet
      640: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
      // Desktop pequeño
      768: {
        slidesPerView: 5,
        spaceBetween: 25,
      },
      // Desktop
      1024: {
        slidesPerView: 6,
        spaceBetween: 30,
      },
      // Desktop grande
      1280: {
        slidesPerView: 7,
        spaceBetween: 35,
      }
    },
    
    loop: false,
    freeMode: false,
  });
});

