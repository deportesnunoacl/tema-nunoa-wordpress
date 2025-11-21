<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<style>
/* ==========================================================
   WHATSAPP WIDGET – CON BORDE + ANIMACIÓN
========================================================== */

/* CONTENEDOR GENERAL */
.wa__widget_container {
    position: fixed;
    bottom: 30px; 
    right: 20px;
    z-index: 99999;
    font-family: "Roboto", sans-serif;
}

/* BOTÓN COMPACTO */
.wa__btn_popup {
    display: flex;
    align-items: center;
    cursor: pointer;
    margin-bottom: 12px;
    transition: transform .25s ease, opacity .25s ease;
}

.wa__btn_popup:hover {
    transform: scale(1.05);
}

.wa__btn_popup_txt {
    background: #3DAF6B;
    color: #fff;
    padding: 8px 12px;
    border-radius: 12px;
    font-size: 13px;
    margin-right: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.25);
    border: 2px solid #2f8d55; /* borde */
    white-space: nowrap;
    transition: background .25s ease;
}

.wa__btn_popup_txt:hover {
    background: #2f8d55;
}

/* Ícono o avatar (pequeño) */
.wa__btn_popup .wa__popup_avatar {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.25);
    border: 2px solid #2f8d55; /* borde */
    transition: transform .25s ease;
}

.wa__btn_popup:hover .wa__popup_avatar {
    transform: scale(1.08);
}

/* POPUP PRINCIPAL */
.wa__popup_chat_box {
    width: 290px;
    background: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0px 5px 20px rgba(0,0,0,0.25);
    border: 2px solid #3DAF6B; /* borde principal */
    
    /* Oculto inicialmente */
    display: none;
    
    /* Animación */
    opacity: 0;
    transform: translateY(10px);
    transition: opacity .3s ease, transform .3s ease;
}

/* Cuando se muestra (lo activamos por JS) */
.wa__popup_chat_box.active {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

/* HEADER DEL POPUP */
.wa__popup_heading {
    background: #3DAF6B;
    padding: 14px;
    color: #fff;
}

.wa__popup_title {
    font-size: 18px;
    font-weight: bold;
}

.wa__popup_intro {
    font-size: 12px;
    margin-top: 4px;
    color: #e1f5d0;
}

/* CONTENIDO */
.wa__popup_content {
    padding: 12px;
}

.wa__popup_notice {
    font-size: 11px;
    margin-bottom: 10px;
    color: #666;
}

/* ITEM */
.wa__popup_content_item .wa__stt {
    display: flex;
    align-items: center;
    background: #f7f7f7;
    padding: 10px;
    border-radius: 10px;
    text-decoration: none;
    border: 2px solid #e8e8e8;
    transition: background .25s ease, border .25s ease, transform .25s ease;
}

.wa__popup_content_item .wa__stt:hover {
    background: #e9f8ee;
    border-color: #3DAF6B;
    transform: scale(1.02);
}

/* AVATAR */
.wa__popup_avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 12px;
    border: 2px solid #3DAF6B; /* borde */
}

.wa__popup_avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* TEXTO */
.wa__member_name {
    font-size: 14px;
    font-weight: 600;
}

.wa__member_duty {
    font-size: 11px;
    color: #777;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .wa__widget_container {
        top: 100px;
        left: 10px;
    }
}
.wa__popup_avatar--white {
    background: #fff;
    padding: 6px;
    border-radius: 50%;
}


</style>
<body <?php body_class(); ?>>
<!-- WhatsApp compact + Popup Ñuñoa Deportes -->
<div id="wa" class="wa__widget_container">

  <!-- Botón compacto (pre-popup) -->
  <div class="wa__btn_popup" id="waToggle">
    <div class="wa__btn_popup_txt">
    <span><?php echo get_theme_mod('nunoa_whatsapp_title', '¿Necesitas ayuda? Chatea con nosotros'); ?></span>
    </div>
          <div class="wa__popup_avatar wa__popup_avatar--white">
            <img 
              src="<?php echo get_template_directory_uri(); ?>/assets/img/wa.png"
              alt="Avatar Ñuñoa Deportes"
            />
          </div>
  </div>

  <!-- Popup completo -->
  <div class="wa__popup_chat_box" id="waPopup">
    <div class="wa__popup_heading">
      <div class="wa__popup_title">
          <?php echo get_theme_mod('nunoa_whatsapp_title', '¡Chatea con nosotros!'); ?>
      </div>
    <div class="wa__popup_intro">
      <?php echo get_theme_mod('nunoa_whatsapp_intro', 'Escríbenos y responderemos tus dudas por WhatsApp.'); ?>
    </div>
    </div>

    <div class="wa__popup_content">
