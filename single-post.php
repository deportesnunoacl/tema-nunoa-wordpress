<?php
/**
 * Template para noticias individuales (Entradas)
 */
get_header();
?>

<main class="w-full bg-white min-h-screen py-10">
  <div class="container mx-auto px-5 md:px-0 ">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <!-- Título -->
      <h1 class="text-3xl md:text-4xl font-gabarito font-semibold text-gray-900 mb-3">
        <?php the_title(); ?>
      </h1>

      <!-- Meta -->
      <p class="text-gray-500 text-sm mb-8">
        Publicado el <?php echo get_the_date(); ?> 
      </p>

      <!-- Imagen destacada -->
      <?php if (has_post_thumbnail()) : ?>
        <div class="w-full mb-10">
          <img src="<?php the_post_thumbnail_url('full'); ?>" 
               alt="<?php the_title(); ?>" 
               class="w-full h-[500px] rounded-2xl shadow-md object-cover" />
        </div>
      <?php endif; ?>

      <!-- Contenido principal -->
      <article class="prose prose-lg max-w-none font-roboto text-gray-800 leading-relaxed 
               prose-headings:font-gabarito 
               prose-a:text-primary hover:prose-a:text-green-700">
  <?php the_content(); ?>
</article>




      <!-- Botón volver -->
      <div class="mt-12">
        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"
           class="inline-block bg-primary hover:bg-green-700 text-white font-semibold text-sm px-8 py-3 rounded-full transition">
          ← Volver a noticias
        </a>
      </div>

    <?php endwhile; endif; ?>

  </div>
</main>

<?php get_footer(); ?>
