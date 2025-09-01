<section id="calculadora" class="py-28 px-6 bg-gradient-to-r from-gray-100 via-white to-gray-100">
  <div class="max-w-6xl mx-auto text-center mb-16">
    <h2 class="text-5xl font-extrabold text-gray-800">Nuestros Resultados</h2>
    <p class="text-xl text-gray-600 mt-4">Confianza respaldada por números reales</p>
  </div>

  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-14 px-6">
    @foreach($resultados as $resultado)
      <div class="shadow-2xl rounded-3xl p-14 flex flex-col md:flex-row items-center justify-between hover:scale-105 transition-transform duration-300"
           style="background: linear-gradient(to bottom right, {{ $resultado->color }}20, #ffffff);">

        <div class="mb-6 md:mb-0">
          <h3 class="text-2xl font-bold text-gray-700">{{ $resultado->titulo }}</h3>
          <p class="text-6xl font-extrabold mt-6 counter" data-target="{{ $resultado->numero }}">0</p>
        </div>

        <div class="w-20 h-20 rounded-lg flex items-center justify-center bg-white shadow-lg">
          @if($resultado->icono_svg)
            <img src="{{ asset($resultado->icono_svg) }}" alt="Icono" class="w-12 h-12 object-contain">
          @else
            <span class="text-gray-400">Sin imagen</span>
          @endif
        </div>
      </div>
    @endforeach
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".counter");
    counters.forEach(counter => {
      counter.innerText = "0";

      const updateCounter = () => {
        const target = +counter.getAttribute("data-target");
        const current = +counter.innerText.replace(/,/g, "");
        const increment = target / 100; // velocidad

        if (current < target) {
          counter.innerText = Math.ceil(current + increment).toLocaleString();
          setTimeout(updateCounter, 15);
        } else {
          counter.innerText = target.toLocaleString();
        }
      };

      updateCounter();
    });
  });
</script>
