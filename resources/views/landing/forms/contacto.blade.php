<section id="contacto" class="py-20 px-6 bg-[#ffffff]">
  <div class="max-w-3xl mx-auto">
    <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-12" style="color: #1C6C73;">Contacto</h2>

    <form
      action=""
      method="POST"
      class="bg-white p-10 rounded-3xl shadow-[8px_8px_20px_rgba(0,0,0,0.1),-8px_-8px_20px_rgba(255,255,255,0.7)] space-y-6"
      x-data="{ interesado: '' }"
    >
      @csrf

      <!-- Nombre y Apellido -->
      <div class="grid md:grid-cols-2 gap-4">
        <input
          name="nombre"
          class="w-full p-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-4 focus:ring-[#4298A7] text-gray-700 placeholder-gray-400 shadow-inner transition"
          placeholder="Nombre"
          type="text"
          required
        />
        <input
          name="apellido"
          class="w-full p-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-4 focus:ring-[#4298A7] text-gray-700 placeholder-gray-400 shadow-inner transition"
          placeholder="Apellido"
          type="text"
          required
        />
      </div>

      <!-- Teléfono -->
      <input
        name="telefono"
        class="w-full p-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-4 focus:ring-[#4298A7] text-gray-700 placeholder-gray-400 shadow-inner transition"
        placeholder="Teléfono"
        type="tel"
        required
      />
     <select
        class="w-full p-4 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-4 focus:ring-[#4298A7] text-gray-700 shadow-inner transition"
      >
        <option value="" disabled selected>Seleccione la clínica de interés</option>
        <option value="cdmx">Ciudad de México</option>
        <option value="queretaro">Querétaro</option>
      </select>
      <!-- Interesado -->
      <select
        name="interesado"
        x-model="interesado"
        class="w-full p-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-4 focus:ring-[#4298A7] text-gray-700 shadow-inner transition"
        required
      >
        <option value="">¿Qué te interesa?</option>
        <option value="capilar">Capilar</option>
        <option value="barba">Barba</option>
        <option value="ambos">Ambos</option>
        <option value="otro">Otro</option>
      </select>

      <!-- Campo dinámico si selecciona "otro" -->
      <div x-show="interesado === 'otro'" class="transition">
        <input
          name="otro_interes"
          class="w-full p-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-4 focus:ring-[#4298A7] text-gray-700 placeholder-gray-400 shadow-inner transition"
          placeholder="Especifica tu interés"
          type="text"
        />
      </div>

      <!-- Fecha Estimada -->
      <select
        name="fecha_estimada"
        class="w-full p-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-4 focus:ring-[#4298A7] text-gray-700 shadow-inner transition"
        required
      >
        <option value="">¿Cuándo deseas iniciar?</option>
        <option value="1 mes">1 mes</option>
        <option value="3 meses">3 meses</option>
        <option value="6 meses">6 meses</option>
        <option value="9 meses">9 meses</option>
        <option value="cotizacion">Cotización</option>
        <option value="todavia no tengo fecha">Todavía no tengo fecha</option>
      </select>

      <!-- Botón Enviar -->
      <button
        type="submit"
        class="w-full bg-[#1C6C73] text-white py-4 rounded-xl font-bold text-lg hover:bg-[#4298A7] hover:scale-105 transition-transform duration-300 shadow-lg">
        Enviar
      </button>
    </form>
  </div>
</section>
