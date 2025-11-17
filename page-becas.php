<?php
/**
 * Template: Becas
 */
get_header();

// Puedes cambiar esta imagen si quieres otro fondo
$banner_img = get_template_directory_uri() . '/assets/img/becas.png';
?>

<style>
  /* ========= Becas – Estilos locales ========= */

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

  /* Estilos para el texto introductorio */
  .directorio-text-block {
    max-width: 1150px;
    margin: 50px auto 30px;
    padding: 0 20px;
    text-align: center;
  }

  .directorio-text-block h3 {
    font-family: "Gabarito", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    font-size: 32px;
    font-weight: 700;
    color: #153047;
    margin-bottom: 20px;
  }

  .directorio-text-block p {
    font-family: "Roboto", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    font-size: 16px;
    line-height: 1.7;
    color: #1f2933;
    max-width: 900px;
    margin: 0 auto;
  }

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
    display: grid;
    grid-template-columns: 1fr 1fr;
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

  /* Estilos para el gradiente y botón */
  .nunoa-mv-load-more {
    position: relative;
    margin-top: 40px;
    text-align: center;
  }

  .nunoa-mv-gradient-overlay {
    position: absolute;
    top: -100px;
    left: 0;
    right: 0;
    height: 100px;
    background: linear-gradient(to bottom, transparent, rgba(255, 255, 255, 0.95));
    pointer-events: none;
    transition: opacity 0.3s ease;
  }

  .nunoa-mv-toggle-btn {
    background: linear-gradient(135deg, #22c55e, #16a34a);
    color: white;
    border: none;
    padding: 14px 32px;
    border-radius: 50px;
    font-family: "Gabarito", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(34, 197, 94, 0.3);
  }

  .nunoa-mv-toggle-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 35px rgba(34, 197, 94, 0.4);
    background: linear-gradient(135deg, #16a34a, #15803d);
  }

  /* Clase para ocultar cards adicionales */
  .nunoa-mv-card-additional {
    display: none;
  }

  .nunoa-mv-card-additional.show {
    display: grid;
    animation: fadeIn 0.5s ease;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @media (max-width: 768px) {
    .nunoa-mv-hero {
      height: 260px;
    }

    .nunoa-mv-hero-inner {
      padding-inline: 16px;
    }

    .nunoa-mv-cards {
      grid-template-columns: 1fr;
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

    .directorio-text-block h3 {
      font-size: 26px;
    }

    .nunoa-mv-gradient-overlay {
      top: -80px;
      height: 80px;
    }
  }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const toggleBtn = document.getElementById('toggleBtn');
  const additionalCards = document.querySelectorAll('.nunoa-mv-card-additional');
  const gradientOverlay = document.querySelector('.nunoa-mv-gradient-overlay');
  const cardsContainer = document.querySelector('.nunoa-mv-cards');
  let allCardsVisible = false;
  
  if (toggleBtn) {
    toggleBtn.addEventListener('click', function() {
      if (!allCardsVisible) {
        // Mostrar todas las cards adicionales
        additionalCards.forEach(card => {
          card.classList.add('show');
        });
        
        // Ocultar el gradiente
        gradientOverlay.style.opacity = '0';
        
        // Cambiar el botón a "Ver menos"
        toggleBtn.textContent = 'Ver menos';
        
        // Mover el botón al final de las cards
        cardsContainer.parentNode.insertBefore(toggleBtn.parentNode, cardsContainer.nextSibling);
        
        allCardsVisible = true;
      } else {
        // Ocultar las cards adicionales
        additionalCards.forEach(card => {
          card.classList.remove('show');
        });
        
        // Mostrar el gradiente
        gradientOverlay.style.opacity = '1';
        
        // Cambiar el botón a "Ver más"
        toggleBtn.textContent = 'Ver más beneficiarios';
        
        // Mover el botón de vuelta a su posición original
        const loadMoreContainer = toggleBtn.parentNode;
        cardsContainer.parentNode.insertBefore(loadMoreContainer, cardsContainer.nextSibling);
        
        allCardsVisible = false;
        
        // Hacer scroll suave hacia la sección de cards
        cardsContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  }
});
</script>

<main class="nunoa-mv-main">

  <!-- Banner tipo Noticias -->
  <section class="nunoa-mv-hero">
    <img src="<?php echo esc_url( $banner_img ); ?>" alt="Fondo misión y visión">

    <div class="nunoa-mv-hero-inner">
      <h1 class="nunoa-mv-title">Becas sportlife 2025</h1>
      <p class="nunoa-mv-subtitle">
        Conoce nuestros ganadores de la beca.
      </p>
    </div>
  </section>

  <!-- Texto introductorio -->
  <div class="directorio-text-block">
    <h3>Ganadoras y ganadores Beca Sportlife 2025</h3>
    <p>
      Agradecemos a las vecinas y vecinos que postularon, y
      a quienes no fueron adjudicados les invitamos a seguir
      nuestras redes, ya que si las personas beneficiadas
      con la beca no se presentan al cupo se hará correr
      la lista. Las ganadoras y ganadores deben acercarse
      a partir del jueves 2 de enero del 2025 para empezar
      a utilizar sus becas. Se les recuerda que si no tienen 
      una asistencia promedio de ocho veces al mes la beca será caducada.
    </p>
  </div>

  <!-- Contenido Becas -->
  <section class="nunoa-mv-wrapper">
    <h2 class="nunoa-mv-section-title">Lista de beneficiadas y beneficiados</h2>

    <div class="nunoa-mv-cards">

      <!-- Primeras 10 cards (siempre visibles) -->
      <article class="nunoa-mv-card">
        <div class="nunoa-mv-icon">1</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Gabriela Bravali</h3>
          </header>
        </div>
      </article>

      <article class="nunoa-mv-card">
        <div class="nunoa-mv-icon">2</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Juan Arancibia</h3>
          </header>
        </div>
      </article>

      <article class="nunoa-mv-card">
        <div class="nunoa-mv-icon">3</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Francisca Esveile</h3>
          </header>
        </div>
      </article>

      <article class="nunoa-mv-card">
        <div class="nunoa-mv-icon">4</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Katherine Sanhueza</h3>
          </header>
        </div>
      </article>

      <article class="nunoa-mv-card">
        <div class="nunoa-mv-icon">5</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Patricia Gutiérrez</h3>
          </header>
        </div>
      </article>

      <article class="nunoa-mv-card">
        <div class="nunoa-mv-icon">6</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Gsungming Mamani</h3>
          </header>
        </div>
      </article>

      <article class="nunoa-mv-card">
        <div class="nunoa-mv-icon">7</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Rocío Mardones</h3>
          </header>
        </div>
      </article>

      <article class="nunoa-mv-card">
        <div class="nunoa-mv-icon">8</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Antonella Silva</h3>
          </header>
        </div>
      </article>

      <article class="nunoa-mv-card">
        <div class="nunoa-mv-icon">9</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Karen Corvalán</h3>
          </header>
        </div>
      </article>

      <article class="nunoa-mv-card">
        <div class="nunoa-mv-icon">10</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">María Mejías</h3>
          </header>
        </div>
      </article>

      <!-- Cards 11-30 (ocultas inicialmente) -->
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">11</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Valeria Villagran</h3>
          </header>
        </div>
      </article>      

      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">12</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Verónica Cornejo</h3>
          </header>
        </div>
      </article>
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">13</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Ignacia Erpel</h3>
          </header>
        </div>
      </article>
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">14</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Caroline Currie</h3>
          </header>
        </div>
      </article>
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">15</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Marcela Fuentes</h3>
          </header>
        </div>
      </article>
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">16</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Miguel Cartagena</h3>
          </header>
        </div>
      </article>
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">17</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Daniel Vera</h3>
          </header>
        </div>
      </article>
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">18</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Bastián Narváez</h3>
          </header>
        </div>
      </article>
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">19</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">María Cabrera</h3>
          </header>
        </div>
      </article>
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">20</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Javiera Alvarado</h3>
          </header>
        </div>
      </article>
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">21</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Roland Olivares</h3>
          </header>
        </div>
      </article>      

      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">22</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Rosa Sánchez</h3>
          </header>
        </div>
      </article>  
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">23</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Matilda González</h3>
          </header>
        </div>
      </article>  
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">24</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Josefa Valenzuela</h3>
          </header>
        </div>
      </article>  
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">25</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Tomás Arancibia</h3>
          </header>
        </div>
      </article>  
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">26</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Javier Manns</h3>
          </header>
        </div>
      </article>  
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">27</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Ana Águila</h3>
          </header>
        </div>
      </article>  
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">28</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Ana Avendaño</h3>
          </header>
        </div>
      </article>  
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">29</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Gonzalo Arellano</h3>
          </header>
        </div>
      </article>  
      
      <article class="nunoa-mv-card nunoa-mv-card-additional">
        <div class="nunoa-mv-icon">30</div>
        <div>
          <header class="nunoa-mv-card-header">
            <span class="nunoa-mv-pill">Beca Sportlife 2025</span>
            <h3 class="nunoa-mv-card-title">Constanza Rivas</h3>
          </header>
        </div>
      </article>

    </div>

    <!-- Gradiente y botón toggle -->
    <div class="nunoa-mv-load-more">
      <div class="nunoa-mv-gradient-overlay"></div>
      <button id="toggleBtn" class="nunoa-mv-toggle-btn">
        Ver más beneficiarios
      </button>
    </div>

  </section>

</main>

<?php get_footer(); ?>