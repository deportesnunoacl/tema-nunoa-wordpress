<?php
/**
 * Template para la página Sobre Nosotros
 * URL esperada: /informacion-general
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

          <div class="w-full max-w-4xl mx-auto mt-10">

        <p class="font-roboto font-light text-lg mt-6 text-justify leading-relaxed">
          <strong>Somos Ñuñoa Deportes, la Corporación Municipal de Deportes de la comuna de Ñuñoa, que es conocida por ser el centro del deporte nacional.</strong> Tenemos un gran potencial de espacios públicos y áreas verdes para desarrollar políticas que incentiven la realización de actividades físicas y deportivas, prácticas que deben acompañar de forma sistemática el fomento de un estilo de vida sana para ñuñoínos y ñuñoíñas.
          <br><br>
          Durante el año 2000, antes de la creación de la Corporación Municipal de Deportes de Ñuñoa, el área de deporte estaba radicada en la Dirección de Desarrollo Comunitario, las actividades deportivas se concentraban en 15 talleres con casi 3.000 participantes. Desde el año 2003, cuando se crea la Corporación, el crecimiento de talleres, horarios, oferta deportiva y participación comunal, es constante.
          <br><br>
          En la actualidad, son más de 11 mil vecinos y vecinas quienes de forma diaria practican actividades en los más de 250 talleres que impartimos. Nuestra motivación como Corporación Municipal de Deportes de Ñuñoa es continuar desarrollando planes integrales de promoción y práctica de actividad física y deporte comunal, así como el fortalecimiento del trabajo intersectorial en el ámbito comunitario, escolar y laboral, en coordinación con ministerios, servicios, Gobierno Regional, universidades, fundaciones y organizaciones sociales y deportivas.
          <br><br>
          Ñuñoa Deportes basa su trabajo en una labor colaborativa con distintos actores y actrices del ecosistema deportivo y del tejido social de la comuna, para dar cumplimiento a las demandas ciudadanas, desarrollando nuestro quehacer en base a tres enfoques que declaramos fundamentales:
        </p>

        <!-- TARJETAS  -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">

          <!-- Tarjeta 1 -->
          <div class="border rounded-2xl shadow-sm p-6">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/genero.png" class="w-10 mb-4" alt="">
            <h4 class="font-gabarito font-semibold text-xl mb-3">Género</h4>
            <p class="font-roboto text-base leading-relaxed text-gray-600">
              Énfasis en eliminación de barreras de género en el acceso
              a la práctica sistemática de actividad física, estableciendo
              en todas las acciones, programas y proyectos el enfoque de
              género, derribando estereotipos y por sobre todo
              generando espacios seguros, libres de abuso y acoso.
            </p>
          </div>

          <!-- Tarjeta 2 -->
          <div class="border rounded-2xl shadow-sm p-6">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/curso.png" class="w-10 mb-4" alt="">
            <h4 class="font-gabarito font-semibold text-xl mb-3">Curso de vida</h4>
            <p class="font-roboto text-base leading-relaxed text-gray-600">
              Énfasis en la participación de la población en todos sus rangos etarios y acorde a sus intereses.
            </p>
          </div>

          <!-- Tarjeta 3 -->
          <div class="border rounded-2xl shadow-sm p-6">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/derecho.png" class="w-10 mb-4" alt="">
            <h4 class="font-gabarito font-semibold text-xl mb-3">Derecho</h4>
            <p class="font-roboto text-base leading-relaxed text-gray-600">
              Énfasis en los sectores más vulnerables social, económica y territorialmente (garantías de acceso).
            </p>
          </div>

        </div>

      </div>
      <!-- SECCIÓN DE RECINTOS -->
<section class="w-full mt-20">
  <div class="container mx-auto max-w-6xl">

    <!-- Título -->
    <h2 class="font-gabarito font-bold text-3xl mb-3">
      Recintos Deportivos de Ñuñoa
    </h2>

    <p class="font-roboto text-lg text-gray-600 mb-10 max-w-3xl">
      Como Corporación Municipal de Deportes de Ñuñoa contamos con
varios recintos deportivos entre los que están el Polideportivo de
Ñuñoa, el Gimnasio Ñuñoa Plaza y el Club Ñuñoa. También tenemos
canchas de fútbol, multicanchas y actividades en Juntas de Vecinos
a través del programa Deporte en Tu Barrio y en colegios municipales
mediante Escuelas Abiertas.
    </p>

<!-- Grid de tarjetas -->
<div class="grid  gap-8">

  <!-- Tarjeta 1 -->
  <div class="flex flex-col md:flex-row bg-white border rounded-2xl shadow-md overflow-hidden">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/polideportivo.png" 
         alt="Polideportivo de Ñuñoa"
         class="w-28 h-28 object-cover">

    <div class="p-5 flex flex-col justify-center">
      <h3 class="font-gabarito font-semibold text-xl text-green-600 mb-2">
        Polideportivo de Ñuñoa
      </h3>
      <p class="text-sm font-roboto text-gray-700 leading-relaxed">
        Lunes a Viernes 06:00 a 22:00<br>
        Sábados 09:00 a 13:30 hrs<br>
        Juan Moya Morales 1370, Ñuñoa
      </p>
    </div>
  </div>

  <!-- Tarjeta 2 -->
  <div class="flex flex-col md:flex-row bg-white border rounded-2xl shadow-md overflow-hidden">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gimnasio.png" 
         alt="Gimnasio Ñuñoa Plaza"
         class=" w-28 h-28 object-cover">

    <div class="p-5 flex flex-col justify-center">
      <h3 class="font-gabarito font-semibold text-xl text-green-600 mb-2">
        Gimnasio Ñuñoa Plaza
      </h3>
      <p class="text-sm font-roboto text-gray-700 leading-relaxed">
        Lunes a Viernes 07:00 a 21:45 hrs<br>
        Sábados 08:00 a 12:45 hrs<br>
        Maratón de Sables 151, Ñuñoa
      </p>
    </div>
  </div>

  <!-- Tarjeta 3 -->
  <div class="flex flex-col md:flex-row bg-white border rounded-2xl shadow-md overflow-hidden">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gimnasio.png" 
         alt="Gimnasio Ñuñoa Plaza 2"
         class="w-28 h-28 object-cover">

    <div class="p-5 flex flex-col justify-center">
      <h3 class="font-gabarito font-semibold text-xl text-green-600 mb-2">
        Gimnasio Ñuñoa Plaza 2
      </h3>
      <p class="text-sm font-roboto text-gray-700 leading-relaxed">
        Lunes a Viernes 07:00 a 21:45 hrs<br>
        Sábados 08:00 a 12:45 hrs<br>
        Maratón de Sables 151, Ñuñoa
      </p>
    </div>
  </div>

</div>

  </div>
</section>


    </div>
  </section>
</main>

<?php
get_footer();