<div class="wa__popup_notice">
    <?php echo get_theme_mod('nunoa_whatsapp_notice', 'Usualmente respondemos en unos minutos.'); ?>
</div>
      <div class="wa__popup_content_item">
        <?php if ( get_theme_mod('nunoa_whatsapp_extra_number') ) : ?>
<div class="wa__popup_content_item">
    <a 
      href="https://wa.me/<?php echo get_theme_mod('nunoa_whatsapp_extra_number'); ?>"
      target="_blank"
      class="wa__stt"
    >
      <div class="wa__popup_avatar">
        <img src="<?php echo get_theme_mod('nunoa_whatsapp_extra_avatar'); ?>" />
      </div>

      <div class="wa__popup_txt">
        <div class="wa__member_name">
            <?php echo get_theme_mod('nunoa_whatsapp_extra_name'); ?>
        </div>
        <div class="wa__member_duty">
            <?php echo get_theme_mod('nunoa_whatsapp_extra_role'); ?>
        </div>
      </div>
    </a>
</div>
<?php endif; ?>

        <a 
          href="https://wa.me/<?php echo get_theme_mod('nunoa_whatsapp_number', '56944002092'); ?>?text=Hola%20quisiera%20contactar%20con%20Ñuñoa%20Deportes"
          target="_blank"
          rel="nofollow noopener noreferrer"
          class="wa__stt"
        >
          <div class="wa__popup_avatar">
            <img 
              src="<?php echo get_template_directory_uri(); ?>/assets/img/Logowanunoa.png"
              alt="Avatar Ñuñoa Deportes"
            />
          </div>

          <div class="wa__popup_txt">
            <div class="wa__member_name">Equipo Ñuñoa Deportes</div>
            <div class="wa__member_duty">Soporte y atención al vecino</div>
          </div>

        </a>
      </div>
    </div>
  </div>

</div>


<!-- ============================================================
                           HEADER
============================================================= -->
<header>

  <!-- TOP BAR (SOLO DESKTOP) -->
  <div class="top-bar">
    <div class="container w-full mx-auto links">
      <a href="https://www.leylobby.gob.cl/instituciones/CM081" target="_blank" rel="noopener noreferrer">Plataforma<br><strong>Ley del lobby</strong></a>
      <a href="https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU186" target="_blank" rel="noopener noreferrer">Transparencia Activa<br><strong>Ley de Transparencia</strong></a>
      <a href="https://www.portaltransparencia.cl/PortalPdT/ingreso-sai-v2?idOrg=620" target="_blank" rel="noopener noreferrer">Solicitud de información<br><strong>Ley de Transparencia</strong></a>
    </div>
  </div>

  <!-- MAIN HEADER -->
  <div class="container w-full mx-auto header-main">

    <!-- LOGO -->
    <div class="header-logo">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/LogoÑuñoa.png" alt="">
      </a>
    </div>

    <!-- MENU DESKTOP -->
    <nav class="nav-desktop">
      <?php
        wp_nav_menu([
          'theme_location' => 'main_menu',
          'container'      => false,
          'menu_class'     => 'menu-desktop',
          'walker'         => new Tailwind_Alpine_Navwalker(),
        ]);
      ?>
      <a href="/portal-talleres" class="btn-talleres">Portal de Talleres</a>
    </nav>

    <!-- HAMBURGUESA MOBILE -->
    <div class="hamburger" id="openMobileMenu">☰</div>

  </div>

  <!-- MOBILE MENU -->
  <div id="mobileMenuBg" class="mobile-menu-bg">
    <div class="mobile-menu" id="mobileMenu">

      <div class="mobile-close" id="closeMobileMenu">✕</div>

      <?php
        wp_nav_menu([
          'theme_location' => 'main_menu',
          'container'      => false,
          'menu_class'     => 'menu-mobile',
        ]);
      ?>

      <a href="/portal-talleres" class="btn-talleres">Portal de Talleres</a>

    </div>
  </div>

</header>


<!-- ============================================================
                      ESTILOS COMPLETOS
