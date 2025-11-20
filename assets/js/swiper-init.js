document.addEventListener("DOMContentLoaded", () => {
  console.log("Inicializando todos los sliders");

  // 1. Slider principal (Hero)
  const heroSwiper = document.querySelector(".mySwiper");
  if (heroSwiper) {
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
    console.log("✓ Slider principal inicializado");
  }

  // 2. Slider Sobre Nosotros
  const sobreNosotrosElement = document.querySelector(".sobre-nosotros-swiper");
  if (sobreNosotrosElement) {
    new Swiper(".sobre-nosotros-swiper", {
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
    console.log("✓ Slider Sobre Nosotros inicializado");
  }

  // 3. Slider de Recintos y Programas
  const recintosElement = document.querySelector(".recintos-slider");
  if (recintosElement) {
    new Swiper(".recintos-slider", {
      slidesPerView: 3,
      spaceBetween: 20,
      centeredSlides: false,
      navigation: {
        nextEl: ".swiper-btn-next",
        prevEl: ".swiper-btn-prev",
      },
      grabCursor: true,
      breakpoints: {
        0: {
          slidesPerView: 2,
          spaceBetween: 15,
        },
        640: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 25,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
        1280: {
          slidesPerView: 4,
          spaceBetween: 35,
        },
      },
    });
    console.log("✓ Slider de Recintos inicializado");
  } else {
    console.error("❌ Elemento .recintos-slider NO encontrado en el DOM");
  }
});
