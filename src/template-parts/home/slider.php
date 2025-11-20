<div class="bg-white">
  <div class="w-full max-w-[100%] mx-auto relative">
    <?php
      $slides = new WP_Query([
        'post_type'      => 'slider',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
      ]);

      if ($slides->have_posts()) :
    ?>
    <div class="swiper mySwiper overflow-hidden">
      <div class="swiper-wrapper">
        <?php while ($slides->have_posts()) : $slides->the_post(); ?>
          <div class="swiper-slide relative">
            <?php if (has_post_thumbnail()) : ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" class="w-full h-[200px] md:h-[465px] 2xl:h-[655px] object-contain" />
            <?php endif; ?>

           
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
    <?php else : ?>
      <p class="text-gray-600 text-center py-10">No hay slides disponibles aún.</p>
    <?php endif; ?>

    <!-- Caja de Beneficios -->
    <!-- <div class="bg-white hidden md:flex 2xl:px-20 md:px-10 absolute bottom-0 right-0 p-6 rounded-tl-[40px] z-20 flex-col items-center">
      <h2 class="text-2xl mb-4 text-center font-gabarito">
        Accede a los beneficios 
        <span class="font-bold">que tenemos para ti</span>
      </h2>
      <div class="flex space-x-4">
        <div class="border-primary border rounded-full p-4 flex items-center justify-between text-primary">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Beneficio1.png" alt="Beneficio 1" class="w-12 h-12">
          <span class="ml-2 text-base max-w-40 font-roboto">Accede al beneficio <span class="font-bold">Tarjeta Vecino</span></span>
        </div>
        <div class="border-primary border rounded-full p-4 flex items-center justify-between text-primary">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Beneficio2.png" alt="Beneficio 2" class="w-12 h-12 rounded-full">
          <span class="ml-2 text-base max-w-40 font-roboto">Juegos deportivos <span class="font-bold">Escolares Ñuñoa</span></span>
        </div>
      </div>
    </div> -->
  </div>
</div>
