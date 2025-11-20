<?php
/**
 * Customizer para la página de Información General
 */

// informacion general 
function nunoa_customizer_info_general($wp_customize) {

    // ================= HERO =================
    $wp_customize->add_section('ig_hero_section', array(
        'title' => __('Información General – Hero', 'nunoa'),
        'priority' => 80
    ));

    // Hero Image
    $wp_customize->add_setting('ig_hero_image', array(
        'default' => get_template_directory_uri() . '/assets/img/headernosotros.png',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ig_hero_image', array(
        'label' => __('Imagen del Hero', 'nunoa'),
        'section' => 'ig_hero_section'
    )));

    // Hero Title
    $wp_customize->add_setting('ig_hero_title', array(
        'default' => 'Información General',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('ig_hero_title', array(
        'label' => __('Título del Hero', 'nunoa'),
        'section' => 'ig_hero_section',
        'type' => 'text'
    ));

    // Hero Subtitle
    $wp_customize->add_setting('ig_hero_subtitle', array(
        'default' => 'Conoce nuestra historia...',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('ig_hero_subtitle', array(
        'label' => __('Subtítulo del Hero', 'nunoa'),
        'section' => 'ig_hero_section',
        'type' => 'text'
    ));

    // ================= TARJETAS =================
    $wp_customize->add_section('ig_cards_section', array(
        'title' => __('Información General – Tarjetas', 'nunoa'),
        'priority' => 81
    ));

    for ($i = 1; $i <= 3; $i++) {

        $wp_customize->add_setting("ig_card{$i}_img", array(
            'default' => get_template_directory_uri() . "/assets/icons/" . ["genero","curso","derecho"][$i-1] . ".png",
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "ig_card{$i}_img", array(
            'label' => __("Imagen Tarjeta $i", 'nunoa'),
            'section' => 'ig_cards_section'
        )));

        $wp_customize->add_setting("ig_card{$i}_title", array(
            'default' => ['Género','Curso de Vida','Derecho'][$i-1],
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control("ig_card{$i}_title", array(
            'label' => __("Título Tarjeta $i", 'nunoa'),
            'section' => 'ig_cards_section',
            'type' => 'text'
        ));

        $wp_customize->add_setting("ig_card{$i}_text", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control("ig_card{$i}_text", array(
            'label' => __("Texto Tarjeta $i", 'nunoa'),
            'section' => 'ig_cards_section',
            'type' => 'textarea'
        ));
    }

    // ================= RECINTOS =================
    $wp_customize->add_section('ig_rec_section', array(
        'title' => __('Información General – Recintos', 'nunoa'),
        'priority' => 82
    ));

    $wp_customize->add_setting('ig_rec_title', [
        'default' => 'Conoce nuestros recintos y mucho más...',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control('ig_rec_title', [
        'label' => 'Título de recintos',
        'section' => 'ig_rec_section',
        'type' => 'text'
    ]);

    $wp_customize->add_setting('ig_rec_sub', [
        'default' => 'Contamos con múltiples espacios deportivos...',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control('ig_rec_sub', [
        'label' => 'Subtítulo de recintos',
        'section' => 'ig_rec_section',
        'type' => 'textarea'
    ]);
}
add_action('customize_register', 'nunoa_customizer_info_general');

//informacion general selective refresh (los lapices para editar)

function nunoa_ig_selective_refresh($wp_customize) {

    // HERO
    $wp_customize->selective_refresh->add_partial('ig_hero_title', [
        'selector' => '#ig_hero_title_preview',
        'render_callback' => fn() => esc_html(get_theme_mod('ig_hero_title'))
    ]);

    $wp_customize->selective_refresh->add_partial('ig_hero_subtitle', [
        'selector' => '#ig_hero_sub_preview',
        'render_callback' => fn() => esc_html(get_theme_mod('ig_hero_subtitle'))
    ]);

    // CARDS
    for ($i=1;$i<=3;$i++){
        $wp_customize->selective_refresh->add_partial("ig_card{$i}_title", [
            'selector' => "#ig_card{$i}_title_preview",
            'render_callback' => fn() => esc_html(get_theme_mod("ig_card{$i}_title"))
        ]);

        $wp_customize->selective_refresh->add_partial("ig_card{$i}_text", [
            'selector' => "#ig_card{$i}_text_preview",
            'render_callback' => fn() => esc_html(get_theme_mod("ig_card{$i}_text"))
        ]);
    }

    // RECINTOS
    $wp_customize->selective_refresh->add_partial('ig_rec_title', [
        'selector' => '#ig_rec_title_preview',
        'render_callback' => fn() => esc_html(get_theme_mod('ig_rec_title'))
    ]);

    $wp_customize->selective_refresh->add_partial('ig_rec_sub', [
        'selector' => '#ig_rec_sub_preview',
        'render_callback' => fn() => esc_html(get_theme_mod('ig_rec_sub'))
    ]);
}
add_action('customize_register', 'nunoa_ig_selective_refresh');
