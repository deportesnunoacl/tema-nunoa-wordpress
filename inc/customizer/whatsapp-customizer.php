<?php
/**
 * Customizer – WhatsApp Widget Ñuñoa Deportes
 */

function nunoa_whatsapp_customizer( $wp_customize ) {

    /* ============================================================
       SECCIÓN PRINCIPAL
    ============================================================ */
    $wp_customize->add_section('nunoa_whatsapp_section', [
        'title'       => __('WhatsApp – Contacto', 'nunoa'),
        'description' => __('Configura los datos del widget WhatsApp.', 'nunoa'),
        'priority'    => 30,
    ]);


    /* ============================================================
       ⚡ CAMPOS BASE (principal)
    ============================================================ */

    // WhatsApp principal
    $wp_customize->add_setting('nunoa_whatsapp_number', [
        'default'   => '56944002092',
        'transport' => 'postMessage',
    ]);

    $wp_customize->add_control('nunoa_whatsapp_number', [
        'label'   => __('Número WhatsApp Principal', 'nunoa'),
        'section' => 'nunoa_whatsapp_section',
        'type'    => 'text',
    ]);

    // Título
    $wp_customize->add_setting('nunoa_whatsapp_title', [
        'default'   => '¡Chatea con nosotros!',
        'transport' => 'postMessage'
    ]);

    $wp_customize->add_control('nunoa_whatsapp_title', [
        'label'   => __('Título del Popup', 'nunoa'),
        'section' => 'nunoa_whatsapp_section',
        'type'    => 'text',
    ]);

    // Intro
    $wp_customize->add_setting('nunoa_whatsapp_intro', [
        'default'   => 'Escríbenos y responderemos tus dudas por WhatsApp.',
        'transport' => 'postMessage'
    ]);

    $wp_customize->add_control('nunoa_whatsapp_intro', [
        'label'   => __('Texto Introductorio', 'nunoa'),
        'section' => 'nunoa_whatsapp_section',
        'type'    => 'textarea',
    ]);

    // Aviso
    $wp_customize->add_setting('nunoa_whatsapp_notice', [
        'default'   => 'Usualmente respondemos en unos minutos.',
        'transport' => 'postMessage'
    ]);

    $wp_customize->add_control('nunoa_whatsapp_notice', [
        'label'   => __('Texto de Aviso', 'nunoa'),
        'section' => 'nunoa_whatsapp_section',
        'type'    => 'text',
    ]);


    /* ============================================================
       👥  CONTACTO EXTRA (ejemplo)
       Puedes duplicar esto para más contactos
    ============================================================ */

    // Imagen
    $wp_customize->add_setting('nunoa_whatsapp_extra_avatar', [
        'default'   => '',
        'transport' => 'postMessage'
    ]);

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'nunoa_whatsapp_extra_avatar',
            [
                'label'    => __('Imagen del contacto extra', 'nunoa'),
                'section'  => 'nunoa_whatsapp_section',
                'settings' => 'nunoa_whatsapp_extra_avatar'
            ]
        )
    );

    // Nombre
    $wp_customize->add_setting('nunoa_whatsapp_extra_name', [
        'default'   => 'Nuevo Contacto',
        'transport' => 'postMessage'
    ]);

    $wp_customize->add_control('nunoa_whatsapp_extra_name', [
        'label'   => __('Nombre del contacto extra', 'nunoa'),
        'section' => 'nunoa_whatsapp_section',
        'type'    => 'text',
    ]);

    // Cargo
    $wp_customize->add_setting('nunoa_whatsapp_extra_role', [
        'default'   => 'Atención al vecino',
        'transport' => 'postMessage'
    ]);

    $wp_customize->add_control('nunoa_whatsapp_extra_role', [
        'label'   => __('Cargo del contacto extra', 'nunoa'),
        'section' => 'nunoa_whatsapp_section',
        'type'    => 'text',
    ]);

    // Número extra
    $wp_customize->add_setting('nunoa_whatsapp_extra_number', [
        'default'   => '',
        'transport' => 'postMessage'
    ]);

    $wp_customize->add_control('nunoa_whatsapp_extra_number', [
        'label'   => __('Número WhatsApp del contacto extra', 'nunoa'),
        'section' => 'nunoa_whatsapp_section',
        'type'    => 'text',
    ]);


    /* ============================================================
       ✏️ SELECTIVE REFRESH – LOS LÁPICES AZULES
    ============================================================ */

    // Título
    $wp_customize->selective_refresh->add_partial('nunoa_whatsapp_title', [
        'selector'        => '#waPopup .wa__popup_title',
        'render_callback' => function () {
            return get_theme_mod('nunoa_whatsapp_title');
        }
    ]);

    // Intro
    $wp_customize->selective_refresh->add_partial('nunoa_whatsapp_intro', [
        'selector'        => '#waPopup .wa__popup_intro',
        'render_callback' => function () {
            return get_theme_mod('nunoa_whatsapp_intro');
        }
    ]);

    // Aviso
    $wp_customize->selective_refresh->add_partial('nunoa_whatsapp_notice', [
        'selector'        => '#waPopup .wa__popup_notice',
        'render_callback' => function () {
            return get_theme_mod('nunoa_whatsapp_notice');
        }
    ]);
}

add_action('customize_register', 'nunoa_whatsapp_customizer');
