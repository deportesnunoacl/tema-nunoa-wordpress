<?php
/**
 * Customizer: Sección Noticias (banner superior)
 */

function nunoa_customizer_noticias( $wp_customize ) {

  // ================================
  // 📰 SECCIÓN NOTICIAS
  // ================================
  $wp_customize->add_section('nunoa_noticias_section', array(
    'title'       => __('Sección Noticias', 'nunoa'),
    'priority'    => 35,
    'description' => __('Edita el contenido del banner superior de la página de Noticias.', 'nunoa'),
  ));

  // ---- Título Noticias ----
  $wp_customize->add_setting('nunoa_noticias_title', array(
    'default'           => 'Noticias Ñuñoa Deportes',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
  ));

  $wp_customize->add_control('nunoa_noticias_title_control', array(
    'label'   => __('Título principal (Noticias)', 'nunoa'),
    'section' => 'nunoa_noticias_section',
    'settings'=> 'nunoa_noticias_title',
    'type'    => 'text',
  ));

  // ---- Texto Noticias ----
  $wp_customize->add_setting('nunoa_noticias_text', array(
    'default'           => 'Infórmate sobre los últimos eventos, actividades y logros deportivos de nuestra comuna.',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
  ));

  $wp_customize->add_control('nunoa_noticias_text_control', array(
    'label'   => __('Texto descriptivo (Noticias)', 'nunoa'),
    'section' => 'nunoa_noticias_section',
    'settings'=> 'nunoa_noticias_text',
    'type'    => 'textarea',
  ));

  // ---- Imagen de fondo Noticias ----
  $wp_customize->add_setting('nunoa_noticias_bg', array(
    'default'           => get_template_directory_uri() . '/assets/img/BgVerde.png',
    'sanitize_callback' => 'esc_url_raw',
  ));

  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'nunoa_noticias_bg_control',
      array(
        'label'    => __('Imagen de fondo del banner (Noticias)', 'nunoa'),
        'section'  => 'nunoa_noticias_section',
        'settings' => 'nunoa_noticias_bg',
      )
    )
  );

  // ---- Selective refresh (lápices azules) ----
  if ( isset( $wp_customize->selective_refresh ) ) {

    // Título
    $wp_customize->selective_refresh->add_partial('nunoa_noticias_title', array(
      'selector'        => '#noticias-banner-title',
      'render_callback' => function() {
        return wp_kses_post( get_theme_mod('nunoa_noticias_title') );
      },
    ));

    // Texto
    $wp_customize->selective_refresh->add_partial('nunoa_noticias_text', array(
      'selector'        => '#noticias-banner-text',
      'render_callback' => function() {
        return wp_kses_post( get_theme_mod('nunoa_noticias_text') );
      },
    ));
  }
}

add_action('customize_register', 'nunoa_customizer_noticias');
