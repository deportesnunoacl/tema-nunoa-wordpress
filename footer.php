<?php
/**
 * Footer template
 * Requerido para compatibilidad con el personalizador.
 */
?>

<footer class="relative w-full bg-white py-10 overflow-hidden">
  <div 
    class="relative w-[90%] mx-auto md:h-[360px] rounded-3xl flex flex-col items-center justify-center text-white py-5 md:py-0"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/bgfooter.png'); background-size: cover; background-position: center;"
  >
    <!-- Capa de oscurecimiento -->
    <div class="absolute inset-0 bg-black/60 rounded-3xl z-0"></div>

    <!-- Contenido -->
    <div class="relative z-10 w-full flex flex-col md:flex-row justify-between items-center px-10 gap-6">
      <!-- Logo -->
      <img 
        src="<?php echo get_template_directory_uri(); ?>/assets/img/LogoWhite.png" 
        alt="Logo Ñuñoa Deportes"
        class="w-40 md:w-52"
      />
      
      <div class="flex flex-col gap-5">

      <h3 class="text-2xl md:text-3xl font-gabarito font-normal text-center md:text-left">
        Información
      </h3>
      <div class="flex gap-5 items-center">
        <img 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/LogoUbi.png" 
          alt="Logo Ubicación"
          class="w-[15px] h-[15px]"
        />
        <p class="font-roboto text-base leading-relaxed max-w-[200px]">
          Corporación Municipal de Deportes de Ñuñoa. Juan Moya 1370, Ñuñoa.
        </p>
      </div>
      <div class="flex gap-5 items-center">
        <img 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/LogoEmail.png" 
          alt="Logo Email"
          class="w-[14px] h-[12px]"
        />
        <p class="font-roboto text-base leading-relaxed max-w-[200px]">
          contacto@nunoadeportes.cl
        </p>
      </div>
      <div class="flex gap-5 items-center">
        <img 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/LogoPhone.png" 
          alt="Logo Teléfono"
          class="w-[14px] h-[14px]"
        />
        <p class="font-roboto text-base leading-relaxed max-w-[200px]">
          +56 9 44002092
        </p>
      </div>

      </div>
      <!-- Información -->
      <div class="border border-white rounded-full flex items-center cursor-pointer">
        <img 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/Beneficio1.png" 
          alt="Beneficio 1"
          class="w-16 h-16 p-3"
        />
        <p class="font-roboto text-base leading-relaxed px-4">
          Accede al beneficio <br/>
          <span class="font-bold">
Tarjeta Vecino
          </span>
        </p>
        
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
