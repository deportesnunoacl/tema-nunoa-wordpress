<?php
/**
 * Template Part: Slider de Recintos/Programas Deportivos
 */
?>

<div class="w-full bg-primary py-12">
  <div class="container mx-auto px-4">
    <!-- Título de la sección -->
    <h2 class="text-3xl md:text-4xl font-bold text-white text-center mb-8">
      Recintos y Programas <strong>Deportivos</strong>
    </h2>

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
      <!-- Agregar py-6 para padding vertical -->
      <div class="recintos-swiper-container relative py-6">
        <div class="swiper recintos-slider">
          <div class="swiper-wrapper items-center">
            <?php while ($recintos->have_posts()) : $recintos->the_post(); 
              // Obtener el campo ACF 'icono'
              $icono = get_field('icono');
              
              // Ícono
              if ($icono) {
                $icon_url = is_array($icono) ? esc_url($icono['url']) : esc_url(wp_get_attachment_image_url($icono, 'medium'));
              } else {
                $icon_url = esc_url(get_template_directory_uri() . '/assets/icons/deporte.svg');
              }
            ?>
              <!-- Agregar py-3 para espacio vertical en cada slide -->
              <div class="swiper-slide py-3">
                <a href="<?php the_permalink(); ?>" class="block text-center group">
                  <!-- Círculo con ícono -->
                  <div class="w-16 h-16 md:w-20 md:h-20 mx-auto mb-3 bg-white rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <img src="<?php echo $icon_url; ?>" alt="<?php the_title(); ?>" class="w-10 h-10 md:w-12 md:h-12 object-contain">
                  </div>
                  
                  <!-- Título debajo del círculo -->
                  <h3 class="text-white text-sm md:text-base font-semibold leading-tight px-2 group-hover:opacity-90 transition-opacity">
                    <?php the_title(); ?>
                  </h3>
                </a>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div>

        <!-- Botón anterior -->
        <button class="swiper-btn-prev absolute left-0 md:-left-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 md:w-12 md:h-12 flex items-center justify-center text-white opacity-70 hover:opacity-100 transition-all">
          <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>
        
        <!-- Botón siguiente -->
        <button class="swiper-btn-next absolute right-0 md:-right-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 md:w-12 md:h-12 flex items-center justify-center text-white opacity-70 hover:opacity-100 transition-all">
          <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
          </svg>
        </button>
      </div>

    <?php else : ?>
      <p class="text-white text-center text-lg">No hay recintos disponibles en este momento.</p>
    <?php endif; ?>
  </div>
</div>

