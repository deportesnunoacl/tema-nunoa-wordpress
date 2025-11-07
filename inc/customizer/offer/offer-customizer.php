<?php

/// ==========================================================
// 🎨 SECCIÓN HERO ÑUÑOA DEPORTES - PERSONALIZADOR (sin imagen)
// ==========================================================
function nunoa_customizer_hero($wp_customize) {

  // --- Sección principal ---
  $wp_customize->add_section('nunoa_hero_section', [
    'title'       => __('Sección Hero Deportes', 'nunoa'),
    'priority'    => 30,
    'description' => __('Edita los textos principales del bloque superior (Hero).', 'nunoa'),
  ]);

  // --- Campo: Título ---
  $wp_customize->add_setting('nunoa_hero_title', [
    'default'           => 'Muévete con lo que<br><span class="font-bold">más te gusta</span>',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
  ]);

  $wp_customize->add_control('nunoa_hero_title', [
    'label'   => __('Título principal', 'nunoa'),
    'section' => 'nunoa_hero_section',
    'type'    => 'textarea',
  ]);

  // --- Campo: Texto ---
  $wp_customize->add_setting('nunoa_hero_text', [
    'default'           => 'Busca fácilmente entre todos nuestros talleres y espacios deportivos. Ingresa el nombre de la disciplina que te interesa y descubre dónde practicarla en Ñuñoa.',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
  ]);

  $wp_customize->add_control('nunoa_hero_text', [
    'label'   => __('Texto descriptivo', 'nunoa'),
    'section' => 'nunoa_hero_section',
    'type'    => 'textarea',
  ]);

  // --- Selective Refresh (para los lápices) ---
  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial('nunoa_hero_title', [
      'selector'        => '#hero-title',
      'settings'        => ['nunoa_hero_title'],
      'render_callback' => function() {
        return wp_kses_post( get_theme_mod('nunoa_hero_title') );
      },
    ]);

    $wp_customize->selective_refresh->add_partial('nunoa_hero_text', [
      'selector'        => '#hero-text',
      'settings'        => ['nunoa_hero_text'],
      'render_callback' => function() {
        return esc_html( get_theme_mod('nunoa_hero_text') );
      },
    ]);
  }
}
add_action('customize_register', 'nunoa_customizer_hero', 20);

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
