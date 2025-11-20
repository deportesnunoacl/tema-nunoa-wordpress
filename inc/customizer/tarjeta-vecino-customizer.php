<?php
/**
 * Customizer para la página de Tarjeta Vecino
 */

// tarjeta vecino
function nunoa_customizer_tarjeta_vecino($wp_customize) {

    // =================== HERO ===================
    $wp_customize->add_section('tv_hero_section', array(
        'title' => __('Tarjeta Vecino – Hero', 'nunoa'),
        'priority' => 50
    ));

    // Imagen
    $wp_customize->add_setting('tv_hero_image', array(
        'default' => get_template_directory_uri() . '/assets/img/tarjeta.png',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tv_hero_image', array(
        'label' => __('Imagen del Hero', 'nunoa'),
        'section' => 'tv_hero_section'
    )));

    // Título
    $wp_customize->add_setting('tv_hero_title', array(
        'default' => 'Tarjeta Vecino',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('tv_hero_title', array(
        'label' => __('Título del Hero', 'nunoa'),
        'section' => 'tv_hero_section',
        'type' => 'text'
    ));

    // Subtítulo
    $wp_customize->add_setting('tv_hero_subtitle', array(
        'default' => 'Conoce nuestros beneficios y requisitos de la tarjeta vecino.',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('tv_hero_subtitle', array(
        'label' => __('Subtítulo del Hero', 'nunoa'),
        'section' => 'tv_hero_section',
        'type' => 'text'
    ));

    // =================== CONSULTAR ESTADO ===================
    $wp_customize->add_section('tv_estado_section', array(
        'title' => __('Tarjeta Vecino – Consultar Estado', 'nunoa'),
        'priority' => 55
    ));

    // Título
    $wp_customize->add_setting('tv_estado_title', array(
        'default' => 'Consultar Estado de Tarjeta Vecino',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('tv_estado_title', array(
        'label' => __('Título', 'nunoa'),
        'section' => 'tv_estado_section',
        'type' => 'text'
    ));

    // Texto
    $wp_customize->add_setting('tv_estado_text', array(
        'default' => 'Verifica el estado de tu solicitud o renueva tu tarjeta vecino de forma rápida y sencilla',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('tv_estado_text', array(
        'label' => __('Texto', 'nunoa'),
        'section' => 'tv_estado_section',
        'type' => 'textarea'
    ));

    // Link
    $wp_customize->add_setting('tv_estado_link', array(
        'default' => 'https://nunoa.tarjetavecino.com/consulta',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('tv_estado_link', array(
        'label' => __('Link del botón', 'nunoa'),
        'section' => 'tv_estado_section',
        'type' => 'url'
    ));

    // Texto del botón
    $wp_customize->add_setting('tv_estado_btn', array(
        'default' => 'Consultar Ahora',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('tv_estado_btn', array(
        'label' => __('Texto del botón', 'nunoa'),
        'section' => 'tv_estado_section',
        'type' => 'text'
    ));
}

add_action('customize_register', 'nunoa_customizer_tarjeta_vecino');

function nunoa_customizer_tarjeta_vecino_cards($wp_customize) {

    // ================= REQUISITOS =================
    $wp_customize->add_section('tv_requisitos_section', array(
        'title' => __('Tarjeta Vecino – Requisitos', 'nunoa'),
        'priority' => 60
    ));

    // Título
    $wp_customize->add_setting('tv_req_title', array(
        'default' => 'Requisitos',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('tv_req_title', array(
        'label' => __('Título', 'nunoa'),
        'section' => 'tv_requisitos_section',
        'type' => 'text'
    ));

    // Summary
    $wp_customize->add_setting('tv_req_summary', array(
        'default' => 'Debes acreditar residencia permanente en Ñuñoa mediante documentos válidos.',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('tv_req_summary', array(
        'label' => __('Descripción corta', 'nunoa'),
        'section' => 'tv_requisitos_section',
        'type' => 'text'
    ));

    // Contenido completo (HTML allowed)
    $wp_customize->add_setting('tv_req_content', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('tv_req_content', array(
        'label' => __('Contenido completo (HTML permitido)', 'nunoa'),
        'section' => 'tv_requisitos_section',
        'type' => 'textarea'
    ));

    // ================= BENEFICIOS =================
    $wp_customize->add_section('tv_beneficios_section', array(
        'title' => __('Tarjeta Vecino – Beneficios', 'nunoa'),
        'priority' => 61
    ));

    // Título
    $wp_customize->add_setting('tv_ben_title', array(
        'default' => 'Beneficios',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('tv_ben_title', array(
        'label' => __('Título', 'nunoa'),
        'section' => 'tv_beneficios_section',
        'type' => 'text'
    ));

    // Summary
    $wp_customize->add_setting('tv_ben_summary', array(
        'default' => 'Descuentos y acceso preferente en deportes, salud, cultura y comercios de la comuna.',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('tv_ben_summary', array(
        'label' => __('Descripción corta', 'nunoa'),
        'section' => 'tv_beneficios_section',
        'type' => 'text'
    ));

    // Contenido completo
    $wp_customize->add_setting('tv_ben_content', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('tv_ben_content', array(
        'label' => __('Contenido completo (HTML permitido)', 'nunoa'),
        'section' => 'tv_beneficios_section',
        'type' => 'textarea'
    ));
}
add_action('customize_register', 'nunoa_customizer_tarjeta_vecino_cards');


//lapices azules de tarjeta vecino (selective refresh)

function nunoa_tv_selective_refresh($wp_customize) {

    // HERO TITLE
    $wp_customize->selective_refresh->add_partial('tv_hero_title', array(
        'selector' => '#tv_hero_title_preview',
        'render_callback' => function() {
            return esc_html( get_theme_mod('tv_hero_title') );
        }
    ));

    // HERO SUBTITLE
    $wp_customize->selective_refresh->add_partial('tv_hero_subtitle', array(
        'selector' => '#tv_hero_subtitle_preview',
        'render_callback' => function() {
            return esc_html( get_theme_mod('tv_hero_subtitle') );
        }
    ));

    // CONSULTAR ESTADO TITLE
    $wp_customize->selective_refresh->add_partial('tv_estado_title', array(
        'selector' => '#tv_estado_title_preview',
        'render_callback' => function() {
            return esc_html( get_theme_mod('tv_estado_title') );
        }
    ));

    // CONSULTAR ESTADO TEXT
    $wp_customize->selective_refresh->add_partial('tv_estado_text', array(
        'selector' => '#tv_estado_text_preview',
        'render_callback' => function() {
            return esc_html( get_theme_mod('tv_estado_text') );
        }
    ));

    // CONSULTAR BUTTON TEXT
    $wp_customize->selective_refresh->add_partial('tv_estado_btn', array(
        'selector' => '#tv_estado_btn_preview',
        'render_callback' => function() {
            return esc_html( get_theme_mod('tv_estado_btn') );
        }
    ));
}

add_action('customize_register', 'nunoa_tv_selective_refresh');

function nunoa_tv_cards_selective_refresh($wp_customize) {

    // === REQUISITOS ===
    $wp_customize->selective_refresh->add_partial('tv_req_title', array(
        'selector' => '#tv_req_title_preview',
        'render_callback' => function() {
            return esc_html( get_theme_mod('tv_req_title') );
        }
    ));

    $wp_customize->selective_refresh->add_partial('tv_req_summary', array(
        'selector' => '#tv_req_summary_preview',
        'render_callback' => function() {
            return esc_html( get_theme_mod('tv_req_summary') );
        }
    ));

    $wp_customize->selective_refresh->add_partial('tv_req_content', array(
        'selector' => '#tv_req_content_preview',
        'render_callback' => function() {
            return wp_kses_post( get_theme_mod('tv_req_content') );
        }
    ));

    // === BENEFICIOS ===
    $wp_customize->selective_refresh->add_partial('tv_ben_title', array(
        'selector' => '#tv_ben_title_preview',
        'render_callback' => function() {
            return esc_html( get_theme_mod('tv_ben_title') );
        }
    ));

    $wp_customize->selective_refresh->add_partial('tv_ben_summary', array(
        'selector' => '#tv_ben_summary_preview',
        'render_callback' => function() {
            return esc_html( get_theme_mod('tv_ben_summary') );
        }
    ));

    $wp_customize->selective_refresh->add_partial('tv_ben_content', array(
        'selector' => '#tv_ben_content_preview',
        'render_callback' => function() {
            return wp_kses_post( get_theme_mod('tv_ben_content') );
        }
    ));
}
add_action('customize_register', 'nunoa_tv_cards_selective_refresh');
