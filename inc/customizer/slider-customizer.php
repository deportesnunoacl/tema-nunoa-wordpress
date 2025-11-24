<?php
/**
 * Customizer para la página home
 */

// home
function nunoa_home_slider_customizer($wp_customize) {

    $wp_customize->add_section('home_slider_section', [
        'title'    => __('Slider Principal', 'nunoa'),
        'priority' => 20,
    ]);

    for ($i = 1; $i <= 3; $i++) {

        // Imagen del slide
        $wp_customize->add_setting("home_slide_img_$i", [
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            "home_slide_img_$i",
            [
                'label'   => __("Imagen Slide $i", 'nunoa'),
                'section' => 'home_slider_section',
            ]
        ));

        // URL del slide
        $wp_customize->add_setting("home_slide_url_$i", [
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw'
        ]);

        $wp_customize->add_control(
            "home_slide_url_$i",
            [
                'label'   => __("URL Slide $i", 'nunoa'),
                'section' => 'home_slider_section',
                'type'    => 'url',
            ]
        );
    }
}
function nunoa_home_slider_customizer_refresh($wp_customize) {

    if ( isset( $wp_customize->selective_refresh ) ) {

        // Crear un wrapper para el slider
        $wp_customize->selective_refresh->add_partial(
            'home_slider_partial',
            [
                'selector'        => '#home-slider-wrapper',
                'settings'        => [
                    'home_slide_img_1',
                    'home_slide_img_2',
                    'home_slide_img_3',
                    'home_slide_url_1',
                    'home_slide_url_2',
                    'home_slide_url_3',
                ],
                'render_callback' => function () {
                    get_template_part('tema-nunoa-wordpress/src/home/slider.php'); // ubicacion de nuestro slider
                }
            ]
        );
    }
}
add_action('customize_register', 'nunoa_home_slider_customizer_refresh');

add_action('customize_register', 'nunoa_home_slider_customizer');





