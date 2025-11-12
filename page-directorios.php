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
<div class="container mx-auto mt-20 grid grid-cols-2 md:grid-cols-1 gap-12 w-full px-4 sm:px-6 lg:px-8">

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
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">

  <!-- CARD 1 -->
  <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center text-center hover:shadow-xl transition-all duration-300 border border-gray-100 transform hover:-translate-y-1">
    <div class="w-32 h-32 rounded-full overflow-hidden shadow-md mb-4 border-4 border-blue-100">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sebass.png"
           class="w-full h-full object-cover"
           alt="Sebastián Sichel">
    </div>
    <h4 class="font-gabarito font-bold text-xl text-gray-800 mb-2">Sebastián Sichel</h4>
    <p class="text-blue-600 font-semibold text-lg bg-blue-50 px-4 py-1 rounded-full">Presidente</p>
  </div>

  <!-- CARD 2 -->
  <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center text-center hover:shadow-xl transition-all duration-300 border border-gray-100 transform hover:-translate-y-1">
    <div class="w-32 h-32 rounded-full overflow-hidden shadow-md mb-4 border-4 border-blue-100">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/kareng.png"
           class="w-full h-full object-cover"
           alt="Karen Gallardo">
    </div>
    <h4 class="font-gabarito font-bold text-xl text-gray-800 mb-2">Karen Gallardo</h4>
    <p class="text-blue-600 font-semibold text-lg bg-blue-50 px-4 py-1 rounded-full">Directora</p>
  </div>

  <!-- CARD 3 -->
  <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center text-center hover:shadow-xl transition-all duration-300 border border-gray-100 transform hover:-translate-y-1">
    <div class="w-32 h-32 rounded-full overflow-hidden shadow-md mb-4 border-4 border-blue-100">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pedrol.png"
           class="w-full h-full object-cover"
           alt="Pedro Lira">
    </div>
    <h4 class="font-gabarito font-bold text-xl text-gray-800 mb-2">Pedro Lira</h4>
    <p class="text-blue-600 font-semibold text-lg bg-blue-50 px-4 py-1 rounded-full">Director</p>
  </div>

  <!-- CARD 4 -->
  <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center text-center hover:shadow-xl transition-all duration-300 border border-gray-100 transform hover:-translate-y-1">
    <div class="w-32 h-32 rounded-full overflow-hidden shadow-md mb-4 border-4 border-blue-100">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cristiand.png"
           class="w-full h-full object-cover"
           alt="Cristian Dettoni">
    </div>
    <h4 class="font-gabarito font-bold text-xl text-gray-800 mb-2">Cristian Dettoni</h4>
    <p class="text-blue-600 font-semibold text-lg bg-blue-50 px-4 py-1 rounded-full">Director</p>
  </div>

  <!-- CARD 5 -->
  <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center text-center hover:shadow-xl transition-all duration-300 border border-gray-100 transform hover:-translate-y-1">
    <div class="w-32 h-32 rounded-full overflow-hidden shadow-md mb-4 border-4 border-blue-100">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/elizardov.png"
           class="w-full h-full object-cover"
           alt="Elizardo Vera">
    </div>
    <h4 class="font-gabarito font-bold text-xl text-gray-800 mb-2">Elizardo Vera</h4>
    <p class="text-blue-600 font-semibold text-lg bg-blue-50 px-4 py-1 rounded-full">Director</p>
  </div>

</div>


    </div>
  </section>
</main>

<?php
get_footer();
