<section id="" class="relative h-[92vh] mt-[64px] flex items-center justify-center text-beigeClaro overflow-hidden">
  <!-- Contenedor de imágenes -->
  <div class="absolute w-full h-full overflow-hidden">
    <img src="{{ asset('images/doctor.jpeg') }}" alt="Fondo Clínica Capilar" class="absolute w-full h-full object-cover transition-opacity duration-[3000ms] ease-in-out opacity-100 bg-slide">
    <img src="{{ asset('images/doc2.webp') }}" alt="Fondo 2" class="absolute w-full h-full object-cover transition-opacity duration-[3000ms] ease-in-out opacity-0 bg-slide">
    <img src="{{ asset('images/terapias.jpg') }}" alt="Fondo 3" class="absolute w-full h-full object-cover transition-opacity duration-[3000ms] ease-in-out opacity-0 bg-slide">

    <!-- Degradado oscuro sobre la imagen -->
    <div class="absolute w-full h-full bg-gradient-to-b from-black/40 via-black/20 to-black/40"></div>
  </div>

  <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/20 to-black/40"></div>

  <div class="relative z-10 max-w-3xl mx-auto px-6 text-center">
    <span class="inline-flex items-center gap-2 text-sm tracking-wide bg-beigeCalido/90 text-verdeOscuro px-3 py-1 rounded-full animate-floaty">
      <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12.1 21.3l-1.1-1C6 16 3 13.2 3 9.8 3 7.1 5.1 5 7.8 5c1.5 0 3 .7 4 1.9C12.8 5.7 14.3 5 15.8 5 18.5 5 20.6 7.1 20.6 9.8c0 3.4-3 6.2-8 10.6l-1.1.9z"/>
      </svg>
      Conócenos
    </span>

    <!-- Texto principal que cambiará -->
    <h1 id="mainText" class="text-5xl md:text-6xl font-extrabold drop-shadow-xl transition-opacity duration-[3000ms] ease-in-out opacity-100">
      Antes los reyes del injerto
    </h1>
    <p id="subText" class="mt-4 text-lg md:text-xl text-beigeClaro/90 transition-opacity duration-[3000ms] ease-in-out opacity-100">
      Ahora Clínica Capilar Elite del Dr. Santana
    </p>

    <div class="mt-8 flex gap-4 justify-center animate-glow">
      <a href="#servicios" class="bg-beigeCalido text-verdeOscuro px-6 py-3 rounded-xl font-semibold hover:bg-verdeClaro hover:text-beigeClaro transition">
        Ver servicios
      </a>
      <a href="#contacto" class="bg-transparent border border-beigeCalido/80 text-beigeClaro px-6 py-3 rounded-xl hover:bg-beigeCalido/20 transition">
        Agenda una valoración
      </a>
    </div>
  </div>
</section>

<script>
  const slides = document.querySelectorAll('.bg-slide');
  let currentSlide = 0;

  const texts = [
    { main: "Antes los reyes del injerto", sub: "Ahora Clínica Capilar Elite del Dr. Santana" },
    { main: "Nuevo aire, nuevo nombre", sub: "Especialistas en técnicas FUE y tratamientos personalizados" },
    { main: "Resultados naturales", sub: "Tu cabello, nuestro compromiso" }
  ];
  let currentText = 0;

  // Cambiar imágenes
  setInterval(() => {
    const nextSlide = (currentSlide + 1) % slides.length;

    slides[currentSlide].classList.remove('opacity-100');
    slides[currentSlide].classList.add('opacity-0');

    slides[nextSlide].classList.remove('opacity-0');
    slides[nextSlide].classList.add('opacity-100');

    currentSlide = nextSlide;
  }, 5000);

  // Cambiar textos
  setInterval(() => {
    const mainText = document.getElementById("mainText");
    const subText = document.getElementById("subText");

    // Desvanecer
    mainText.classList.remove('opacity-100');
    mainText.classList.add('opacity-0');
    subText.classList.remove('opacity-100');
    subText.classList.add('opacity-0');

    setTimeout(() => {
      currentText = (currentText + 1) % texts.length;
      mainText.textContent = texts[currentText].main;
      subText.textContent = texts[currentText].sub;

      // Aparecer
      mainText.classList.remove('opacity-0');
      mainText.classList.add('opacity-100');
      subText.classList.remove('opacity-0');
      subText.classList.add('opacity-100');
    }, 1000); // Espera un segundo antes de mostrar el siguiente
  }, 5000); // Cambia cada 5 segundos
</script>
