<?php
/**
 * Template Name: Recinto
 * Description: Template para páginas individuales de recintos deportivos
 */

get_header();

// Obtener datos del recinto
if (have_posts()) : while (have_posts()) : the_post();

  // Campos personalizados (ACF o metaboxes)
  $icono = get_field('icono');
  $direccion = get_field('direccion') ?: get_post_meta(get_the_ID(), '_recinto_direccion', true);
  $telefono = get_field('telefono') ?: get_post_meta(get_the_ID(), '_recinto_telefono', true);
  $email = get_field('email') ?: get_post_meta(get_the_ID(), '_recinto_email', true);
  $horarios = get_field('horarios') ?: get_post_meta(get_the_ID(), '_recinto_horarios', true);
  $servicios = get_field('servicios');
  $galeria = get_field('galeria');
  
  // Ícono del recinto
  if ($icono) {
    $icon_url = is_array($icono) ? esc_url($icono['url']) : esc_url(wp_get_attachment_image_url($icono, 'medium'));
  } else {
    $icon_url = esc_url(get_template_directory_uri() . '/assets/icons/deporte.svg');
  }
  
  // Imagen de fondo del hero (usar imagen destacada o default)
  $hero_bg = has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/img/headernosotros.png';
?>

<style>
/* ===================== HERO ===================== */
.recinto-hero {
  position: relative;
  height: 350px;
  overflow: hidden;
}

.recinto-hero img.hero-bg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.recinto-hero::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(120deg, rgba(0, 63, 46, 0.9), rgba(61, 174, 106, 0.85));
}

.recinto-hero-inner {
  position: relative;
  z-index: 2;
  max-width: 1200px;
  margin: 0 auto;
  padding: 70px 20px;
  height: 100%;
  display: flex;
  align-items: center;
  gap: 30px;
}

.recinto-hero-icon {
  flex-shrink: 0;
  width: 120px;
  height: 120px;
  background: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.recinto-hero-icon img {
  width: 70px;
  height: 70px;
  object-fit: contain;
}

.recinto-hero-content {
  flex: 1;
}

.recinto-hero-title {
  font-family: "Gabarito", sans-serif;
  font-size: clamp(36px, 4vw, 52px);
  font-weight: 700;
  color: #fff;
  margin-bottom: 12px;
}

.recinto-hero-subtitle {
  font-family: "Roboto", sans-serif;
  max-width: 600px;
  font-size: 18px;
  color: #e9f7ef;
  line-height: 1.6;
}

/* ===================== CONTENIDO ===================== */
.recinto-wrapper {
  max-width: 1100px;
  margin: 60px auto;
  padding: 0 20px;
}

.recinto-content {
  font-family: "Roboto", sans-serif;
  font-size: 18px;
  line-height: 1.7;
  color: #333;
}

.recinto-content p {
  margin-bottom: 18px;
}

.recinto-content strong {
  font-weight: 600;
}

.recinto-content h2,
.recinto-content h3 {
  font-family: "Gabarito", sans-serif;
  margin: 25px 0 12px;
  color: #1b8a60;
  font-weight: 700;
}

.recinto-content h2 {
  font-size: 28px;
}

.recinto-content h3 {
  font-size: 22px;
}

.recinto-content ul,
.recinto-content ol {
  padding-left: 20px;
  margin-bottom: 18px;
}

.recinto-content ul li,
.recinto-content ol li {
  list-style: disc;
  margin-bottom: 8px;
  line-height: 1.6;
}

.recinto-content ol li {
  list-style: decimal;
}

/* ===================== SIDEBAR INFO ===================== */
.recinto-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 40px;
  margin-top: 40px;
}

@media (min-width: 1024px) {
  .recinto-grid {
    grid-template-columns: 2fr 1fr;
  }
}

.recinto-sidebar {
  background: #fff;
  border-radius: 20px;
  padding: 30px;
  border: 1px solid #eaeaea;
  box-shadow: 0 10px 22px rgba(0, 0, 0, 0.05);
  height: fit-content;
  position: sticky;
  top: 30px;
}

.sidebar-title {
  font-family: "Gabarito", sans-serif;
  font-size: 24px;
  font-weight: 700;
  color: #1b8a60;
  margin-bottom: 25px;
  padding-bottom: 15px;
  border-bottom: 2px solid #e9f7ef;
}

