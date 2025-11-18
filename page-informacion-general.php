<?php
/**
 * Template: Información General
 * URL: /informacion-general
 */
get_header();
?>

<style>
/* ===================== HERO ===================== */

.info-hero {
  position: relative;
  height: 350px;
  overflow: hidden;
}

.info-hero img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.info-hero::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(120deg, rgba(0, 63, 46, 0.9), rgba(61, 174, 106, 0.85));
}

.info-hero-inner {
  position: relative;
  z-index: 2;
  max-width: 1200px;
  margin: 0 auto;
  padding: 70px 20px;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.info-hero-title {
  font-family: "Gabarito", sans-serif;
  font-size: clamp(36px, 4vw, 52px);
  font-weight: 700;
  color: #fff;
}

.info-hero-subtitle {
  font-family: "Roboto", sans-serif;
  max-width: 600px;
  margin-top: 12px;
  font-size: 18px;
  color: #e9f7ef;
}

/* ===================== TEXTO PRINCIPAL ===================== */
.info-wrapper {
  max-width: 1100px;
  margin: 60px auto;
  padding: 0 20px;
}

.info-wrapper p {
  font-family: "Roboto", sans-serif;
  font-size: 18px;
  line-height: 1.65;
  color: #333;
}

/* ===================== TARJETAS ENFOQUES ===================== */

.info-cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
  gap: 26px;
  margin-top: 50px;
}

.info-card {
  background: #fff;
  border-radius: 20px;
  padding: 26px;
  border: 1px solid #eaeaea;
  box-shadow: 0 10px 22px rgba(0,0,0,0.05);
  transition: 0.25s ease;
}

.info-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 16px 32px rgba(0,0,0,0.08);
}

.info-card img {
  width: 48px;
  margin-bottom: 15px;
}

.info-card h4 {
  font-family: "Gabarito", sans-serif;
  font-size: 22px;
  margin-bottom: 10px;
}

.info-card p {
  font-family: "Roboto", sans-serif;
  line-height: 1.55;
  color: #555;
}

/* ===================== RECINTOS ===================== */

.recintos-wrapper {
  max-width: 1200px;
  margin: 90px auto 100px;
  padding: 0 20px;
}

.recintos-title {
  font-family: "Gabarito", sans-serif;
  font-size: 32px;
  font-weight: bold;
}

.recintos-sub {
  font-family: "Roboto", sans-serif;
  font-size: 18px;
  color: #444;
  max-width: 850px;
  margin: 12px 0 40px;
}

/* Cards de recintos */
.recinto-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 28px;
}

.recinto-card {
  display: flex;
  flex-direction: column;
  background: #fff;
  border-radius: 20px;
  overflow: hidden;
  border: 1px solid #e8e8e8;
  box-shadow: 0 8px 20px rgba(0,0,0,0.05);
  transition: 0.25s ease;
}

.recinto-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 16px 34px rgba(0,0,0,0.08);
}

.recinto-img {
  width: 100%;
  height: 150px;
  object-fit: cover;
}

.recinto-info {
  padding: 18px;
  display: flex;
  flex-direction: column;
}

.recinto-info h3 {
  font-family: "Gabarito", sans-serif;
  font-size: 20px;
  color: #1b8a60;
  margin-bottom: 10px;
}

.recinto-info p {
  font-family: "Roboto", sans-serif;
  font-size: 14px;
  color: #444;
}

/* Espaciado */
.mt-15 { margin-top: 15px; }

/* Estilos para contenido dinámico */
.info-content {
  font-family: "Roboto", sans-serif;
  font-size: 18px;
  line-height: 1.7;
  color: #333;
}

.info-content p {
  margin-bottom: 18px;
}

.info-content strong {
  font-weight: 600;
}

.info-content h2,
.info-content h3 {
  font-family: "Gabarito", sans-serif;
  margin: 25px 0 12px;
  color: #1b8a60;
}

.info-content ul {
  padding-left: 20px;
  margin-bottom: 18px;
}

.info-content ul li {
  list-style: disc;
  margin-bottom: 6px;
}

</style>

<main class="bg-white">

<!-- HERO -->
<section class="info-hero">
<img src="<?php echo esc_url( get_theme_mod('ig_hero_image', get_template_directory_uri() . '/assets/img/headernosotros.png') ); ?>" alt="">
  
  <div class="info-hero-inner">
<h1 class="info-hero-title">
  <span id="ig_hero_title_preview">
    <?php echo esc_html( get_theme_mod('ig_hero_title', 'Información General') ); ?>
  </span>
</h1>

<p class="info-hero-subtitle">
  <span id="ig_hero_sub_preview">
    <?php echo esc_html( get_theme_mod('ig_hero_subtitle', 'Conoce nuestra historia, nuestro trabajo y el impacto en la comunidad.') ); ?>
  </span>
