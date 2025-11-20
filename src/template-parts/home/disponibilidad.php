<?php
/**
 * Template Part: Sección de Disponibilidad de Inscripciones
 * Editable desde Apariencia > Personalizar
 */

// Obtener valores del customizer con valores por defecto
$disponibilidad_titulo = get_theme_mod('disponibilidad_titulo', 'INSCRIPCIONES DICIEMBRE');
$disponibilidad_descripcion = get_theme_mod('disponibilidad_descripcion', 'Todos los recintos y programas deportivos de la Corporación Municipal de Deportes de Ñuñoa');
$disponibilidad_fechas = get_theme_mod('disponibilidad_fechas', 'Desde el 15 al 23 de diciembre.');
$disponibilidad_mostrar = get_theme_mod('disponibilidad_mostrar', true);

// Solo mostrar si está habilitado
if (!$disponibilidad_mostrar) {
  return;
}
?>

<div class="w-full bg-blueColor py-8">
  <div class="max-w-7xl mx-auto px-4 flex flex-col gap-10 items-center justify-center">
    
    <?php if ($disponibilidad_titulo) : ?>
      <h2 class="disponibilidad-titulo text-white text-4xl font-bold mb-4 font-gabarito">
        <?php echo esc_html($disponibilidad_titulo); ?>
      </h2>
    <?php endif; ?>
    
    <?php if ($disponibilidad_descripcion) : ?>
      <p class="disponibilidad-descripcion text-white text-center mb-2 font-roboto text-lg">
        <?php echo esc_html($disponibilidad_descripcion); ?>
      </p>
    <?php endif; ?>
    
    <?php if ($disponibilidad_fechas) : ?>
      <h3 class="disponibilidad-fechas text-white text-center font-roboto font-bold text-3xl">
        <?php echo esc_html($disponibilidad_fechas); ?>
      </h3>
    <?php endif; ?>
    
  </div>
</div>
