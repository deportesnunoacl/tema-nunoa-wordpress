<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- ============================================================
                           HEADER
============================================================= -->
<header>

  <!-- TOP BAR (SOLO DESKTOP) -->
  <div class="top-bar">
    <div class="container w-full mx-auto links">
      <a href="#">Plataforma<br><strong>Ley del lobby</strong></a>
      <a href="#">Transparencia Activa<br><strong>Ley de Transparencia</strong></a>
      <a href="#">Solicitud de información<br><strong>Ley de Transparencia</strong></a>
      <a href="#">Transparencia municipal<br><strong>Histórico</strong></a>
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

<?php wp_footer(); ?>
</body>
</html>
