<?php
/**
 * Customizer para la página de Directorio
 */

// Directorios
function nunoa_customizer_directorio($wp_customize) {

    // ---------------- HERO ----------------
    $wp_customize->add_section('dir_hero_section', [
        'title' => __('Directorio – Hero', 'nunoa'),
        'priority' => 100
    ]);

    $wp_customize->add_setting('dir_kicker', [
        'default' => 'Corporación Municipal de Deportes',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control('dir_kicker', [
        'label' => 'Kicker',
        'section' => 'dir_hero_section',
        'type' => 'text'
    ]);

    $wp_customize->add_setting('dir_title', [
        'default' => 'Directorio & Administración',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control('dir_title', [
        'label' => 'Título',
        'section' => 'dir_hero_section',
        'type' => 'text'
    ]);

    $wp_customize->add_setting('dir_subtitle', [
        'default' => 'Conoce al equipo que lidera...',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control('dir_subtitle', [
        'label' => 'Subtítulo',
        'section' => 'dir_hero_section',
        'type' => 'text'
    ]);

    // ---------------- INTRO ----------------
    $wp_customize->add_section('dir_intro_section', [
        'title' => __('Directorio – Texto introductorio', 'nunoa'),
        'priority' => 101
    ]);

    $wp_customize->add_setting('dir_intro_title', [
        'default' => 'Directorio Corporación Municipal de Deportes de Ñuñoa',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control('dir_intro_title', [
        'label' => 'Título introductorio',
        'section' => 'dir_intro_section',
        'type' => 'text'
    ]);

    $wp_customize->add_setting('dir_intro_text', [
        'default' => 'Nuestro directorio está conformado...',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control('dir_intro_text', [
        'label' => 'Texto introductorio',
        'section' => 'dir_intro_section',
        'type' => 'textarea'
    ]);

    // ---------------- TARJETAS ----------------
    $wp_customize->add_section('dir_cards_section', [
        'title' => __('Directorio – Tarjetas', 'nunoa'),
        'priority' => 102
    ]);

    for ($i = 1; $i <= 5; $i++) {

        $wp_customize->add_setting("dir_card{$i}_img", [
            'sanitize_callback' => 'esc_url_raw'
        ]);
        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            "dir_card{$i}_img",
            [
                'label' => "Foto Card $i",
                'section' => 'dir_cards_section'
            ]
        ));

        $wp_customize->add_setting("dir_card{$i}_name", [
            'sanitize_callback' => 'sanitize_text_field'
        ]);
        $wp_customize->add_control("dir_card{$i}_name", [
            'label' => "Nombre Card $i",
            'section' => 'dir_cards_section',
            'type' => 'text'
        ]);

        $wp_customize->add_setting("dir_card{$i}_role", [
            'sanitize_callback' => 'sanitize_text_field'
        ]);
        $wp_customize->add_control("dir_card{$i}_role", [
            'label' => "Cargo Card $i",
            'section' => 'dir_cards_section',
            'type' => 'text'
        ]);
    }
}
add_action('customize_register', 'nunoa_customizer_directorio');


// Directorio Selective refresh

function nunoa_directorio_selective_refresh($wp_customize) {

    $pairs = [
        'dir_kicker' => '#dir_kicker_preview',
        'dir_title' => '#dir_title_preview',
        'dir_subtitle' => '#dir_subtitle_preview',
        'dir_intro_title' => '#dir_intro_title_preview',
        'dir_intro_text' => '#dir_intro_text_preview',
    ];

    for ($i = 1; $i <= 5; $i++) {
        $pairs["dir_card{$i}_name"] = "#dir_card{$i}_name_preview";
        $pairs["dir_card{$i}_role"] = "#dir_card{$i}_role_preview";
    }

    foreach ($pairs as $setting => $selector) {
        $wp_customize->selective_refresh->add_partial($setting, [
            'selector' => $selector,
            'render_callback' => fn() => get_theme_mod($setting),
        ]);
    }
}
add_action('customize_register', 'nunoa_directorio_selective_refresh');
