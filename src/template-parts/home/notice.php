<?php
/**
 * Template Part: Carrusel de Noticias - Ñuñoa Deportes
 * Fuente: Entradas (post type 'post')
 */

$noticias = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 6,
    'post_status'    => 'publish',
]);
?>

<div class="w-full md:w-[90%]  h-min relative mx-auto rounded-3xl mt-10"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/BgVerde.png'); background-size: cover; background-repeat: no-repeat;">
    
    <div class="w-full container mx-auto flex flex-col justify-between gap-5 relative h-min  p-5 md:px-0 py-20">
        
        <!-- Encabezado -->
        <div class="flex flex-col md:flex-row justify-between w-full md:items-end items-start gap-5 md:gap-0">
            <div class="flex flex-col gap-5 md:gap-0">
                <h2 class="text-3xl md:text-4xl text-white font-gabarito font-normal">
                    Lo que pasa en 
                    <span class="font-bold">Ñuñoa Deportes</span>
                </h2>
                <p class="text-base font-roboto text-white max-w-[500px] mt-4">
                    Infórmate sobre las últimas actividades, eventos y logros deportivos de nuestra comuna. 
                    Conoce cómo vivimos el deporte en Ñuñoa.
                </p>
            </div>
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"
                class="bg-white hover:bg-green-700 text-primary hover:text-white text-base font-roboto font-semibold px-10 py-3 rounded-full transition">
                Ver más
            </a>
        </div>

        <!-- Carrusel Swiper -->
        <div class="w-full relative md:mb-20">
            <?php if ($noticias->have_posts()) : ?>
                <div class="swiper noticias-swiper mt-10">
                    <div class="swiper-wrapper">
                        <?php while ($noticias->have_posts()) : $noticias->the_post(); ?>
                            <div class="swiper-slide">
                                <div class="bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 flex flex-col md:flex-row md:max-h-[260px]">
                                    
                                    <!-- Imagen (derecha en desktop) -->
                                    <div class="order-1 md:order-2 w-full md:w-1/2 h-[260px]">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <img src="<?php the_post_thumbnail_url('large'); ?>" 
                                                alt="<?php the_title(); ?>"
                                                class="w-full h-full object-cover md:rounded-r-3xl md:rounded-l-none" />
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/DeporteImg.png" 
                                                alt="Sin imagen"
                                                class="w-full h-full object-cover md:rounded-r-3xl md:rounded-l-none" />
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Contenido (izquierda) -->
                                    <div class="order-2 md:order-1 w-full md:w-1/2 p-6 flex flex-col justify-between">
                                        <div>
                                            <h3 class="font-gabarito text-lg text-gray-900 font-semibold leading-snug mb-3">
                                                <?php the_title(); ?>
                                            </h3>
                                            <p class="font-roboto text-gray-600 text-sm line-clamp-3">
                                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                            </p>
                                        </div>
                                        <div>
                                            <a href="<?php the_permalink(); ?>"
                                                class="inline-block mt-5 bg-[#25A065] hover:bg-[#1f8051] text-white text-sm text-center font-semibold px-6 py-2 rounded-full transition w-full">
                                                Ver noticia
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php else : ?>
                <p class="text-white text-center mt-10">No hay noticias publicadas aún.</p>
            <?php endif; ?>
        </div>

        <div class="w-full flex flex-col md:flex-row justify-between items-center mt-auto">
            <div class="flex flex-col mt-10">
                <h3 class="text-white text-2xl md:text-3xl 2xl:text-5xl font-gabarito mb-4">
                    ¿Tienes dudas?<br/>
                    <strong class="font-bold">Aquí te ayudamos</strong>
                </h3>
                <p class="text-white text-base md:text-lg 2xl:text-xl font-roboto max-w-lg text-justify">
                    Revisa las preguntas más frecuentes sobre nuestras actividades y servicios deportivos. 
                    Si no encuentras lo que buscas, contáctanos y te orientaremos.
                </p>
            </div>
  
            <div class="bg-white p-10 md:w-1/2 rounded-3xl mt-5 md:mt-0">
                <div class="flex flex-col gap-4" id="faq-container">
                    <?php 
                    $preguntas = [
                        [
                            'pregunta' => '¿Cómo me inscribo en un taller deportivo?', 
                            'respuesta' => 'Puedes inscribirte directamente desde el portal de talleres ingresando con tu RUT.'
                        ],
                        [
                            'pregunta' => '¿Hay actividades gratuitas?', 
                            'respuesta' => 'Sí, muchos talleres y eventos son completamente gratuitos.'
                        ],
                        [
                            'pregunta' => '¿Dónde puedo ver los horarios?', 
                            'respuesta' => 'Los horarios se publican en cada ficha de taller disponible.'
                        ],
                        [
                            'pregunta' => '¿Qué hago si tengo problemas con mi inscripción?', 
                            'respuesta' => 'Puedes comunicarte con nosotros a través del formulario de contacto o visitarnos en la Casa del Deporte.'
                        ],
                    ];
                    
                    foreach ($preguntas as $faq) : ?>
                        <div class="bg-gray-100 rounded-full px-6 py-3 flex justify-between items-center cursor-pointer transition hover:bg-gray-200 faq-item">
                            <span class="text-gray-800 font-roboto font-medium text-sm">
                                <?php echo esc_html($faq['pregunta']); ?>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                class="w-5 h-5 text-gray-600 transform transition-transform" 
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor">
                                <path stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    stroke-width="2" 
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <div class="hidden bg-gray-50 text-gray-700 px-6 py-4 rounded-2xl mb-3 transition faq-content text-sm">
                            <?php echo esc_html($faq['respuesta']); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
      </div>
      <!-- Sección FAQ -->
</div>
