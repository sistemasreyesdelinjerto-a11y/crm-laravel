<!-- Blog Section -->
<section id="blog" class="py-20 bg-gradient-to-b from-gray-100 via-white to-gray-100">
  <div class="container mx-auto px-4 text-justify">
    <h2 class="text-4xl font-extrabold mb-14 text-center text-[#1C6C73]">
Preguntas Frecuentes    </h2>

    <!-- Carrusel -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        @foreach ($blogs as $blog)
          <div class="swiper-slide">
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden transform transition duration-500 hover:scale-105 card">

              <!-- Imagen -->


              <div class="p-6 flex flex-col h-full">
                <!-- Título -->
                <h3 class="text-2xl font-semibold mb-3 text-[#4298A7]">
                  {{ $blog->titulo }}
                </h3>

                <!-- Resumen -->
                

                <!-- Contenido completo -->
                <div class="extra-content max-h-0 text-gray-700 overflow-hidden transition-[max-height] duration-700 ease-in-out">
                  <p>
                    {{ $blog->contenido }}
                  </p>
                </div>

                <!-- Botón -->
                <button class="mt-auto bg-[#1C6C73] text-white font-semibold px-4 py-2 rounded-lg hover:bg-[#145559] transition-all duration-300 read-more">
                  Leer más →
                </button>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Controles -->
      <div class="flex justify-center mt-6 space-x-4">
        <div class="swiper-button-prev !static !text-[#1C6C73]"></div>
        <div class="swiper-pagination !static"></div>
        <div class="swiper-button-next !static !text-[#1C6C73]"></div>
      </div>
    </div>
  </div>
</section>

<!-- SwiperJS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  // Expansión de texto
  document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.read-more').forEach(button => {
      button.addEventListener('click', () => {
        const card = button.closest('.card');
        const extra = card.querySelector('.extra-content');

        if(extra.style.maxHeight && extra.style.maxHeight !== '0px'){
          extra.style.maxHeight = '0';
          button.textContent = "Leer más →";
        } else {
          extra.style.maxHeight = extra.scrollHeight + "px";
          button.textContent = "Leer menos ↑";
        }
      });
    });

    // Swiper config
    new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
          },  
      autoplay: {
        delay: 3000, // 5 segundos entre cada slide
        disableOnInteraction: false, // sigue avanzando aunque el usuario interactúe
      },

      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 }
      }
    });
  });
</script>