</p>

  </div>
</section>

<!-- TEXTO PRINCIPAL -->
<section class="info-wrapper">
  <!-- TEXTO PRINCIPAL DINÁMICO -->
<section class="info-wrapper">

  <div class="info-content">
    <?php 
      while ( have_posts() ) : the_post();
        the_content();
      endwhile;
    ?>
  </div>

  <!-- TARJETAS -->
  <div class="info-cards">

<div class="info-card">
  <img 
    src="<?php echo esc_url( get_theme_mod('ig_card1_img', get_template_directory_uri() . '/assets/icons/genero.png') ); ?>" 
    alt="">

  <h4>
    <span id="ig_card1_title_preview">
      <?php echo esc_html( get_theme_mod('ig_card1_title', 'Género') ); ?>
    </span>
  </h4>

  <p>
    <span id="ig_card1_text_preview">
      <?php echo esc_html( get_theme_mod('ig_card1_text', 'Eliminamos barreras y promovemos espacios deportivos seguros, inclusivos y libres de violencia.') ); ?>
    </span>
  </p>
</div>


<div class="info-card">
  <img 
    src="<?php echo esc_url( get_theme_mod('ig_card2_img', get_template_directory_uri() . '/assets/icons/curso.png') ); ?>" 
    alt="">

  <h4>
    <span id="ig_card2_title_preview">
      <?php echo esc_html( get_theme_mod('ig_card2_title', 'Curso de Vida') ); ?>
    </span>
  </h4>

  <p>
    <span id="ig_card2_text_preview">
      <?php echo esc_html( get_theme_mod('ig_card2_text', 'Impulsamos actividades para todas las edades, desde la primera infancia hasta adultos mayores.') ); ?>
    </span>
  </p>
</div>


<div class="info-card">
  <img 
    src="<?php echo esc_url( get_theme_mod('ig_card3_img', get_template_directory_uri() . '/assets/icons/derecho.png') ); ?>" 
    alt="">

  <h4>
    <span id="ig_card3_title_preview">
      <?php echo esc_html( get_theme_mod('ig_card3_title', 'Derecho') ); ?>
    </span>
  </h4>

  <p>
    <span id="ig_card3_text_preview">
      <?php echo esc_html( get_theme_mod('ig_card3_text', 'Priorizamos el acceso deportivo en sectores vulnerables, promoviendo igualdad de oportunidades.') ); ?>
    </span>
  </p>
</div>


  </div>

</section>

<!-- RECINTOS -->
<section class="recintos-wrapper">

<h2 class="recintos-title">
  <span id="ig_rec_title_preview">
    <?php echo esc_html( get_theme_mod('ig_rec_title', 'Conoce nuestros recintos y mucho más...') ); ?>
  </span>
</h2>

<p class="recintos-sub">
  <span id="ig_rec_sub_preview">
    <?php echo esc_html( get_theme_mod('ig_rec_sub', 'Contamos con múltiples espacios deportivos como el Polideportivo...') ); ?>
  </span>
</p>


  <div class="recinto-grid">

    <div class="recinto-card">
      <img class="recinto-img" 
           src="<?php echo get_template_directory_uri(); ?>/assets/img/polideportivo.png" 
           alt="">
      <div class="recinto-info">
        <h3>Polideportivo de Ñuñoa</h3>
        <p><strong>Lunes a Viernes:</strong><br>06:00 a 22:00 hrs</p>
        <p class="mt-15"><strong>Sábados:</strong><br>09:00 a 13:30 hrs</p>
        <p class="mt-15">Juan Moya Morales 1370, Ñuñoa</p>
      </div>
    </div>

    <div class="recinto-card">
      <img class="recinto-img" 
           src="<?php echo get_template_directory_uri(); ?>/assets/img/gimnasio.png" 
           alt="">
      <div class="recinto-info">
        <h3>Gimnasio Ñuñoa Plaza</h3>
        <p><strong>Lunes a Viernes:</strong><br>07:00 a 21:45 hrs</p>
        <p class="mt-15"><strong>Sábados:</strong><br>08:00 a 12:45 hrs</p>
        <p class="mt-15">Manuel de Salas 151, Ñuñoa</p>
      </div>
    </div>

    <div class="recinto-card">
      <img class="recinto-img" 
           src="<?php echo get_template_directory_uri(); ?>/assets/img/gimnasio.png" 
           alt="">
      <div class="recinto-info">
        <h3>Gimnasio Ñuñoa Plaza</h3>
        <p><strong>Lunes a Viernes:</strong><br>07:00 a 21:45 hrs</p>
        <p class="mt-15"><strong>Sábados:</strong><br>08:00 a 12:45 hrs</p>
        <p class="mt-15">Manuel de Salas 151, Ñuñoa</p>
      </div>
    </div>

  </div>

</section>

</main>

<?php get_footer(); ?>
