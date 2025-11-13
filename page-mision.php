<?php
/**
 * Template: Misión & Visión
 */
get_header();

// Puedes cambiar esta imagen si quieres otro fondo
$banner_img = get_template_directory_uri() . '/assets/img/BgVerde.png';
?>

<style>
  /* ========= Misión & Visión – Estilos locales ========= */

  .nunoa-mv-hero {
    position: relative;
    height: 320px;
    color: #ffffff;
    overflow: hidden;
  }

  .nunoa-mv-hero img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 0;
  }

  .nunoa-mv-hero::after {
    content: "";
    position: absolute;
    inset: 0;
    /* degradé encima de la imagen */
    background: linear-gradient(120deg, rgba(0, 63, 46, 0.95), rgba(61, 174, 106, 0.9));
    z-index: 1;
  }

  .nunoa-mv-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 1100px;
    margin: 0 auto;
    padding: 60px 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100%;
  }

  .nunoa-mv-kicker {
    font-family: "Roboto", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 0.18em;
    opacity: 0.85;
    margin-bottom: 8px;
  }

  .nunoa-mv-title {
    font-family: "Gabarito", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    font-size: clamp(34px, 4vw, 46px);
    font-weight: 700;
    margin: 0 0 10px 0;
  }

  .nunoa-mv-subtitle {
    max-width: 620px;
    font-family: "Roboto", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    font-size: 16px;
    line-height: 1.5;
    opacity: 0.9;
  }

  /* Contenedor de tarjetas (Misión / Visión) */
  .nunoa-mv-wrapper {
    position: relative;
    max-width: 1150px;
    margin: 0px auto 80px;
    padding: 30px 20px 20px;
  }

  .nunoa-mv-section-title {
    text-align: center;
    margin-bottom: 32px;
    font-family: "Gabarito", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    font-size: 26px;
    font-weight: 600;
    color: #153047;
  }

  .nunoa-mv-cards {
    display: flex;
    flex-direction: column;
    gap: 24px;
  }

  .nunoa-mv-card {
    background: #ffffff;
    border-radius: 28px;
    border: 1px solid rgba(15, 118, 110, 0.08);
    box-shadow:
      0 18px 45px rgba(15, 23, 42, 0.08),
      0 0 0 1px rgba(255, 255, 255, 0.75);
    padding: 28px 32px;
    display: grid;
    grid-template-columns: auto 1fr;
    gap: 20px;
    align-items: flex-start;
    transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
  }

  .nunoa-mv-card:hover {
    transform: translateY(-4px);
    box-shadow:
      0 26px 55px rgba(15, 23, 42, 0.12),
      0 0 0 1px rgba(61, 174, 106, 0.35);
    border-color: rgba(61, 174, 106, 0.5);
  }

  .nunoa-mv-icon {
    width: 64px;
    height: 64px;
    border-radius: 999px;
    background: radial-gradient(circle at 30% 0, #5eead4, #22c55e);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-weight: 700;
    font-size: 26px;
    box-shadow: 0 10px 25px rgba(34, 197, 94, 0.45);
    flex-shrink: 0;
    overflow: hidden;
  }

  .nunoa-mv-icon img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .nunoa-mv-card-header {
    display: flex;
    flex-direction: column;
    gap: 4px;
    margin-bottom: 8px;
  }

  .nunoa-mv-card-title {
    font-family: "Gabarito", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    font-size: 22px;
    font-weight: 700;
    color: #071827;
  }

  .nunoa-mv-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 10px;
    border-radius: 999px;
    background: rgba(34, 197, 94, 0.08);
    color: #16a34a;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    font-family: "Roboto", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
  }

  .nunoa-mv-card-body {
    font-family: "Roboto", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    font-size: 15px;
    line-height: 1.7;
    color: #1f2933;
  }

  .nunoa-mv-card-body strong {
    font-weight: 700;
    color: #022c22;
  }

  /* Separador entre tarjetas */
  .nunoa-mv-divider {
    width: 140px;
    height: 1px;
    border: 0;
    margin: 18px auto 6px;
    background: linear-gradient(to right, transparent, #34d399, transparent);
  }

  /* Responsive */
  @media (max-width: 768px) {
    .nunoa-mv-hero {
      height: 260px;
    }

    .nunoa-mv-hero-inner {
      padding-inline: 16px;
    }

    .nunoa-mv-card {
      grid-template-columns: 1fr;
      padding: 22px 20px;
    }

    .nunoa-mv-icon {
      margin-bottom: 6px;
    }

    .nunoa-mv-wrapper {
      margin-top: -60px;
    }
  }
</style>

<main class="nunoa-mv-main">

  <!-- Banner tipo Noticias -->
  <section class="nunoa-mv-hero">
    <img src="<?php echo esc_url( $banner_img ); ?>" alt="Fondo misión y visión">

    <div class="nunoa-mv-hero-inner">
      <div class="nunoa-mv-kicker">Nuestra identidad institucional</div>
      <h1 class="nunoa-mv-title">Misión &amp; Visión</h1>
      <p class="nunoa-mv-subtitle">
        Nuestro propósito, nuestro compromiso y el horizonte que guía cada una de las
        actividades deportivas en Ñuñoa.
      </p>
    </div>
  </section>

  <!-- Contenido Misión / Visión -->
  <section class="nunoa-mv-wrapper">
    <h2 class="nunoa-mv-section-title">Nuestro Propósito Institucional</h2>

    <div class="nunoa-mv-cards">

      <!-- Misión -->
      <article class="nunoa-mv-card">
        <div class="nunoa-mv-icon">
          <!-- Puedes reemplazar por un ícono propio -->
          <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-mision.png" alt="Icono misión"> -->
          M
        </div>

        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Quiénes somos</span>
            <h3 class="nunoa-mv-card-title">Misión</h3>
          </header>
          <div class="nunoa-mv-card-body">
            La Corporación Municipal de Deportes de Ñuñoa busca promover, fomentar, difundir y
            desarrollar programas deportivos que respondan a las necesidades de bienestar y
            esparcimiento de sus vecinos y organizaciones sociales. Realizamos actividades en
            recintos deportivos, unidades vecinales y espacios públicos, con el objetivo de
            <strong>mejorar la calidad de vida de nuestros habitantes mediante el deporte</strong>.
          </div>
        </div>
      </article>

      <hr class="nunoa-mv-divider">

      <!-- Visión -->
      <article class="nunoa-mv-card">
        <div class="nunoa-mv-icon">
          <!-- Ícono de visión si tienes un archivo -->
          <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-vision.png" alt="Icono visión"> -->
          V
        </div>

        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Hacia dónde vamos</span>
            <h3 class="nunoa-mv-card-title">Visión</h3>
          </header>
          <div class="nunoa-mv-card-body">
            Aspiramos a consolidarnos como un referente del deporte comunal, promoviendo una
            gestión profesional, humana y sostenible. A través de la calidad humana y técnica de
            nuestro equipo, y de la diversidad de nuestra oferta e infraestructura,
            <strong>queremos ser la institución líder en la promoción del deporte, la salud y el
            bienestar para toda la comunidad de Ñuñoa</strong>.
          </div>
        </div>
      </article>

    </div>
  </section>

</main>

<?php get_footer(); ?>