============================================================= -->
<style>


/* ---------------------- TOP BAR ---------------------- */
.top-bar {
    background: #3daf6b;
    color: white;
    font-family: Roboto, sans-serif;
    padding: 12px 0;
}
.top-bar .links {
    display: flex;
    gap: 30px;
    justify-content: flex-end;
    font-size: 14px;
}
.top-bar a { color: white; text-decoration: none; }

/* ---------------------- HEADER ---------------------- */
.header-main {
    padding: 16px 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.header-logo img {
    max-width: 170px;
}

/* ---------------------- MENU DESKTOP ---------------------- */
.nav-desktop {
    display: flex;
    align-items: center;
    gap: 30px;
    font-family: Roboto, sans-serif;
}
.menu-desktop {
    display: flex;
    gap: 25px;
    list-style: none;
    padding: 0;
    align-items: center;
}
.menu-desktop a {
    color: #3daf6b;
    font-size: 15px;
    text-decoration: none;
}

.btn-talleres {
    background: #3daf6b;
    color: white !important;
    padding: 10px 22px;
    border-radius: 30px;
    font-weight: bold;
    font-size: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transition: .2s;
}
.btn-talleres:hover {
    background: #2f8d55;
}

/* ---------------------- HAMBURGER MOBILE ---------------------- */
.hamburger {
    display: none;
    font-size: 32px;
    color: #3daf6b;
    cursor: pointer;
}

/* ---------------------- MOBILE MENU ---------------------- */
.mobile-menu-bg {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.45);
    backdrop-filter: blur(4px);
    display: none;
    z-index: 900;
}

.mobile-menu {
    width: 290px;
    height: 100%;
    background: #fff;
    padding: 30px 22px;
    display: flex;
    flex-direction: column;
    transform: translateX(-100%);
    transition: transform .25s ease-out;
    box-shadow: 4px 0 20px rgba(0,0,0,0.15);
}

.mobile-menu.open {
    transform: translateX(0);
}

.mobile-close {
    font-size: 26px;
    color: #3daf6b;
    cursor: pointer;
    margin-bottom: 25px;
}

/* LISTA MOBILE */
.menu-mobile {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 14px;
    margin-bottom: 30px;
    padding: 0;
}

.menu-mobile li {
    padding-bottom: 12px;
    border-bottom: 1px solid #e6e6e6;
}

.menu-mobile li:last-child {
    border-bottom: none;
}

.menu-mobile a {
    font-size: 18px;
    color: #3daf6b;
    font-weight: 500;
    text-decoration: none;
}

/* SUBMENÚ */
.menu-mobile .sub-menu {
    margin-top: 10px;
    padding-left: 15px;
    border-left: 3px solid #3daf6b25;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.menu-mobile .sub-menu a {
    font-size: 16px;
    color: #2f8d55;
}

/* BOTÓN MOBILE */
.btn-talleres {
    background: #3daf6b;
    padding: 14px 25px;
    border-radius: 30px;
    text-align: center;
    font-size: 17px;
    font-weight: 700;
    color: white !important;
    margin-top: auto;
    box-shadow: 0 6px 18px rgba(61, 175, 107, 0.4);
}

/* ---------------------- RESPONSIVE ---------------------- */
@media (max-width: 768px) {
    .top-bar { display: none; }
    .nav-desktop { display: none; }
    .hamburger { display: block; }
}
</style>

<!-- ============================================================
                              JS
============================================================= -->
<script>
document.getElementById("openMobileMenu").addEventListener("click", () => {
  document.getElementById("mobileMenuBg").style.display = "block";
  document.getElementById("mobileMenu").classList.add("open");
});

document.getElementById("closeMobileMenu").addEventListener("click", () => {
  document.getElementById("mobileMenu").classList.remove("open");
  setTimeout(() => {
    document.getElementById("mobileMenuBg").style.display = "none";
  }, 250);
});
</script>
<script>
document.getElementById("waToggle").addEventListener("click", function() {
    const popup = document.getElementById("waPopup");

    if (popup.classList.contains("active")) {
        popup.classList.remove("active");
        setTimeout(() => popup.style.display = "none", 300);
    } else {
        popup.style.display = "block";
        setTimeout(() => popup.classList.add("active"), 10);
    }
});
</script>


<?php wp_footer(); ?>
</body>
</html>
