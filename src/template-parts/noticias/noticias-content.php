<?php
/**
 * Template: Página de Noticias
 */
get_header();

// Valores desde el customizer
$banner_img   = get_theme_mod('nunoa_noticias_bg', get_template_directory_uri() . '/assets/img/BgVerde.png');
$banner_title = get_theme_mod('nunoa_noticias_title', 'Noticias Ñuñoa Deportes');
$banner_text  = get_theme_mod('nunoa_noticias_text', 'Infórmate sobre los últimos eventos, actividades y logros deportivos de nuestra comuna.');
?>

<style>
  /* ========= Banner Noticias – Igual al de Misión & Visión ========= */

  .nunoa-news-hero {
    position: relative;
    height: 320px;
    overflow: hidden;
    color: #ffffff;
  }

  .nunoa-news-hero img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 0;
  }

  .nunoa-news-hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(120deg, rgba(0, 63, 46, 0.95), rgba(61, 174, 106, 0.88));
    z-index: 1;
  }

  .nunoa-news-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 1100px;
    margin: 0 auto;
    padding: 60px 20px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .news-kicker {
    font-family: "Roboto", system-ui, sans-serif;
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 0.18em;
    opacity: 0.8;
    margin-bottom: 8px;
  }

  .news-title {
    font-family: "Gabarito", system-ui, sans-serif;
    font-size: clamp(34px, 4vw, 46px);
    font-weight: 700;
    margin: 0 0 12px;
  }

  .news-subtitle {
    font-family: "Roboto", system-ui, sans-serif;
    font-size: 16px;
    line-height: 1.5;
    max-width: 620px;
    opacity: 0.92;
  }

  /* ========= Cards Noticias ========= */

  .news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 26px;
    max-width: 1200px;
    margin: 60px auto;
    padding: 0 20px 40px;
  }

  .news-card {
    background: #ffffff;
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
    display: flex;
    flex-direction: column;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 18px 45px rgba(0, 0, 0, 0.12);
  }

  .news-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
  }

  .news-card-body {
    padding: 22px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    flex: 1;
  }

  .news-card-title {
    font-family: "Gabarito", system-ui, sans-serif;
    font-size: 18px;
    font-weight: 700;
    color: #1a1a1a;
    line-height: 1.3;
  }

  .news-card-text {
    font-family: "Roboto", system-ui, sans-serif;
    font-size: 14px;
    color: #555;
    line-height: 1.45;
    flex: 1;
  }

  .news-btn {
    margin-top: auto;
    background: #25A065;
    color: #ffffff;
    padding: 10px 14px;
    text-align: center;
    font-family: "Roboto", system-ui, sans-serif;
    font-size: 14px;
    font-weight: 600;
    border-radius: 999px;
    text-decoration: none;
    transition: background 0.2s ease;
  }

  .news-btn:hover {
    background: #1f8051;
  }

</style>

<main class="w-full bg-white">

  <!-- Banner -->
  <section class="nunoa-news-hero">
    <img src="<?php echo esc_url($banner_img); ?>" alt="Banner Noticias">

    <div class="nunoa-news-hero-inner">
      <div class="news-kicker">Actualidad Deportiva</div>

      <h1 class="news-title" id="noticias-banner-title">
        <?php echo wp_kses_post($banner_title); ?>
      </h1>

      <p class="news-subtitle" id="noticias-banner-text">
        <?php echo wp_kses_post($banner_text); ?>
      </p>
    </div>
  </section>

  <!-- Listado -->
  <section>
    <div class="news-grid">

      <?php
      $noticias = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 10,
        'post_status' => 'publish',
      ]);

      if ($noticias->have_posts()):
        while ($noticias->have_posts()): $noticias->the_post(); ?>

          <article class="news-card">
            <?php if (has_post_thumbnail()): ?>
              <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/DeporteImg.png" alt="Sin imagen">
            <?php endif; ?>

            <div class="news-card-body">
              <h3 class="news-card-title"><?php the_title(); ?></h3>

              <p class="news-card-text">
                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
              </p>

              <a href="<?php the_permalink(); ?>" class="news-btn">Ver noticia</a>
            </div>
          </article>

      <?php endwhile;
        wp_reset_postdata();
      else: ?>
        <p class="text-gray-600 text-center col-span-full">No hay noticias disponibles.</p>
      <?php endif; ?>

    </div>
  </section>

</main>

<?php get_footer(); ?>
