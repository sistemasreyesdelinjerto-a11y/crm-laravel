<section id="servicios" class="py-20 px-6 bg-white">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-4xl md:text-5xl font-extrabold text-verdeOscuro text-center mb-14">
      Servicios
    </h2>
<section id="servicios" class="py-16 px-6 bg-white">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro text-center mb-10">Servicios</h2>

    @if ($servicios->isEmpty())
      <p class="text-center text-gray-600 w-full">No hay servicios disponibles.</p>
    @else
      <!-- Carrusel -->
      <div class="swiper serviciosSwiper">
        <div class="swiper-wrapper">
          @foreach($servicios as $servicio)
            <div class="swiper-slide">
              <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 h-[550px] flex flex-col">

                <!-- Imagen -->
                @if($servicio->imagen)
                  <img src="{{ asset($servicio->imagen) }}"
                       alt="{{ $servicio->titulo }}"
                       class="w-full h-72 object-cover">
                @else
                  <div class="w-full h-72 bg-gray-200 flex items-center justify-center text-gray-400 text-lg">
                    Sin imagen
                  </div>
                @endif

                <!-- Contenido -->
                <div class="p-8 flex flex-col flex-grow">
                  <h3 class="text-2xl font-bold text-verdeOscuro mb-3">
                    {{ $servicio->titulo }}
                  </h3>
                  <p class="text-gray-700 text-lg mb-4 flex-grow">
                    {{ $servicio->descripcion }}
                  </p>
                  <p class="text-gray-500 text-base italic">
                    {{ $servicio->detalle }}
                  </p>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <!-- Controles -->
        <div class="flex justify-center mt-8 space-x-6">
          <div class="swiper-button-prev !static !text-verdeOscuro scale-125"></div>
          <div class="swiper-pagination !static"></div>
          <div class="swiper-button-next !static !text-verdeOscuro scale-125"></div>
        </div>
      </div>
    @endif
  </div>
</section>

<!-- SwiperJS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    new Swiper(".serviciosSwiper", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        768: { slidesPerView: 2 },
        1280: { slidesPerView: 3 }
      }
    });
  });
</script>