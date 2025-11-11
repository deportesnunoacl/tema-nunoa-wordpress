<?php
/**
 * Template para la página Sobre Nosotros
 * URL esperada: /mision-vision
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

      <div class="w-full flex flex-col items-center gap-16 grid-cols-1 md:grid-cols-3 mt-16">
        <div class="flex flex-col items-center text-center max-w-3xl">
          <h3 class="font-gabarito font-normal text-4xl">
            <strong>Misión</strong>
          </h3>
          <p class="font-roboto font-light text-xl mt-6 leading-relaxed">
            La Corporación Municipal de Deportes de Ñuñoa busca promover, 
            fomentar, difundir y desarrollar programas deportivos que apunten 
            a satisfacer las necesidades de esparcimiento de sus vecinos y 
            organizaciones sociales. Realizando actividades en los distintos 
            recintos, instalaciones, unidades vecinales y espacios públicos, 
            cuyo objetivo principal es <strong>mejorar la calidad de vida de nuestros
            vecinos y queridos habitantes de Ñuñoa.</strong>
          </p>
        </div>
          <hr class="w-1/2 border-0 border-t-4 border-gray-300 my-20 mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 mt-16" />
        <div class="flex flex-col items-center text-center max-w-3xl grid-cols-1 md:grid-cols-3 gap-12 mt-16">
          <h3 class="font-gabarito font-normal text-4xl">
            <strong>Visión</strong>
          </h3>
          <p class="font-roboto font-light text-xl mt-6 leading-relaxed">
            La Corporación Municipal de Deportes de Ñuñoa apunta a ser el líder 
            en su gestión profesional. Realizando actividades de excelencia en deporte 
            y salud sustentado en la calidad humana y profesional de sus funcionarios, 
            el gran sentido de trabajo en equipo y la variedad de su oferta e instalaciones, 
            <strong>aspiramos a convertirnos en el principal referente deportivo de la comuna de Ñuñoa.</strong>
          </p>
        </div>
    </div>
  </section>
</main>

<?php
get_footer();
