<section id="calculadora" class="py-28 px-6 bg-gradient-to-r from-gray-100 via-white to-gray-100">
  <div class="max-w-6xl mx-auto text-center mb-16">
    <h2 class="text-5xl font-extrabold text-gray-800">Nuestros Resultados</h2>
    <p class="text-xl text-gray-600 mt-4">Confianza respaldada por números reales</p>
  </div>

  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-14 px-6">
        
    <!-- Card Pacientes -->
    <div class="bg-gradient-to-br from-indigo-50 to-white shadow-2xl rounded-3xl p-14 flex items-center justify-between hover:scale-105 transition-transform duration-300">
      <div>
        <h3 class="text-2xl font-bold text-gray-700">Pacientes</h3>
        <p class="text-6xl font-extrabold text-indigo-600 mt-6 counter" data-target="120">0</p>
      </div>
      <div class="w-24 h-24 bg-indigo-100 rounded-2xl flex items-center justify-center">
        <!-- Icono de usuario -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A11.955 11.955 0 0112 15c2.5 0 4.847.776 6.879 2.09M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
      </div>
    </div>

    <!-- Card Folículos -->
    <div class="bg-gradient-to-br from-green-50 to-white shadow-2xl rounded-3xl p-14 flex items-center justify-between hover:scale-105 transition-transform duration-300">
      <div>
        <h3 class="text-2xl font-bold text-gray-700">Folículos Trasplantados</h3>
        <p class="text-6xl font-extrabold text-green-600 mt-6 counter" data-target="25400">0</p>
      </div>
      <div class="w-24 h-24 bg-green-100 rounded-2xl flex items-center justify-center">
        <!-- Icono representativo (cabello) -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-green-600" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12 2C10.067 2 8.5 4.239 8.5 7c0 2.761 1.567 5 3.5 5s3.5-2.239 3.5-5c0-2.761-1.567-5-3.5-5zM5 22c0-4.418 3.582-8 8-8s8 3.582 8 8H5z"/>
        </svg>
      </div>
    </div>

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
