<section id="contacto" class="py-20 px-6 bg-[#ffffff]">
  <div class="max-w-3xl mx-auto">
    <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-12" style="color: #1C6C73;">Contacto</h2>

    <form class="bg-white p-10 rounded-3xl shadow-[8px_8px_20px_rgba(0,0,0,0.1),-8px_-8px_20px_rgba(255,255,255,0.7)] space-y-6">
      
      <!-- Nombre -->
      <input 
        class="w-full p-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-4 focus:ring-[#4298A7] text-gray-700 placeholder-gray-400 shadow-inner transition"
        placeholder="Nombre"
        type="text"
      />

      <!-- Correo y Teléfono -->
      <div class="grid md:grid-cols-2 gap-4">
        <input 
          class="w-full p-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-4 focus:ring-[#4298A7] text-gray-700 placeholder-gray-400 shadow-inner transition"
          placeholder="Correo" 
          type="email"
        />
        <input 
          class="w-full p-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-4 focus:ring-[#4298A7] text-gray-700 placeholder-gray-400 shadow-inner transition"
          placeholder="Teléfono" 
          type="tel"
        />
      </div>

      <!-- Mensaje -->
      <textarea 
        class="w-full p-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-4 focus:ring-[#4298A7] text-gray-700 placeholder-gray-400 shadow-inner transition"
        rows="5" 
        placeholder="Mensaje">
      </textarea>

      <!-- Botón Enviar -->
      <button 
        class="w-full bg-[#1C6C73] text-white py-4 rounded-xl font-bold text-lg hover:bg-[#4298A7] hover:scale-105 transition-transform duration-300 shadow-lg">
        Enviar
      </button>

    </form>
  </div>
</section>
