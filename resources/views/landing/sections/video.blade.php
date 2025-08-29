<section id="inicio" class="relative h-screen flex items-center justify-center">
  <!-- Imagen de fondo -->
  <div class="absolute w-full h-full">
    <img src="{{ asset('images/doctor.jpeg') }}" alt="Fondo Clínica Capilar" class="w-full h-full object-cover">
    <!-- Degradado oscuro sobre la imagen -->
    <div class="absolute w-full h-full bg-gradient-to-b from-black/40 via-black/20 to-black/40"></div>
  </div>

  <div class="absolute w-full h-full flex flex-col items-center justify-center text-center text-white px-6">
    <h1 class="text-5xl md:text-6xl font-bold mb-6" data-aos="fade-down">Recupera tu Confianza</h1>
    <p class="text-lg md:text-2xl mb-8" data-aos="fade-up" data-aos-delay="200">Resultados naturales con técnicas avanzadas de injerto capilar.</p>
    <a href="#contacto" class="text-verdeOscuro py-3 px-8 rounded-full shadow-lg transform transition-transform hover:scale-105" data-aos="zoom-in" data-aos-delay="400">Agenda tu Consulta</a>
  </div>
</section>
