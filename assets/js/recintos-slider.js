/**
 * Slider de Recintos y Programas Deportivos
 * Archivo: recintos-slider.js
 */

(function() {
  'use strict';
  
  console.log('📦 Archivo recintos-slider.js cargado');
  
  function initRecintosSlider() {
    console.log('🔍 Intentando inicializar slider de recintos...');
    
    const recintosElement = document.querySelector('.recintos-slider');
    
    if (!recintosElement) {
      console.warn('⚠️ No se encontró el elemento .recintos-slider');
      return;
    }
    
    console.log('✅ Elemento .recintos-slider encontrado:', recintosElement);
    
    const slides = recintosElement.querySelectorAll('.swiper-slide');
    console.log('📊 Número de slides encontrados:', slides.length);
    
    if (slides.length === 0) {
      console.warn('⚠️ No hay slides dentro de .recintos-slider');
      return;
    }
    
    try {
      const recintosSwiper = new Swiper('.recintos-slider', {
        slidesPerView: 3,
        spaceBetween: 20,
        centeredSlides: false,
        
        navigation: {
          nextEl: '.recintos-swiper-container .recintos-swiper-next',
          prevEl: '.recintos-swiper-container .recintos-swiper-prev',
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
        
        on: {
          init: function() {
            console.log('🎉 Slider de recintos inicializado correctamente');
          },
          slideChange: function() {
            console.log('📍 Slide actual:', this.activeIndex);
          },
        },
      });
      
      console.log('✨ Objeto Swiper creado:', recintosSwiper);
      
    } catch (error) {
      console.error('❌ Error al crear el slider de recintos:', error);
    }
  }
  
  // Inicializar cuando el DOM esté listo
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initRecintosSlider);
  } else {
    // DOM ya está listo
    initRecintosSlider();
  }
  
})();
