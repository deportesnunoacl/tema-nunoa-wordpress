<?php
/**
 * Template para la página Sobre Nosotros
 * URL esperada: /recintos
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

      <div class="w-full grid grid-cols-3 ">

        <div class="flex flex-col">
          <h3 class="font-gabarito font-normal text-4xl max-w-96"> 
            <strong>
              RECINTOS  RECINTOS  RECINTOS  RECINTOS 
            </strong>
          </h3>
          <p class="font-roboto font-light text-xl mt-6 max-w-80 text-justify">
            <strong>Somos Ñuñoa Deportes, la Corporación Municipal de Deportes de la comuna de Ñuñoa, que es conocida por ser el centro del deporte nacional.</strong> Tenemos un gran potencial de espacios públicos y áreas verdes para desarrollar políticas que incentiven la realización de actividades físicas y deportivas, prácticas que deben acompañar de forma sistemática el fomento de un estilo de vida sana para ñuñoínos y ñuñoíñas.
          
Durante el año 2000, antes de la creación de la Corporación Municipal de Deportes de Ñuñoa, el área de deporte estaba radicada en la Dirección de Desarrollo Comunitario, las actividades deportivas se concentraban en 15 talleres con casi 3.000 participantes. Desde el año 2003, cuando se crea la Corporación, el crecimiento de talleres, horarios, oferta deportiva y participación comunal, es constante.

En la actualidad, son más de 11 mil vecinos y vecinas quienes de forma diaria practican actividades en los más de 250 talleres que impartimos. Nuestra motivación como Corporación Municipal de Deportes de Ñuñoa es continuar desarrollando planes integrales de promoción y práctica de actividad física y deporte comunal, así como el fortalecimiento del trabajo intersectorial en el ámbito comunitario, escolar y laboral, en coordinación con ministerios, servicios, Gobierno Regional, universidades, fundaciones y organizaciones sociales y deportivas.

Ñuñoa Deportes basa su trabajo en una labor colaborativa con distintos actores y actrices del ecosistema deportivo y del tejido social de la comuna, para dar cumplimiento a las demandas ciudadanas, desarrollando nuestro quehacer en base a tres enfoques que declaramos fundamentales:
        </div>

      </div>

    </div>
  </section>
</main>

<?php
get_footer();
