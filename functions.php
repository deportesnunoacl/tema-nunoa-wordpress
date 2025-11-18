<?php
// ==========================================================
// 🧩 FORZAR PERSONALIZADOR CLÁSICO Y DESACTIVAR EDITOR DE BLOQUES
// ==========================================================

add_theme_support('post-thumbnails');

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
// 💡 GLightbox para galería de noticias
// ==========================================================
function enqueue_glightbox_assets() {
  wp_enqueue_style('glightbox-css', 'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css', [], null);
  wp_enqueue_script('glightbox-js', 'https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js', [], null, true);

  // Script de inicialización
  wp_add_inline_script('glightbox-js', "
    document.addEventListener('DOMContentLoaded', function() {
      const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
        closeOnOutsideClick: true
      });
    });
  ");
}
add_action('wp_enqueue_scripts', 'enqueue_glightbox_assets');


// ==========================================================
// 🖼️ Meta Box para galería de imágenes (sin ACF)
// ==========================================================
function nunoa_add_gallery_metabox() {
  add_meta_box(
    'nunoa_gallery_metabox',
    'Galería de imágenes',
    'nunoa_gallery_metabox_html',
    'post',
    'normal',
    'default'
  );
}
add_action('add_meta_boxes', 'nunoa_add_gallery_metabox');

function nunoa_gallery_metabox_html($post) {
  $gallery = get_post_meta($post->ID, '_nunoa_gallery', true);
  ?>
  <div id="nunoa-gallery-wrapper">
    <p><button type="button" class="button" id="add-gallery-images">Agregar imágenes</button></p>
    <ul id="nunoa-gallery-list" style="margin-top:10px;display:flex;flex-wrap:wrap;gap:10px;">
      <?php if (!empty($gallery)) :
        $ids = explode(',', $gallery);
        foreach ($ids as $id) :
          $img = wp_get_attachment_image($id, 'thumbnail');
          echo "<li style='list-style:none;'>$img</li>";
        endforeach;
      endif; ?>
    </ul>
    <input type="hidden" name="nunoa_gallery" id="nunoa_gallery" value="<?php echo esc_attr($gallery); ?>">
  </div>

  <script>
    jQuery(document).ready(function($){
      const frame = wp.media({ multiple: true });
      $('#add-gallery-images').on('click', function(e){
        e.preventDefault();
        frame.open();
      });
      frame.on('select', function(){
        const attachments = frame.state().get('selection').map(a => a.id);
        $('#nunoa_gallery').val(attachments.join(','));
        location.reload();
      });
    });
  </script>
  <?php
}

function nunoa_save_gallery_meta($post_id) {
  if (isset($_POST['nunoa_gallery'])) {
    update_post_meta($post_id, '_nunoa_gallery', sanitize_text_field($_POST['nunoa_gallery']));
  }
}
add_action('save_post', 'nunoa_save_gallery_meta');

// ==========================================================
// 🔁 Vista previa en vivo
// ==========================================================
function nunoa_customizer_live_preview() {
  wp_enqueue_script(
    'nunoa-customizer-live',
    get_template_directory_uri() . '/assets/js/customizer-live.js',
    ['jquery', 'customize-preview'],
    null,
    true
  );
}
add_action('customize_preview_init', 'nunoa_customizer_live_preview');

// ==========================================================
// 🧠 Debug para confirmar carga del Customizer
// ==========================================================
add_action('customize_register', function() {
  error_log('🎯 Customize_register se ejecutó correctamente');
});



// ==========================================================
// 🧱 INCLUDES
// ==========================================================
require_once get_template_directory() . '/inc/header/class-tailwind-navwalker.php';
require_once get_template_directory() . '/inc/custom-post-types/Recintos.php';
require_once get_template_directory() . '/inc/custom-post-types/Slider.php';
// CUSTOMIZER
require_once get_template_directory() . '/inc/customizer/offer/offer-customizer.php';
require_once get_template_directory() . '/inc/customizer/noticias/noticias-customizer.php';



// CPT Beneficiarios
function becas_register_cpt() {
    $labels = array(
        'name' => 'Beneficiarios',
        'singular_name' => 'Beneficiario'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-awards',
        'supports' => array('title'), // solo título
    );

    register_post_type('beneficiario', $args);
}
add_action('init', 'becas_register_cpt');

// Campo número para Beneficiarios
function beneficiario_metabox() {
    add_meta_box(
        'beneficiario_numero',
        'Número de lista',
        'beneficiario_numero_callback',
        'beneficiario',
        'side'
    );
}
add_action('add_meta_boxes', 'beneficiario_metabox');

