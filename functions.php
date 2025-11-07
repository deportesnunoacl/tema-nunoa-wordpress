<?php
// ==========================================================
// 🧩 FORZAR PERSONALIZADOR CLÁSICO Y DESACTIVAR EDITOR DE BLOQUES
// ==========================================================
add_filter('should_load_block_editor_scripts_and_styles', '__return_true', 10);
add_filter('use_block_editor_for_post', '__return_true', 10);
add_filter('use_block_editor_for_page', '__return_true', 10);

add_action('after_setup_theme', function() {
  add_theme_support('post-thumbnails', array('slider'));
});

add_action('admin_menu', function() {
    global $submenu;
    if ( current_user_can('customize') ) {
        $submenu['themes.php'][] = [ __('Personalizar'), 'customize', 'customize.php' ];
    }
});

add_action('after_setup_theme', function() {
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
});

// ==========================================================
// 📦 DEPENDENCIAS Y SCRIPTS
// ==========================================================
function enqueue_alpine() {
    wp_enqueue_script('alpinejs', 'https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_alpine');

function mi_tema_enqueue_swiper() {
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
    wp_enqueue_script('swiper-init', get_template_directory_uri() . '/assets/js/swiper-init.js', ['swiper-js'], null, true);
}
add_action('wp_enqueue_scripts', 'mi_tema_enqueue_swiper');

function mi_tema_tailwind_scripts() {
    wp_enqueue_style(
        'tailwind',
        get_template_directory_uri() . '/assets/css/style.css',
        [],
        filemtime(get_template_directory() . '/assets/css/style.css')
    );
}
add_action('wp_enqueue_scripts', 'mi_tema_tailwind_scripts');

function mi_tema_register_menus() {
    register_nav_menus([
        'main_menu' => __('Menú principal', 'mi-tema-tailwind'),
    ]);
}
add_action('after_setup_theme', 'mi_tema_register_menus');

function mi_tema_fuentes_personalizadas() {
    wp_enqueue_style('mi-tema-google-fonts', 'https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap', false);
    wp_enqueue_style('mi-tema-roboto-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap', false);
}
add_action('wp_enqueue_scripts', 'mi_tema_fuentes_personalizadas');

function enqueue_talleres_script() {
  wp_enqueue_script(
    'talleres-fetch',
    get_template_directory_uri() . '/assets/js/talleres-fetch.js',
    ['swiper-js'],
    null,
    true
  );

  // Pasar ruta base de assets al JS
  wp_localize_script('talleres-fetch', 'themeData', [
    'assetsUrl' => get_template_directory_uri() . '/assets',
  ]);
}
add_action('wp_enqueue_scripts', 'enqueue_talleres_script');

function mi_tema_enqueue_noticias_swiper() {
  wp_enqueue_script(
    'noticias-swiper',
    get_template_directory_uri() . '/assets/js/noticias-swiper.js',
    ['swiper-js'], // depende de Swiper
    null,
    true
  );
}
add_action('wp_enqueue_scripts', 'mi_tema_enqueue_noticias_swiper');

function nunoa_enqueue_faq_script() {
  wp_enqueue_script(
    'faq-toggle',
    get_template_directory_uri() . '/assets/js/faq-toggle.js',
    [],
    null,
    true
  );
}
add_action('wp_enqueue_scripts', 'nunoa_enqueue_faq_script');





// ==========================================================
// 🧱 INCLUDES
// ==========================================================
require_once get_template_directory() . '/inc/header/class-tailwind-navwalker.php';
require_once get_template_directory() . '/inc/custom-post-types/Recintos.php';
require_once get_template_directory() . '/inc/custom-post-types/Slider.php';
require_once get_template_directory() . '/inc/customizer/offer/offer-customizer.php';