.sidebar-item {
  display: flex;
  gap: 15px;
  margin-bottom: 25px;
}

.sidebar-icon {
  flex-shrink: 0;
  width: 45px;
  height: 45px;
  background: #e9f7ef;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sidebar-icon svg {
  width: 24px;
  height: 24px;
  color: #1b8a60;
}

.sidebar-text h4 {
  font-family: "Gabarito", sans-serif;
  font-size: 16px;
  font-weight: 700;
  color: #333;
  margin-bottom: 5px;
}

.sidebar-text p,
.sidebar-text a {
  font-family: "Roboto", sans-serif;
  font-size: 14px;
  color: #555;
  line-height: 1.6;
}

.sidebar-text a {
  color: #1b8a60;
  text-decoration: none;
  word-break: break-all;
}

.sidebar-text a:hover {
  text-decoration: underline;
}

.sidebar-btn {
  display: block;
  width: 100%;
  background: linear-gradient(135deg, #1b8a60 0%, #3dae6a 100%);
  color: white;
  text-align: center;
  font-family: "Gabarito", sans-serif;
  font-size: 16px;
  font-weight: 700;
  padding: 14px 20px;
  border-radius: 12px;
  text-decoration: none;
  margin-top: 30px;
  transition: all 0.3s ease;
}

.sidebar-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(27, 138, 96, 0.3);
}

/* ===================== SERVICIOS ===================== */
.servicios-section {
  background: #fff;
  border-radius: 20px;
  padding: 30px;
  border: 1px solid #eaeaea;
  box-shadow: 0 10px 22px rgba(0, 0, 0, 0.05);
  margin-top: 30px;
}

.servicios-title {
  font-family: "Gabarito", sans-serif;
  font-size: 24px;
  font-weight: 700;
  color: #1b8a60;
  margin-bottom: 20px;
}

.servicios-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 15px;
}

.servicio-item {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px;
  background: #f9fafb;
  border-radius: 10px;
}

.servicio-item svg {
  width: 20px;
  height: 20px;
  color: #1b8a60;
  flex-shrink: 0;
}

.servicio-item span {
  font-family: "Roboto", sans-serif;
  font-size: 15px;
  color: #333;
}

/* ===================== GALERÍA ===================== */
.galeria-section {
  background: #fff;
  border-radius: 20px;
  padding: 30px;
  border: 1px solid #eaeaea;
  box-shadow: 0 10px 22px rgba(0, 0, 0, 0.05);
  margin-top: 30px;
}

.galeria-title {
  font-family: "Gabarito", sans-serif;
  font-size: 24px;
  font-weight: 700;
  color: #1b8a60;
  margin-bottom: 20px;
}

.galeria-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  gap: 15px;
}

.galeria-item {
  aspect-ratio: 1;
  border-radius: 15px;
  overflow: hidden;
  cursor: pointer;
  transition: transform 0.3s ease;
}

.galeria-item:hover {
  transform: scale(1.05);
}

.galeria-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Responsive */
@media (max-width: 768px) {
  .recinto-hero-inner {
    flex-direction: column;
    text-align: center;
  }
  
  .recinto-hero-icon {
    width: 100px;
    height: 100px;
  }
  
  .recinto-hero-icon img {
    width: 60px;
    height: 60px;
  }
  
  .recinto-sidebar {
    position: static;
  }
}
</style>

<main class="bg-white">

  <!-- HERO -->
  <section class="recinto-hero">
    <div class="recinto-hero-inner">
      <div class="recinto-hero-content">
        <h1 class="recinto-hero-title"><?php the_title(); ?></h1>
        <?php if (has_excerpt()): ?>
          <p class="recinto-hero-subtitle"><?php the_excerpt(); ?></p>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- CONTENIDO PRINCIPAL -->
  <section class="recinto-wrapper">
    
    <div class="recinto-grid">
      
      <!-- Columna principal -->
      <div>
        <!-- Contenido del editor de WordPress -->
        <div class="recinto-content">
          <?php the_content(); ?>
        </div>

     
  </section>

</main>

<?php 
endwhile; 
else:
  echo '<p class="text-center py-12">No se encontró el recinto.</p>';
endif;

get_footer();
?>