function beneficiario_numero_callback($post) {
    $value = get_post_meta($post->ID, '_beneficiario_numero', true);
    echo '<label>Número:</label>';
    echo '<input type="number" name="beneficiario_numero" value="' . esc_attr($value) . '" style="width:100%;">';
}

function beneficiario_numero_save($post_id) {
    if (array_key_exists('beneficiario_numero', $_POST)) {
        update_post_meta($post_id, '_beneficiario_numero', sanitize_text_field($_POST['beneficiario_numero']));
    }
}
add_action('save_post', 'beneficiario_numero_save');

function nunoa_customizer_becas($wp_customize) {

    // ===== SECCION HERO =====
    $wp_customize->add_section('becas_hero_section', array(
        'title' => __('Becas – Hero', 'nunoa'),
        'priority' => 30
    ));

    // Título del Hero
    $wp_customize->add_setting('becas_hero_title', array(
        'default' => 'Becas sportlife 2025',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('becas_hero_title', array(
        'label' => __('Título del Hero', 'nunoa'),
        'section' => 'becas_hero_section',
        'type' => 'text'
    ));

    // Subtítulo del Hero
    $wp_customize->add_setting('becas_hero_subtitle', array(
        'default' => 'Conoce nuestros ganadores de la beca.',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('becas_hero_subtitle', array(
        'label' => __('Subtítulo del Hero', 'nunoa'),
        'section' => 'becas_hero_section',
        'type' => 'text'
    ));

    // Imagen del banner
    $wp_customize->add_setting('becas_hero_image', array(
        'default' => get_template_directory_uri() . '/assets/img/becas.png',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'becas_hero_image',
        array(
            'label' => __('Imagen del Hero', 'nunoa'),
            'section' => 'becas_hero_section'
        )
    ));

    // ===== SECCIÓN INTRO TEXT =====
    $wp_customize->add_section('becas_intro_section', array(
        'title' => __('Texto introductorio', 'nunoa'),
        'priority' => 35
    ));

    $wp_customize->add_setting('becas_intro_title', array(
        'default' => 'Ganadoras y ganadores Beca Sportlife 2025',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('becas_intro_title', array(
        'label' => __('Título introductorio', 'nunoa'),
        'section' => 'becas_intro_section',
        'type' => 'text'
    ));

    // Texto descriptivo largo
    $wp_customize->add_setting('becas_intro_text', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post'
    ));

    $wp_customize->add_control('becas_intro_text', array(
        'label' => __('Texto descriptivo', 'nunoa'),
        'section' => 'becas_intro_section',
        'type' => 'textarea'
    ));


    // ===== SECCIÓN TITLE BENEFICIARIOS =====
    $wp_customize->add_section('becas_list_section', array(
        'title' => __('Título de lista de beneficiarios', 'nunoa'),
        'priority' => 40
    ));

    $wp_customize->add_setting('becas_list_title', array(
        'default' => 'Lista de beneficiadas y beneficiados',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('becas_list_title', array(
        'label' => __('Título de sección', 'nunoa'),
        'section' => 'becas_list_section',
        'type' => 'text'
    ));
}

add_action('customize_register', 'nunoa_customizer_becas');

// Selective Refresh para lápices de edición
function nunoa_becas_selective_refresh($wp_customize) {

    // Hero Title
    $wp_customize->selective_refresh->add_partial('becas_hero_title', array(
        'selector' => '#becas_hero_title_preview',
        'render_callback' => function() {
            return esc_html( get_theme_mod('becas_hero_title') );
        }
    ));

    // Hero Subtitle
    $wp_customize->selective_refresh->add_partial('becas_hero_subtitle', array(
        'selector' => '#becas_hero_subtitle_preview',
        'render_callback' => function() {
            return esc_html( get_theme_mod('becas_hero_subtitle') );
        }
    ));

    // Intro Title
    $wp_customize->selective_refresh->add_partial('becas_intro_title', array(
        'selector' => '#becas_intro_title_preview',
        'render_callback' => function() {
            return esc_html( get_theme_mod('becas_intro_title') );
        }
    ));

    // Intro Text
    $wp_customize->selective_refresh->add_partial('becas_intro_text', array(
        'selector' => '#becas_intro_text_preview',
        'render_callback' => function() {
            return wp_kses_post( get_theme_mod('becas_intro_text') );
        }
    ));

    // Beneficiaries title
    $wp_customize->selective_refresh->add_partial('becas_list_title', array(
        'selector' => '#becas_list_title_preview',
        'render_callback' => function() {
            return esc_html( get_theme_mod('becas_list_title') );
        }
    ));
}

add_action('customize_register', 'nunoa_becas_selective_refresh');
