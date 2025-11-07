<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Barra superior de enlaces -->
<header class="bg-white w-full">
  <div class="bg-primary w-full hidden md:block">
    <div class="w-full container mx-auto flex justify-end gap-10 text-sm text-white p-5 font-roboto ">
      <a href="#" class="">
        Plataforma<br/>
        <span class="font-bold ">Ley del lobby</span>
      </a>
      <a href="#" class="">
        Transparencia Activa<br/>
        <span class="font-bold">Ley de Transparencia</span>
      </a>
      <a href="#" class="">
        Solicitud de información<br/>
        <span class="font-bold">Ley de Transparencia</span>
      </a>
      <a href="#" class="">
        Transparencia municipal<br/>
        <span class="font-bold">Histórico</span>
      </a>
    </div>
  </div>

  <!-- Logo + Menú principal + acciones -->
  <div class="w-full container mx-auto flex justify-between items-center py-3 px-5 md:px-0">
    <!-- Logo -->
    <div class="flex items-center gap-4">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/LogoÑuñoa.png" alt="Logo Ñuñoa Deportes" class="w-1/2 md:w-auto">
      </a>
    </div>

    <!-- Menú principal -->
    <nav class="hidden md:flex items-center text-sm font-mediu font-roboto text-green-600">
  <?php
    wp_nav_menu([
  'theme_location' => 'main_menu',
  'container' => false,
  'menu_class' => 'flex gap-6 items-center',
  'walker' => new Tailwind_Alpine_Navwalker(),
]);

  ?>
</nav>

  </div>
</header>
