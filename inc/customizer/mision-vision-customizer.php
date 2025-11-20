<?php
/**
 * Customizer para la página de Misión y Visión
 */

//Mision y vision

function nunoa_customizer_mision_vision($wp_customize) {

    // ==================== HERO ====================
    $wp_customize->add_section('mv_hero_section', [
        'title' => __('Misión & Visión – Hero', 'nunoa'),
        'priority' => 90
    ]);

    $wp_customize->add_setting('mv_hero_image', [
        'default' => get_template_directory_uri() . '/assets/img/BgVerde.png',
        'sanitize_callback' => 'esc_url_raw'
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mv_hero_image', [
        'label' => __('Imagen del Hero', 'nunoa'),
        'section' => 'mv_hero_section'
    ]));

    $wp_customize->add_setting('mv_kicker', [
        'default' => 'Nuestra identidad institucional',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control('mv_kicker', [
        'label' => 'Texto pequeño superior (kicker)',
        'section' => 'mv_hero_section',
        'type' => 'text'
    ]);

    $wp_customize->add_setting('mv_title', [
        'default' => 'Misión & Visión',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control('mv_title', [
        'label' => 'Título principal',
        'section' => 'mv_hero_section',
        'type' => 'text'
    ]);

    $wp_customize->add_setting('mv_subtitle', [
        'default' => 'Nuestro propósito, nuestro compromiso...',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control('mv_subtitle', [
        'label' => 'Subtítulo',
        'section' => 'mv_hero_section',
        'type' => 'textarea'
    ]);

    // =============== SECTION TITLE ==================
    $wp_customize->add_section('mv_section_title_section', [
        'title' => __('Título de sección', 'nunoa'),
        'priority' => 91
    ]);

    $wp_customize->add_setting('mv_section_title', [
        'default' => 'Nuestro Propósito Institucional',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control('mv_section_title', [
        'label' => 'Título de sección',
        'section' => 'mv_section_title_section',
        'type' => 'text'
    ]);

    // ==================== MISIÓN ====================
    $wp_customize->add_section('mv_mision_section', [
        'title' => __('Tarjeta Misión', 'nunoa'),
        'priority' => 92
    ]);

    $wp_customize->add_setting('mv_mision_icon', [
        'default' => 'M',
        'sanitize_callback' => 'wp_kses_post'
    ]);
    $wp_customize->add_control('mv_mision_icon', [
        'label' => 'Icono Misión (texto o HTML)',
        'section' => 'mv_mision_section',
        'type' => 'text'
    ]);

    $wp_customize->add_setting('mv_mision_pill', [
        'default' => 'Quiénes somos',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control('mv_mision_pill', [
        'label' => 'Pill Misión',
        'section' => 'mv_mision_section',
        'type' => 'text'
    ]);

    $wp_customize->add_setting('mv_mision_title', [
        'default' => 'Misión',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control('mv_mision_title', [
        'label' => 'Título Misión',
        'section' => 'mv_mision_section',
        'type' => 'text'
    ]);

    $wp_customize->add_setting('mv_mision_body', [
        'default' => '',
        'sanitize_callback' => 'wp_kses_post'
    ]);
    $wp_customize->add_control('mv_mision_body', [
        'label' => 'Texto de la misión (HTML permitido)',
        'section' => 'mv_mision_section',
        'type' => 'textarea'
    ]);

    // ==================== VISIÓN ====================
    $wp_customize->add_section('mv_vision_section', [
        'title' => __('Tarjeta Visión', 'nunoa'),
        'priority' => 93
    ]);

    $wp_customize->add_setting('mv_vision_icon', [
        'default' => 'V',
        'sanitize_callback' => 'wp_kses_post'
    ]);
    $wp_customize->add_control('mv_vision_icon', [
        'label' => 'Icono Visión',
        'section' => 'mv_vision_section',
        'type' => 'text'
    ]);

    $wp_customize->add_setting('mv_vision_pill', [
        'default' => 'Hacia dónde vamos',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control('mv_vision_pill', [
        'label' => 'Pill Visión',
        'section' => 'mv_vision_section',
        'type' => 'text'
    ]);

    $wp_customize->add_setting('mv_vision_title', [
        'default' => 'Visión',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control('mv_vision_title', [
        'label' => 'Título Visión',
        'section' => 'mv_vision_section',
        'type' => 'text'
    ]);

    $wp_customize->add_setting('mv_vision_body', [
        'default' => '',
        'sanitize_callback' => 'wp_kses_post'
    ]);
    $wp_customize->add_control('mv_vision_body', [
        'label' => 'Texto de la visión (HTML permitido)',
        'section' => 'mv_vision_section',
        'type' => 'textarea'
    ]);
}
add_action('customize_register', 'nunoa_customizer_mision_vision');

//Mision y vision selective refresh

function nunoa_mision_vision_selective_refresh($wp_customize) {

    $pairs = [
        'mv_kicker' => '#mv_kicker_preview',
        'mv_title' => '#mv_title_preview',
        'mv_subtitle' => '#mv_subtitle_preview',
        'mv_section_title' => '#mv_section_title_preview',
        'mv_mision_pill' => '#mv_mision_pill_preview',
        'mv_mision_title' => '#mv_mision_title_preview',
        'mv_mision_body' => '#mv_mision_body_preview',
        'mv_vision_pill' => '#mv_vision_pill_preview',
        'mv_vision_title' => '#mv_vision_title_preview',
        'mv_vision_body' => '#mv_vision_body_preview',
    ];

    foreach ($pairs as $setting => $selector) {
        $wp_customize->selective_refresh->add_partial($setting, [
            'selector' => $selector,
            'render_callback' => fn() => get_theme_mod($setting),
        ]);
    }
}
add_action('customize_register', 'nunoa_mision_vision_selective_refresh');
