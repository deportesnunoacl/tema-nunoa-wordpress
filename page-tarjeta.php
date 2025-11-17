<?php
/**
 * Template: Tarjeta Vecino
 * URL: /tarjeta
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




/* ===================== TARJETAS ENFOQUES MEJORADAS ===================== */

.info-cards {
  display: grid;
  gap: 30px;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  margin: 50px 0;
  align-items: start; /* Evita que las cartas se estiren */
}

.info-card {
  background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
  padding: 30px 25px;
  border-radius: 20px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
  border: 1px solid #e8f5e8;
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  position: relative;
  overflow: hidden;
  height: fit-content; /* Se ajusta al contenido */
  min-height: 300px; /* Altura mínima consistente */
}

.info-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 5px;
  background: linear-gradient(90deg, #1b8a60, #3dae6a);

}

.info-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.info-card h4 {
  margin: 15px 0;
  font-size: 1.5rem;
  font-weight: 700;
  color: #1b5e20;
  position: relative;
  display: inline-block;
}

.info-card h4::after {
  content: "";
  position: absolute;
  bottom: -5px;
  left: 0;
  width: 40px;
  height: 3px;
  background: #3dae6a;
  border-radius: 2px;
}

.summary {
  font-size: 1rem;
  color: #555;
  line-height: 1.6;
  margin-bottom: 15px;
}

