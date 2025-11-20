<?php
/**
 * Customizer para la página de Becas
 */

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

    // ===== SECCIÓN BECAS =====
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

// Selective Refresh para lápices de edición BECAS
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
