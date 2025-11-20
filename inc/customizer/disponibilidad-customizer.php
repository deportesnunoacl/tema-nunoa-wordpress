<?php
/**
 * Customizer para la sección de Disponibilidad de la Home
 */

/**
 * Agregar sección de Disponibilidad al Customizer con Selective Refresh
 */
function customizer_disponibilidad_settings($wp_customize) {
  
  // Crear Panel para Secciones de la Home
  $wp_customize->add_panel('home_sections_panel', array(
    'title' => __('Secciones de la Home', 'nunoa-deportes'),
    'description' => __('Configuración de las secciones de la página principal', 'nunoa-deportes'),
    'priority' => 30,
  ));
  
  // Sección de Disponibilidad
  $wp_customize->add_section('disponibilidad_section', array(
    'title' => __('Disponibilidad de Inscripciones', 'nunoa-deportes'),
    'description' => __('Personaliza el banner de disponibilidad de inscripciones', 'nunoa-deportes'),
    'panel' => 'home_sections_panel',
    'priority' => 10,
  ));
  
  // Setting: Mostrar/Ocultar sección
  $wp_customize->add_setting('disponibilidad_mostrar', array(
    'default' => true,
    'sanitize_callback' => 'wp_validate_boolean',
    'transport' => 'refresh', // Checkbox necesita refresh completo
  ));
  
  $wp_customize->add_control('disponibilidad_mostrar', array(
    'label' => __('Mostrar sección', 'nunoa-deportes'),
    'description' => __('Activar o desactivar esta sección en la página principal', 'nunoa-deportes'),
    'section' => 'disponibilidad_section',
    'type' => 'checkbox',
    'priority' => 1,
  ));
  
  // Setting: Título principal con postMessage
  $wp_customize->add_setting('disponibilidad_titulo', array(
    'default' => 'INSCRIPCIONES DICIEMBRE',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage', // 🔥 CAMBIO CLAVE
  ));
  
  $wp_customize->add_control('disponibilidad_titulo', array(
    'label' => __('Título Principal', 'nunoa-deportes'),
    'description' => __('Ejemplo: INSCRIPCIONES DICIEMBRE', 'nunoa-deportes'),
    'section' => 'disponibilidad_section',
    'type' => 'text',
    'priority' => 10,
  ));
  
  // Setting: Descripción con postMessage
  $wp_customize->add_setting('disponibilidad_descripcion', array(
    'default' => 'Todos los recintos y programas deportivos de la Corporación Municipal de Deportes de Ñuñoa',
    'sanitize_callback' => 'sanitize_textarea_field',
    'transport' => 'postMessage', // 🔥 CAMBIO CLAVE
  ));
  
  $wp_customize->add_control('disponibilidad_descripcion', array(
    'label' => __('Descripción', 'nunoa-deportes'),
    'description' => __('Texto descriptivo debajo del título', 'nunoa-deportes'),
    'section' => 'disponibilidad_section',
    'type' => 'textarea',
    'priority' => 20,
  ));
  
  // Setting: Fechas con postMessage
  $wp_customize->add_setting('disponibilidad_fechas', array(
    'default' => 'Desde el 15 al 23 de diciembre.',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage', // 🔥 CAMBIO CLAVE
  ));
  
  $wp_customize->add_control('disponibilidad_fechas', array(
    'label' => __('Fechas', 'nunoa-deportes'),
    'description' => __('Período de inscripciones disponibles', 'nunoa-deportes'),
    'section' => 'disponibilidad_section',
    'type' => 'text',
    'priority' => 30,
  ));
  
  // 🔥 AGREGAR SELECTIVE REFRESH para mostrar los lápices azules
  if (isset($wp_customize->selective_refresh)) {
    
    // Selective Refresh para el título
    $wp_customize->selective_refresh->add_partial('disponibilidad_titulo', array(
      'selector' => '.disponibilidad-titulo',
      'container_inclusive' => false,
      'render_callback' => function() {
        return get_theme_mod('disponibilidad_titulo', 'INSCRIPCIONES DICIEMBRE');
      },
    ));
    
    // Selective Refresh para la descripción
    $wp_customize->selective_refresh->add_partial('disponibilidad_descripcion', array(
      'selector' => '.disponibilidad-descripcion',
      'container_inclusive' => false,
      'render_callback' => function() {
        return get_theme_mod('disponibilidad_descripcion', 'Todos los recintos y programas deportivos de la Corporación Municipal de Deportes de Ñuñoa');
      },
    ));
    
    // Selective Refresh para las fechas
    $wp_customize->selective_refresh->add_partial('disponibilidad_fechas', array(
      'selector' => '.disponibilidad-fechas',
      'container_inclusive' => false,
      'render_callback' => function() {
        return get_theme_mod('disponibilidad_fechas', 'Desde el 15 al 23 de diciembre.');
      },
    ));
  }
  
}
add_action('customize_register', 'customizer_disponibilidad_settings');
