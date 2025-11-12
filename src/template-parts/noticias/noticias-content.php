<main class="w-full bg-white">

<section class="relative w-full h-[400px] overflow-hidden">
  <?php 
    $banner_img   = get_theme_mod('nunoa_noticias_bg', get_template_directory_uri() . '/assets/img/BgVerde.png');
    $banner_title = get_theme_mod('nunoa_noticias_title', 'Noticias Ñuñoa Deportes');
    $banner_text  = get_theme_mod('nunoa_noticias_text', 'Infórmate sobre los últimos eventos, actividades y logros deportivos de nuestra comuna.');
  ?>
  <img src="<?php echo esc_url($banner_img); ?>" 
       alt="Banner Noticias" 
       class="absolute inset-0 w-full h-full object-cover z-0" />

  <div class="absolute inset-0 bg-black/50 z-10"></div>

  <div class="relative z-20 container mx-auto px-6 md:px-10 h-full flex flex-col justify-center">
    <h1 id="noticias-banner-title" class="text-5xl md:text-6xl font-gabarito font-bold text-white mb-4">
      <?php echo wp_kses_post($banner_title); ?>
    </h1>
    <p id="noticias-banner-text" class="text-lg md:text-xl text-white max-w-[600px]">
      <?php echo wp_kses_post($banner_text); ?>
    </p>
  </div>
</section>



  <!-- 📰 Listado de noticias -->
  <section class="container mx-auto px-6 md:px-10 py-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

      <?php
      $noticias = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 10,
        'post_status'    => 'publish',
      ]);

      if ($noticias->have_posts()) :
        while ($noticias->have_posts()) : $noticias->the_post();
      ?>

        <!-- 🧱 Tarjeta de noticia -->
        <article class="bg-white rounded-3xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col">
          <div class="h-[200px] w-full overflow-hidden">
            <?php if (has_post_thumbnail()) : ?>
              <img src="<?php the_post_thumbnail_url('large'); ?>" 
                   alt="<?php the_title(); ?>" 
                   class="w-full h-full object-cover" />
            <?php else : ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/DeporteImg.png" 
                   alt="Sin imagen" 
                   class="w-full h-full object-cover" />
            <?php endif; ?>
          </div>

          <div class="p-6 flex flex-col flex-1 justify-between">
            <div>
              <h3 class="font-gabarito text-lg font-semibold text-gray-900 mb-2 leading-snug">
                <?php the_title(); ?>
              </h3>
              <p class="text-sm text-gray-600 font-roboto line-clamp-3">
                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
              </p>
            </div>

            <a href="<?php the_permalink(); ?>"
               class="mt-4 inline-block bg-[#25A065] hover:bg-[#1f8051] text-white text-sm text-center font-semibold px-6 py-2 rounded-full transition">
               Ver noticia
            </a>
          </div>
        </article>

      <?php
        endwhile;
        wp_reset_postdata();
      else :
        echo '<p class="text-gray-500 text-center col-span-full">No hay noticias disponibles en este momento.</p>';
      endif;
      ?>

    </div>
  </section>

</main>