<?php
/**
 * Template Part: Sección Hero + Oferta Deportiva (editable desde el Personalizador)
 * Requisitos:
 * - CPT: recintos
 * - Personalizador: campos nunoa_hero_title, nunoa_hero_text
 * - ACF (en recintos): imagen_fondo, icono, titulo_card
 */

// ===============================
// HERO SETTINGS (desde el personalizador)
// ===============================
$hero_title = get_theme_mod('nunoa_hero_title', 'Muévete con lo que<br><span class="font-bold">más te gusta</span>');
$hero_text  = get_theme_mod('nunoa_hero_text', 'Busca fácilmente entre todos nuestros talleres y espacios deportivos. Ingresa el nombre de la disciplina que te interesa y descubre dónde practicarla en Ñuñoa.');

$hero_bg = function_exists('get_field') ? get_field('hero_bg') : null;

if (is_array($hero_bg) && isset($hero_bg['url'])) {
  $hero_bg_url = esc_url($hero_bg['url']);
} else {
  $hero_bg_url = esc_url(get_template_directory_uri() . '/assets/img/BKG.jpg');
}
?>

<div class="w-full mt-10 relative min-h-[70vh]">
  <!-- Fondo -->
  <div class="absolute inset-0 -z-10">
    <img src="<?php echo $hero_bg_url; ?>" alt="" class="w-full h-screen object-cover" />
  </div>

  <!-- Contenido -->
  <div class="w-full container mx-auto z-10 relative py-10 px-5 flex flex-col gap-10 md:gap-20">
    <div class="w-full border border-primary rounded-3xl flex flex-col lg:flex-row justify-between items-center p-6 lg:p-10 gap-8">
      
      <!-- Texto editable desde el personalizador -->
      <div class="flex flex-col items-start max-w-md gap-5">
              <h2 id="hero-title" class="text-secondary text-3xl font-gabarito font-normal leading-snug">
                <?php echo wp_kses_post( get_theme_mod('nunoa_hero_title', 'Muévete con lo que<br><span class="font-bold">más te gusta</span>') ); ?>
              </h2>
              <p id="hero-text" class="text-sm lg:text-base font-roboto text-gray-800 leading-relaxed">
                <?php echo esc_html( get_theme_mod('nunoa_hero_text', 'Busca fácilmente entre todos nuestros talleres y espacios deportivos. Ingresa el nombre de la disciplina que te interesa y descubre dónde practicarla en Ñuñoa.') ); ?>
              </p>
      </div>

      <!-- Buscador nativo -->
      <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex flex-col gap-3 w-full max-w-xl">
        <div class="relative w-full">
          <input
            type="search"
            name="s"
            placeholder="Busca tu deporte"
            value="<?php echo esc_attr(get_search_query()); ?>"
            class="w-full rounded-full border border-gray-300 px-5 py-2.5 pr-10 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500 text-sm lg:text-base"
          />
          <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 17A7.5 7.5 0 1117 16.65z" />
          </svg>
        </div>
        <div class="flex justify-end">
          <button type="submit" class="bg-primary hover:bg-green-700 text-white text-sm font-semibold px-10 py-2 rounded-full transition">
            Buscar
          </button>
        </div>
      </form>
    </div>
    <!-- Sección de Oferta Deportiva -->
    <div class="w-full max-w-5xl mx-auto mt-20 flex flex-col">
      <div class="w-full flex flex-col md:flex-row items-center justify-center gap-10">
        <h3 class="text-4xl text-primary font-gabarito font-normal md:mr-10">
          Oferta <span class="font-bold">deportiva</span>
        </h3>
        <div class="flex flex-row">
          <div class="bg-primary p-3 md:w-[200px] px-10 md:px-0 flex items-center justify-center rounded-full">
            <span class="text-white font-roboto font-bold text-base">Recintos</span>
          </div>
        </div>
      </div>

      <?php
      // Query de recintos
      $recintos = new WP_Query(array(
        'post_type'      => 'recintos',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order title',
        'order'          => 'ASC',
        'no_found_rows'  => true,
      ));
      ?>

      <?php if ($recintos->have_posts()) : ?>
        <div class="w-full grid md:grid-cols-5 sm:grid-cols-3 grid-cols-1 items-center justify-items-center gap-6 mt-20">
          <?php while ($recintos->have_posts()) : $recintos->the_post();
            $imagen_fondo = function_exists('get_field') ? get_field('imagen_fondo') : null;
            $icono        = function_exists('get_field') ? get_field('icono')        : null;
            $titulo_card  = function_exists('get_field') ? get_field('titulo_card')  : null;
            $titulo_mostrar = $titulo_card ?: get_the_title();

            // Imagen fondo
            if ($imagen_fondo) {
              $bg_url = is_array($imagen_fondo) ? esc_url($imagen_fondo['url']) : esc_url(wp_get_attachment_image_url($imagen_fondo, 'large'));
            } elseif (has_post_thumbnail()) {
              $bg_url = esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large'));
            } else {
              $bg_url = esc_url(get_template_directory_uri() . '/assets/img/Card1Bg.png');
            }

            // Ícono
            if ($icono) {
              $icon_url = is_array($icono) ? esc_url($icono['url']) : esc_url(wp_get_attachment_image_url($icono, 'medium'));
            } else {
              $icon_url = esc_url(get_template_directory_uri() . '/assets/icons/deporte.svg');
            }
          ?>
            <a href="<?php echo esc_url(get_permalink()); ?>" class="relative w-[230px] md:w-full h-[350px] rounded-xl overflow-hidden group shadow-md">
              <img src="<?php echo $bg_url; ?>" alt="<?php echo esc_attr($titulo_mostrar); ?>" class="w-full h-full object-cover" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent z-10"></div>
              <div class="absolute z-20 top-[60%] right-0 bg-white rounded-full shadow-md">
                <img src="<?php echo $icon_url; ?>" alt="Icono <?php echo esc_attr($titulo_mostrar); ?>" class="w-14" />
              </div>
              <div class="absolute bottom-0 backdrop-blur-md bg-[#3DAE6A]/40 z-10 h-28 w-full flex items-center justify-center px-4">
                <h4 class="text-white text-lg font-gabarito font-semibold text-center"><?php echo esc_html($titulo_mostrar); ?></h4>
              </div>
            </a>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      <?php else: ?>
        <div class="mt-10 text-center text-gray-600">Aún no hay recintos publicados.</div>
      <?php endif; ?>
    </div>

    <div id="talleres-destacados" class="w-full flex md:flex-row flex-col justify-between items-center mt-16">
      <div class="flex flex-col gap-5">
        <h3 class="font-gabarito text-4xl text-secondary">
          <strong>Talleres destacados</strong> del mes
        </h3>
        <p class="font-roboto text-secondary max-w-xs">
          Explora nuevas disciplinas, horarios y espacios para mantenerte activo.
        </p>
        <button class="bg-primary text-white w-fit px-20 py-2 rounded-full hover:bg-green-700 transition font-semibold">
          Ver más
        </button>
      </div>
      <!-- Contenedor Swiper -->
       <div class="md:w-2/3 w-full mt-10">
         <div class="swiper talleres-swiper">
            <div class="swiper-wrapper" id="talleres-container">
              <!-- Las cards se insertan aquí desde JS -->
            </div>
          </div>
      </div>
        
  </div>
</div>