.toggle-btn {
  margin-top: 15px;
  background: linear-gradient(135deg, #1b8a60, #3dae6a);
  color: white;
  border: none;
  padding: 12px 24px;
  border-radius: 50px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(27, 138, 96, 0.3);
  display: flex;
  align-items: center;
  gap: 8px;
}

.toggle-btn:hover {
  background: linear-gradient(135deg, #166c4b, #2e8e57);
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(27, 138, 96, 0.4);
}

.toggle-btn::after {
  content: "↓";
  font-size: 0.9rem;
  transition: transform 0.3s ease;
}

.toggle-btn.active::after {
  transform: rotate(180deg);
}

.more-info {
  margin-top: 20px;
  display: none;
  animation: fadeIn 0.4s ease forwards;
  border-top: 1px solid #e0e0e0;
  padding-top: 20px;
    height: auto; /* Se ajusta automáticamente */
  min-height: 380px; /* Altura mínima aumentada para igualar */
}

.more-info.active {
  display: block;
}

/* Estilos específicos para requisitos */
.requisitos-section {
  margin-bottom: 20px;
}

.requisitos-section:last-child {
  margin-bottom: 0;
}

.requisitos-section h5 {
  margin: 20px 0 12px 0;
  font-size: 1.1rem;
  font-weight: 600;
  color: #1b5e20;
  padding-bottom: 5px;
  border-bottom: 1px dashed #c8e6c9;
}

.requisitos-section ul {
  padding-left: 20px;
  margin-bottom: 15px;
}

.requisitos-section li {
  margin-bottom: 8px;
  position: relative;
  padding-left: 10px;
  color: #444;
  line-height: 1.5;
}

.requisitos-section li::marker {
  color: #1b8a60;
}

.requisitos-nota {
  background: #e8f5e9;
  border-left: 4px solid #1b8a60;
  padding: 15px;
  border-radius: 8px;
  margin-top: 20px;
  font-size: 0.95rem;
  color: #1b5e20;
}

.requisitos-nota strong {
  color: #1b5e20;
}

/* Estilos para beneficios (mantenidos) */
.more-info ul {
  padding-left: 20px;
  margin-bottom: 15px;
}

.more-info li {
  margin-bottom: 8px;
  position: relative;
  padding-left: 10px;
  color: #444;
}

.more-info li::marker {
  color: #1b8a60;
}

.more-info h5 {
  margin-top: 20px;
  font-size: 1.1rem;
  font-weight: 600;
  color: #1b5e20;
  padding-bottom: 5px;
  border-bottom: 1px dashed #c8e6c9;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-10px); }
  to { opacity: 1; transform: translateY(0); }
}

/* ===================== SECCIÓN CONSULTAR ESTADO ===================== */

.consultar-estado {
  background: linear-gradient(135deg, #f8fff8 0%, #e8f5e9 100%);
  border-radius: 20px;
  padding: 40px;
  margin: 60px 0;
  text-align: center;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
  border: 1px solid #c8e6c9;
  position: relative;
  overflow: hidden;
}

.consultar-estado::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 5px;
  background: linear-gradient(90deg, #1b8a60, #3dae6a, #1b8a60);
}

.consultar-estado h3 {
  font-family: "Gabarito", sans-serif;
  font-size: 2rem;
  color: #1b5e20;
  margin-bottom: 15px;
}

.consultar-estado p {
  font-family: "Roboto", sans-serif;
  font-size: 1.1rem;
  color: #555;
  margin-bottom: 25px;
  max-width: 600px;
  margin-left: auto;
  margin-right: auto;
}

.consultar-btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: linear-gradient(135deg, #1b8a60, #3dae6a);
  color: white;
  text-decoration: none;
  padding: 15px 30px;
  border-radius: 50px;
  font-size: 1.1rem;
  font-weight: 600;
  transition: all 0.3s ease;
  box-shadow: 0 5px 20px rgba(27, 138, 96, 0.4);
}

.consultar-btn:hover {
  background: linear-gradient(135deg, #166c4b, #2e8e57);
  transform: translateY(-3px);
  box-shadow: 0 8px 25px rgba(27, 138, 96, 0.5);
  color: white;
}

.consultar-btn i {
  font-size: 1.2rem;
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
/* ===================== SECCIÓN CONSULTAR ESTADO ===================== */

.consultar-estado {
  background: linear-gradient(135deg, #f8fff8 0%, #e8f5e9 100%);
  border-radius: 20px;
  padding: 40px;
  margin: 60px 0;
  text-align: center;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
  border: 1px solid #c8e6c9;
  position: relative;
  overflow: hidden;
}

.consultar-estado::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 5px;
  background: linear-gradient(90deg, #1b8a60, #3dae6a, #1b8a60);
}

.consultar-estado h3 {
  font-family: "Gabarito", sans-serif;
  font-size: 2rem;
  color: #1b5e20;
  margin-bottom: 15px;
}

.consultar-estado p {
  font-family: "Roboto", sans-serif;
  font-size: 1.1rem;
  color: #555;
  margin-bottom: 25px;
  max-width: 600px;
  margin-left: auto;
  margin-right: auto;
}

.consultar-btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: linear-gradient(135deg, #1b8a60, #3dae6a);
  color: white;
  text-decoration: none;
  padding: 15px 30px;
  border-radius: 50px;
  font-size: 1.1rem;
  font-weight: 600;
  transition: all 0.3s ease;
  box-shadow: 0 5px 20px rgba(27, 138, 96, 0.4);
}

.consultar-btn:hover {
  background: linear-gradient(135deg, #166c4b, #2e8e57);
  transform: translateY(-3px);
  box-shadow: 0 8px 25px rgba(27, 138, 96, 0.5);
  color: white;
}

.consultar-icon {
  width: 20px;
  height: 20px;
  stroke: currentColor;
}
</style>

<main class="bg-white">

<!-- HERO -->
<section class="info-hero">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/tarjeta.png" alt="">
  
  <div class="info-hero-inner">
    <h1 class="info-hero-title">Tarjeta Vecino</h1>
    <p class="info-hero-subtitle">Conoce nuestros beneficios y requisitos de la tarjeta vecino.</p>
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

<!-- TARJETAS MEJORADAS -->
<div class="info-cards">

  <!-- REQUISITOS MEJORADO -->
  <div class="info-card">
    <h4>Requisitos</h4>

    <p class="summary">
      Debes acreditar residencia permanente en Ñuñoa mediante documentos válidos.
    </p>

    <button class="toggle-btn">Ver más</button>

    <div class="more-info">
      <div class="requisitos-section">
        <h5>Documentos para acreditar residencia</h5>
        <p>Presentar uno (1) de los siguientes documentos (máx. 3 meses de antigüedad):</p>
        <ul>
          <li>Cuentas de servicios básicos (luz, agua, gas, internet, TV)</li>
          <li>Certificado de Residencia actualizado</li>
          <li>Registro Social de Hogares vigente en Ñuñoa</li>
          <li>Contrato de arriendo legalizado</li>
          <li>Liquidación de pago de pensión</li>
        </ul>
      </div>

      <div class="requisitos-section">
        <h5>Documentos financieros y legales</h5>
        <ul>
          <li>Cartola bancaria, AFP o Isapre</li>
          <li>Cuenta TAG actualizada</li>
          <li>Licencia de conducir con domicilio en la comuna</li>
          <li>Documento de gasto común con firma y timbre</li>
        </ul>
      </div>

      <div class="requisitos-section">
        <h5>Otros documentos válidos</h5>
        <ul>
          <li>Servicios contratados en el domicilio (alarmas, plataformas digitales, purificadoras, etc.)</li>
          <li>Contribuciones o pago de aseo municipal</li>
        </ul>
      </div>

      <div class="requisitos-nota">
        <p><strong>📝 Nota importante:</strong> La Tarjeta Vecino es personal, intransferible y tiene una vigencia de 6 años.</p>
      </div>
    </div>
  </div>

  <!-- BENEFICIOS -->
  <div class="info-card">
    <h4>Beneficios</h4>

    <p class="summary">
      Descuentos y acceso preferente en deportes, salud, cultura y comercios de la comuna.
    </p>

    <button class="toggle-btn">Ver más</button>

    <div class="more-info">
      <h5>Beneficios deportivos</h5>
      <ul>
        <li>Descuento en arriendo de canchas del Polideportivo (pasto sintético y techadas)</li>
        <li>Acceso preferencial a natación, nado libre, aquafitness e hidrogimnasia</li>
        <li>Talleres deportivos municipales con tarifas rebajadas</li>
        <li>Descuentos en masajes, masoterapia y terapias complementarias</li>
      </ul>

      <h5>Salud y bienestar</h5>
      <ul>
        <li>Descuentos en kinesiología municipal</li>
        <li>Masajes a precio preferente</li>
        <li>Convenios con clínicas: kinesiología personalizada, traumatología, adultos mayores</li>
      </ul>

      <h5>Comercios y convenios</h5>
      <ul>
        <li>Descuentos en comercios asociados</li>
        <li>Convenios especiales como compra de bicicletas u otros según vigencia</li>
      </ul>

      <h5>Generales</h5>
        <li>Acceso a talleres municipales recreativos y culturales</li>
        <li>Cupos preferentes en actividades comunitarias</li>
        <li>Participación en eventos exclusivos para vecinos</li>
    </div>
  </div>

</div>

<!-- SECCIÓN CONSULTAR ESTADO -->
<section class="consultar-estado">
  <h3>Consultar Estado de Tarjeta Vecino</h3>
  <p>Verifica el estado de tu solicitud o renueva tu tarjeta vecino de forma rápida y sencilla</p>
  <a href="https://nunoa.tarjetavecino.com/consulta" class="consultar-btn" target="_blank">
    <svg class="consultar-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 17A7.5 7.5 0 1117 16.65z"></path>
    </svg>
    Consultar Ahora
  </a>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Seleccionar todos los botones "Ver más"
  const toggleButtons = document.querySelectorAll('.toggle-btn');
  
  // Añadir evento click a cada botón
  toggleButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Encontrar el elemento de información adicional más cercano
      const moreInfo = this.nextElementSibling;
      
      // Alternar la clase 'active' para mostrar/ocultar
      moreInfo.classList.toggle('active');
      
      // Alternar clase active en el botón para la animación de la flecha
      this.classList.toggle('active');
      
      // Cambiar el texto del botón
      if (moreInfo.classList.contains('active')) {
        this.innerHTML = 'Ver menos <span style="margin-left: 5px;">↑</span>';
      } else {
        this.innerHTML = 'Ver más <span style="margin-left: 5px;">↓</span>';
      }
    });
  });
});
</script>

<?php get_footer(); ?>