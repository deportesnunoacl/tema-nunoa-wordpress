<?php
/**
 * Template: Directorio
 * URL esperada: /directorios
 */
get_header();
?>

<style>
/* ========== HERO INSTITUCIONAL (como Noticias / Misión & Visión) ========== */
.directorio-hero {
  position: relative;
  height: 320px;
  overflow: hidden;
  color: #fff;
}

.directorio-hero img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 0;
}

.directorio-hero::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(120deg, rgba(0, 63, 46, 0.92), rgba(61, 174, 106, 0.88));
  z-index: 1;
}

.directorio-hero-inner {
  position: relative;
  z-index: 2;
  max-width: 1150px;
  margin: 0 auto;
  padding: 60px 20px;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.directorio-kicker {
  text-transform: uppercase;
  font-family: "Roboto", sans-serif;
  letter-spacing: 0.18em;
  opacity: 0.75;
  font-size: 13px;
  margin-bottom: 8px;
}

.directorio-title {
  font-family: "Gabarito", sans-serif;
  font-size: clamp(34px, 4vw, 46px);
  font-weight: 700;
  margin: 0 0 12px;
}

.directorio-subtitle {
  font-family: "Roboto", sans-serif;
  max-width: 620px;
  font-size: 16px;
  opacity: 0.9;
}

/* ========== SECCIÓN DIRECTORIO ========== */

.directorio-wrapper {
  max-width: 1150px;
  margin: 60px auto;
  padding: 0 20px 80px;
}

.directorio-text-block {
  max-width: 650px;
  margin-bottom: 50px;
}

.directorio-text-block h3 {
  font-family: "Gabarito", sans-serif;
  font-size: 32px;
  font-weight: 700;
  margin-bottom: 14px;
}

.directorio-text-block p {
  font-family: "Roboto", sans-serif;
  font-size: 17px;
  color: #444;
  line-height: 1.55;
}

/* ========== TARJETAS ========== */
.directorio-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
  gap: 28px;
}

.directorio-card {
  background: #fff;
  border-radius: 22px;
  padding: 28px 20px;
  text-align: center;
  box-shadow: 0 10px 28px rgba(0,0,0,0.08);
  transition: all 0.25s ease;
  border: 1px solid #f2f2f2;
      display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.directorio-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 18px 40px rgba(0,0,0,0.12);
}

.directorio-card img {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  object-fit: cover;
  border: 4px solid #dff3e7;
  margin-bottom: 14px;
}

.directorio-card h4 {
  font-family: "Gabarito", sans-serif;
  font-size: 20px;
  margin: 0 0 6px;
}

.directorio-card .role {
  font-family: "Roboto", sans-serif;
  font-size: 15px;
  font-weight: 600;
  color: #1a7f5a;
  background: #e6f5ef;
  display: inline-block;
  padding: 6px 16px;
  border-radius: 999px;
}
</style>

<main class="bg-white">

<!-- HERO -->
<section class="directorio-hero">
 

  <div class="directorio-hero-inner">
<div class="directorio-kicker" id="dir_kicker_preview">
  <?php echo esc_html( get_theme_mod('dir_kicker', 'Corporación Municipal de Deportes') ); ?>
</div>


<h1 class="directorio-title" id="dir_title_preview">
  <?php echo esc_html( get_theme_mod('dir_title', 'Directorio & Administración') ); ?>
</h1>


<p class="directorio-subtitle" id="dir_subtitle_preview">
  <?php echo esc_html( get_theme_mod('dir_subtitle', 
    'Conoce al equipo que lidera y guía el desarrollo del deporte en Ñuñoa.'
  ) ); ?>
</p>


  </div>
</section>

<!-- CONTENIDO -->
<section class="directorio-wrapper">

  <!-- Texto introductorio -->
  <div class="directorio-text-block">
<h3 id="dir_intro_title_preview">
  <?php echo esc_html( get_theme_mod('dir_intro_title', 
    'Directorio Corporación Municipal de Deportes de Ñuñoa'
  ) ); ?>
</h3>

<p id="dir_intro_text_preview">
  <?php echo esc_html( get_theme_mod('dir_intro_text', 
    'Nuestro directorio está conformado por líderes comprometidos...'
  ) ); ?>
</p>

  </div>

  <!-- GRID DIRECTORIO -->
  <div class="directorio-grid">

<?php for ($i = 1; $i <= 5; $i++): ?>

  <div class="directorio-card">

    <img src="<?php echo esc_url( get_theme_mod("dir_card{$i}_img") ); ?>" 
         alt="<?php echo esc_attr( get_theme_mod("dir_card{$i}_name") ); ?>">

    <h4 id="dir_card<?php echo $i; ?>_name_preview">
      <?php echo esc_html( get_theme_mod("dir_card{$i}_name") ); ?>
    </h4>

    <span class="role" id="dir_card<?php echo $i; ?>_role_preview">
      <?php echo esc_html( get_theme_mod("dir_card{$i}_role") ); ?>
    </span>

  </div>

<?php endfor; ?>

</div>


</main>

<?php get_footer(); ?>
