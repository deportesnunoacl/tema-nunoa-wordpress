<?php
/**
 * Custom Post Type: Slider Principal
 */

function nunoa_register_slider_cpt() {
  $labels = array(
    'name'          => __('Sliders', 'nunoa'),
    'singular_name' => __('Slide', 'nunoa'),
    'menu_name'     => __('Slider Principal', 'nunoa'),
  );

  $args = array(
    'labels'        => $labels,
    'public'        => true,
    'show_ui'       => true,
    'show_in_rest'  => true, // ✅ necesario para Gutenberg
    'menu_icon'     => 'dashicons-images-alt2',
    'supports'      => array('title', 'editor', 'thumbnail'), // ✅ habilita imagen destacada
  );

  register_post_type('slider', $args);
}
add_action('init', 'nunoa_register_slider_cpt');
