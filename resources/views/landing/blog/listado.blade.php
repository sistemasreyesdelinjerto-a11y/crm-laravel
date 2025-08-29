<section id="blog" class="py-16 bg-gradient-to-b from-gray-100 via-white to-gray-100">
  <div class="container mx-auto text-center">
    <h2 class="text-3xl font-bold mb-12 text-[#1C6C73]">Nuestro Blog</h2>
    <div class="grid md:grid-cols-3 gap-8">

      <!-- Artículo 1 -->
      <div class="bg-white shadow-lg p-6 rounded-2xl transition-all duration-500 overflow-hidden card">
        <h3 class="text-xl font-bold mb-2 text-[#4298A7]">Cómo elegir el mejor tratamiento capilar</h3>
        <p class="text-gray-700 mb-4 summary">
          Elegir un tratamiento capilar adecuado puede marcar la diferencia en los resultados de tu cabello.
        </p>
        <div class="extra-content max-h-0 text-gray-700 overflow-hidden transition-all duration-500">
          <p>
            Es importante considerar factores como tu tipo de cabello, edad, historial médico y objetivos estéticos. Existen tratamientos como PRP, microtrasplante y terapias con láser que ofrecen resultados distintos según cada caso. Consulta siempre con un especialista para definir cuál es la mejor opción para ti.
          </p>
        </div>
        <button class="text-[#1C6C73] font-semibold hover:underline mt-3 read-more">Leer más →</button>
      </div>

      <!-- Artículo 2 -->
      <div class="bg-white shadow-lg p-6 rounded-2xl transition-all duration-500 overflow-hidden card">
        <h3 class="text-xl font-bold mb-2 text-[#4298A7]">Cuidado post-trasplante capilar</h3>
        <p class="text-gray-700 mb-4 summary">
          Después de un trasplante, los cuidados que sigas determinan la calidad de los resultados.
        </p>
        <div class="extra-content max-h-0 text-gray-700 overflow-hidden transition-all duration-500">
          <p>
            Durante las primeras semanas, evita tocar las zonas trasplantadas y protege tu cuero cabelludo del sol. Lava tu cabello con productos recomendados por tu especialista y sigue las indicaciones sobre medicamentos y suplementos. Mantener una rutina adecuada de limpieza e hidratación favorecerá la regeneración de los folículos y un crecimiento sano del cabello.
          </p>
        </div>
        <button class="text-[#1C6C73] font-semibold hover:underline mt-3 read-more">Leer más →</button>
      </div>

      <!-- Artículo 3 -->
      <div class="bg-white shadow-lg p-6 rounded-2xl transition-all duration-500 overflow-hidden card">
        <h3 class="text-xl font-bold mb-2 text-[#4298A7]">Tendencias en tratamientos capilares 2025</h3>
        <p class="text-gray-700 mb-4 summary">
          Descubre las innovaciones y técnicas que están revolucionando el cuidado capilar este año.
        </p>
        <div class="extra-content max-h-0 text-gray-700 overflow-hidden transition-all duration-500">
          <p>
            En 2025, los tratamientos con células madre, terapias regenerativas y microinjertos avanzados están ganando popularidad. También se observa un aumento en el uso de tecnologías láser y de estimulación del cuero cabelludo para fortalecer los folículos existentes. Mantente informado y consulta siempre con especialistas certificados antes de elegir un procedimiento.
          </p>
        </div>
        <button class="text-[#1C6C73] font-semibold hover:underline mt-3 read-more">Leer más →</button>
      </div>

    </div>
  </div>
</section>

<script>
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
</script>
