<?php
// ===============================
// CUSTOM POST TYPE: Recintos Deportivos
// ===============================
function crear_cpt_recintos() {
  $labels = array(
    'name' => 'Recintos Deportivos',
    'singular_name' => 'Recinto Deportivo',
    'menu_name' => 'Recintos Deportivos',
    'name_admin_bar' => 'Recinto Deportivo',
    'add_new' => 'Agregar nuevo',
    'add_new_item' => 'Agregar nuevo recinto',
    'new_item' => 'Nuevo recinto',
    'edit_item' => 'Editar recinto',
    'view_item' => 'Ver recinto',
    'all_items' => 'Todos los recintos',
    'search_items' => 'Buscar recintos',
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => false,
    'menu_icon' => 'dashicons-location-alt',
    'rewrite' => array('slug' => 'recintos'),
    'supports' => array('title', 'thumbnail', 'editor'),
    'show_in_rest' => true, // importante para usar el editor de bloques o ACF
  );

  register_post_type('recintos', $args);
}
add_action('init', 'crear_cpt_recintos');
