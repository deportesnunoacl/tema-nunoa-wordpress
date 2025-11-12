<?php
/**
 * Template para la página Sobre Nosotros
 * URL esperada: /directorios
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
      </div>
      <!-- Slider Swiper Fin -->
<div class="container mx-auto mt-20 grid grid-cols-1 md:grid-cols-3 gap-12">

  <!-- IZQUIERDA (1/3) -->
  <div class="flex flex-col justify-start col-span-1">
    <h3 class="font-gabarito font-bold text-4xl leading-tight max-w-sm">
      Directorio Corporación Municipal de Deportes de Ñuñoa
    </h3>

    <p class="font-roboto text-lg text-gray-700 mt-6 max-w-sm text-justify">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non 
      tempor neque. Quisque cursus feugiat risus, id interdum neque tempus vel. 
      Suspendisse tristique libero ornare leo dignissim facilisis.
    </p>
  </div>

  <!-- DERECHA (2/3) -->
  <div class="grid grid-cols-3 ">

    <!-- CARD 1 -->
    <div class="flex flex-col items-center text-center">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sebass.png"
           class="w-28 h-28 object-cover rounded-xl shadow-md">
      <h4 class="mt-3 font-gabarito font-semibold text-lg">Sebastián Sichel</h4>
      <p class="text-gray-600 text-sm">Presidente</p>
    </div>

    <!-- CARD 2 -->
    <div class="flex flex-col items-center text-center">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/kareng.png"
           class="w-28 h-28 object-cover rounded-xl shadow-md">
      <h4 class="mt-3 font-gabarito font-semibold text-lg">Karen Gallardo</h4>
      <p class="text-gray-600 text-sm">Directora</p>
    </div>

    <!-- CARD 3 -->
    <div class="flex flex-col items-center text-center">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pedrol.png"
           class="w-28 h-28 object-cover rounded-xl shadow-md">
      <h4 class="mt-3 font-gabarito font-semibold text-lg">Pedro Lira</h4>
      <p class="text-gray-600 text-sm">Cargo</p>
    </div>

    <!-- CARD 4 -->
    <div class="flex flex-col items-center text-center">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cristiand.png"
           class="w-28 h-28 object-cover rounded-xl shadow-md">
      <h4 class="mt-3 font-gabarito font-semibold text-lg">Cristian Dettoni</h4>
      <p class="text-gray-600 text-sm">Cargo</p>
    </div>

    <!-- CARD 5 -->
    <div class="flex flex-col items-center text-center">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/elizardov.png"
           class="w-28 h-28 object-cover rounded-xl shadow-md">
      <h4 class="mt-3 font-gabarito font-semibold text-lg">Elizardo Vera</h4>
      <p class="text-gray-600 text-sm">Cargo</p>
    </div>

  </div>
</div>


    </div>
  </section>
</main>

<?php
get_footer();
