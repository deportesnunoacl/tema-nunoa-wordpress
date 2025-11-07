<?php

class Tailwind_Alpine_Navwalker extends Walker_Nav_Menu {

  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    $classes = empty($item->classes) ? [] : (array) $item->classes;
    $has_children = in_array('menu-item-has-children', $classes);

    $li_classes = 'relative';
    if ($has_children && $depth === 0) {
      $li_classes .= ' group';
    }

    $output .= '<li class="' . esc_attr($li_classes) . '"';
    $output .= $has_children && $depth === 0 ? ' x-data="{ open: false }"' : '';
    $output .= '>';

    // Parent with dropdown
    if ($has_children && $depth === 0) {
      $output .= '<button @click="open = !open"
        class="flex items-center gap-1 px-4 py-2 text-green-600 hover:text-green-700 font-medium transition-colors">';
      $output .= esc_html($item->title);
      $output .= '<svg class="w-3 h-3 text-green-600 group-hover:text-green-700 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
              d="M5.23 7.21a.75.75 0 011.06.02L10 11.086l3.71-3.856a.75.75 0 111.08 1.04l-4.25 4.417a.75.75 0 01-1.08 0l-4.25-4.417a.75.75 0 01.02-1.06z"
              clip-rule="evenodd" />
      </svg></button>';

      // Dropdown inside <li>, bound to same Alpine instance
      $output .= '<ul x-show="open" x-transition @click.outside="open = false" x-cloak
        class="absolute z-50 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg">';
    }

    // Submenu items (depth > 0)
    elseif ($depth > 0) {
      $output .= sprintf(
        '<a href="%s" class="block px-4 py-2 text-green-600 hover:bg-green-50 hover:text-green-700 transition-colors">%s</a>',
        esc_url($item->url),
        esc_html($item->title)
      );
    }

    // Normal top-level items
    else {
      $output .= sprintf(
        '<a href="%s" class="px-4 py-2 text-green-600 hover:text-green-700 font-medium transition-colors">%s</a>',
        esc_url($item->url),
        esc_html($item->title)
      );
    }
  }

  public function end_el( &$output, $item, $depth = 0, $args = null ) {
    $has_children = in_array('menu-item-has-children', (array) $item->classes);
    
    if ($has_children && $depth === 0) {
      $output .= '</ul>'; // close dropdown
    }

    $output .= '</li>';
  }

  // We only use start_lvl/end_lvl for true submenus (depth > 0)
  public function start_lvl( &$output, $depth = 0, $args = null ) {
    if ($depth > 0) {
      $output .= '<ul class="ml-4">';
    }
  }

  public function end_lvl( &$output, $depth = 0, $args = null ) {
    if ($depth > 0) {
      $output .= '</ul>';
    }
  }
}
