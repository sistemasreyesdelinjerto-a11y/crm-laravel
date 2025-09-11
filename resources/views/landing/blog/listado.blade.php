<section id="blog" class="py-16 bg-gradient-to-b from-gray-100 via-white to-gray-100">
  <div class="container mx-auto text-justify">
    <h2 class="text-3xl font-bold mb-12 text-[#1C6C73]">Nuestro Blog</h2>

    <div class="grid md:grid-cols-3 gap-8">
      @foreach ($blogs as $blog)
        <div class="bg-white shadow-lg p-6 rounded-2xl transition-all duration-500 overflow-hidden card">
          <!-- Título -->
          <h3 class="text-xl font-bold mb-2 text-[#4298A7]">{{ $blog->titulo }}</h3>
          
          <!-- Resumen corto -->
          <p class="text-gray-700 mb-4 summary">
            {{ Str::limit($blog->contenido, 100) }}
          </p>

          <!-- Contenido completo oculto -->
          <div class="extra-content max-h-0 text-gray-700 overflow-hidden transition-all duration-500">
            <p>
              {{ $blog->contenido }}
            </p>
          </div>

          <!-- Botón -->
          <button class="text-[#1C6C73] font-semibold hover:underline mt-3 read-more">
            Leer más →
          </button>
        </div>
      @endforeach
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
