<div id="home-slider-wrapper">   <!--  WRAPPER PARA SELECTIVE REFRESH -->

<div class="bg-white">
  <div class="w-full max-w-[100%] mx-auto relative">

    <?php
    // Cargar imágenes desde el customizer
    $slides = [];

    for ($i = 1; $i <= 3; $i++) {
      $img = get_theme_mod("home_slide_img_$i");
      $url = get_theme_mod("home_slide_url_$i", '#');

      if ($img) {
        $slides[] = [
          'img' => $img,
          'url' => $url
        ];
      }
    }
    ?>

    <?php if (!empty($slides)) : ?>

      <div class="swiper mySwiper overflow-hidden">
        <div class="swiper-wrapper">

          <?php foreach ($slides as $slide): ?>
            <div class="swiper-slide relative">

              <a href="<?php echo esc_url($slide['url']); ?>">
                <img 
                  src="<?php echo esc_url($slide['img']); ?>" 
                  alt="" 
                  class="w-full h-[200px] md:h-[465px] 2xl:h-[655px] object-contain"
                />
              </a>

            </div>
          <?php endforeach; ?>

        </div>
      </div>

    <?php else: ?>

      <p class="text-gray-600 text-center py-10">
        No hay slides configurados aún.
      </p>

    <?php endif; ?>

  </div>
</div>

</div>
