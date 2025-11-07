<?php
/**
 * Template para la página Sobre Nosotros
 * URL esperada: /sobre-nosotros
 */
get_header();
?>

<main class="w-full bg-white">
  <!-- Hero -->
  <section class="w-full">
    <div class="container mx-auto w-full py-20 flex flex-col  items-center gap-10">
      <!-- Slider Swiper -->
      <div class="w-full relative">
        <div class="swiper sobre-nosotros-swiper rounded-3xl overflow-hidden">
          <div class="swiper-wrapper">

            <!-- Slide 1 -->
            <div class="swiper-slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Slider1.png" 
                   alt="Historia Ñuñoa Deportes" 
                   class="w-full h-[400px] object-cover" />
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Slider2.png" 
                   alt="Equipo Ñuñoa Deportes" 
                   class="w-full h-[400px] object-cover" />
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Slider3.png" 
                   alt="Actividades Ñuñoa Deportes" 
                   class="w-full h-[400px] object-cover" />
            </div>

          </div>

          <!-- Paginación -->
          <div class="swiper-pagination !bottom-5"></div>

          <!-- Botones -->
          <div class="swiper-button-next text-white"></div>
          <div class="swiper-button-prev text-white"></div>
        </div>
      </div>
      <!-- Slider Swiper Fin -->

      <div class="w-full grid grid-cols-3 ">

        <div class="flex flex-col">
          <h3 class="font-gabarito font-normal text-4xl max-w-96">
            Lorem ipsum dolor sit amet, consectetur 
            <strong>
              adipiscing elit.
            </strong>
          </h3>
          <p class="font-roboto font-light text-xl mt-6 max-w-80 text-justify">
            Morbi ullamcorper ultrices convallis. Integer ornare condimentum pharetra. Suspendisse tincidunt leo sit amet malesuada blandit. Praesent nulla lacus, ultricies non auctor eu, viverra et metus. Vivamus non tempor neque. Quisque cursus feugiat risus, id interdum neque tempus vel. Etiam sit amet lacus iaculis, pellentesque leo consequat, blandit tellus. Mauris eu cursus tortor, ut fermentum eros.
          </p>
        </div>

      </div>

    </div>
  </section>
</main>

<?php
get_footer();
