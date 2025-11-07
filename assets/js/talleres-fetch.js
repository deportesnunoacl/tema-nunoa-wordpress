document.addEventListener("DOMContentLoaded", async () => {
  const container = document.getElementById("talleres-container");
  if (!container) return;

  try {
    const res = await fetch("https://pxm2zus9rb.execute-api.sa-east-1.amazonaws.com/production/talleres");
    const talleres = await res.json();
    const data = talleres.data.talleres || [];

    container.innerHTML = "";

    data.forEach((taller) => {
      const imagenUrl =
        taller.imagen && typeof taller.imagen === "string"
          ? taller.imagen
          : `${themeData.assetsUrl}/img/DeporteImg.png`;

      const vidrioUrl = `${themeData.assetsUrl}/img/vidrio.png`;

      const card = document.createElement("div");
      card.className =
        "swiper-slide relative w-[200px] h-[370px] md:!w-[360px] md:!h-[370px] rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300";

      card.innerHTML = `
        <!-- Imagen -->
        <img src="${imagenUrl}" alt="${taller.nombre}"
             class="absolute inset-0 w-full h-full object-cover z-0" />

        <!-- Gradiente -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent z-10"></div>

        <!-- Contenido -->
        <div 
          style="background-image: url('${vidrioUrl}'); background-size: cover; background-repeat: no-repeat;"
          class="absolute bottom-0 left-0 w-full z-20 text-white px-5 pb-6 flex flex-col gap-2 p-5">
          
          <h3 class="text-base font-gabarito font-bold leading-tight">
            ${taller.nombre} - ${taller.recinto.nombre }
          </h3>
         
          <p class="text-white font-semibold font-roboto text-sm">
            ${taller.esGratuito 
  ? "Gratuito" 
  : `Valor: ${new Intl.NumberFormat("es-CL", {
        style: "currency",
        currency: "CLP",
        minimumFractionDigits: 0
      }).format(taller.modalidadPago[0]?.valorParticular || 0)}`
}
          </p>
          <a href="https://main.d336urpyhmlyn9.amplifyapp.com/admin/talleres/editar/68f7e1e127ff7f06294db5cf" class="mt-3 bg-white hover:bg-green-700 text-black hover:text-white text-sm font-semibold px-6 py-2 rounded-full transition self-start">
           Ir a portal de inscripciones
          </a>
        </div>
      `;

      container.appendChild(card);
    });

    // 🌀 Inicializar Swiper una vez renderizadas las cards
    new Swiper(".talleres-swiper", {
      slidesPerView: 3,
      spaceBetween: 24,
      loop: true,
      
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
      breakpoints: {
        320: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
      },
    });
  } catch (error) {
    console.error("Error cargando talleres:", error);
    container.innerHTML = `<p class="text-gray-600">No se pudieron cargar los talleres en este momento.</p>`;
  }
});
