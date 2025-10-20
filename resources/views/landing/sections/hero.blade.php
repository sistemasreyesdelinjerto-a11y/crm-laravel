<section class="relative h-screen flex flex-col items-center justify-center text-beigeClaro overflow-hidden pt-20">    
    <div class="absolute w-full h-full overflow-hidden">
        
        @php
            $horizontal = $encabezados->first()?->video_horizontal;
            $vertical = $encabezados->first()?->video_vertical;

            function isVideo($file) {
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                return in_array($ext, ['mp4','webm','ogg']);
            }
        @endphp 

        @if($horizontal)
            @if(isVideo($horizontal))
                <video autoplay muted loop playsinline class="hidden md:block w-full h-full object-cover">
                    <source src="{{ asset($horizontal) }}" type="video/mp4">
                </video>
            @else
                <img src="{{ asset($horizontal) }}" alt="Banner" loading="lazy" class="hidden md:block w-full h-full object-cover">
            @endif
        @endif

        @if($vertical)
            @if(isVideo($vertical))
                <video preload="none" autoplay muted loop playsinline class="block md:hidden w-full h-full object-cover">
                    <source src="{{ asset($vertical) }}" type="video/mp4">
                </video>
            @else
                <img src="{{ asset($vertical) }}" alt="Banner" loading="lazy" class="block md:hidden w-full h-full object-cover">
            @endif
        @endif

        <div class="absolute w-full h-full bg-gradient-to-b from-black/40 via-black/20 to-black/40"></div>
    </div>


    <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-black/30 to-black/50"></div>

    <div class="relative z-30 max-w-5xl px-6 md:px-16 text-center mx-auto flex flex-col items-center gap-4">
        
        <p class="font-[Playfair Display] text-xl md:text-2xl font-medium">
            {{ $encabezados->first()->titulo ?? 'Bienvenido a Clínica Capilar' }}
        </p>

        <br>
        <h1 class="font-[Playfair Display] text-3xl md:text-5xl lg:text-6xl font-bold leading-snug">
            {{ $encabezados->first()->contenido ?? 'Recupera tu confianza y estilo con nuestros tratamientos' }}
        </h1>
        <br>

        <p class="font-[Playfair Display] text-xl md:text-2xl font-medium">
            {{ $encabezados->first()->subtitulo ?? 'Resultados naturales y permanentes' }}
        </p>

        <a href="#contacto"
            class="mt-8 bg-[#1C6C73] text-white px-8 py-3 font-semibold hover:bg-tealOscuro transition">
            AGENDA TU DIAGNÓSTICO
        </a>
        
        </div>

   <div class="relative z-30 w-full pt-16 pb-10 px-6 md:px-16">
    <div class="max-w-5xl mx-auto flex flex-col sm:flex-row justify-center sm:justify-between gap-4 sm:gap-x-12 text-white font-[Playfair Display] **text-lg** md:**text-xl**">
        
        <a href="/servicios" class="flex items-center gap-2 hover:text-teal-400 transition">
            <span class="**w-4 h-4** bg-[#1C6C73] rounded-full inline-block"></span>
            Micro Transplante Capilar
        </a>
        
        <a href="/servicios" class="flex items-center gap-2 hover:text-teal-400 transition">
            <span class="**w-4 h-4** bg-[#1C6C73] rounded-full inline-block"></span>
            Micro Transplante de barba
        </a>
        
        <a href="/servicios" class="flex items-center gap-2 hover:text-teal-400 transition">
            <span class="**w-4 h-4** bg-[#1C6C73] rounded-full inline-block"></span>
            Terapia Regenerativa Capilar
        </a>
        
    </div>
</div>
    </div>
</section>
 
<!-- Importar fuentes -->
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">


<script>
  const slides = document.querySelectorAll('.bg-slide'); // imágenes (solo si no hay video)
  const mainText = document.getElementById("mainText");
  const subText = document.getElementById("subText");

  const texts = @json($encabezados->map(function($e){
      return [
          'main' => $e->titulo,
          'sub'  => $e->subtitulo,
      ];
  }));

  let currentIndex = 0;
  const slideDuration = 8000; // Duración de cada cambio

  function showText(index) {
    mainText.classList.remove('opacity-100');
    mainText.classList.add('opacity-0');
    subText.classList.remove('opacity-100');
    subText.classList.add('opacity-0');

    setTimeout(() => {
      mainText.textContent = texts[index].main;
      subText.textContent = texts[index].sub;
      mainText.classList.remove('opacity-0');
      mainText.classList.add('opacity-100');
      subText.classList.remove('opacity-0');
      subText.classList.add('opacity-100');
    }, 500);
  }

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.toggle('opacity-100', i === index);
      slide.classList.toggle('opacity-0', i !== index);
    });
    showText(index);
  }

  // Inicia el ciclo
  /*if (slides.length > 0) {
    showSlide(currentIndex);
    setInterval(() => {
      currentIndex = (currentIndex + 1) % slides.length;
      showSlide(currentIndex);
    }, slideDuration);
  } else {
    showText(currentIndex);
    setInterval(() => {
      currentIndex = (currentIndex + 1) % texts.length;
      showText(currentIndex);
    }, slideDuration);
  }*/
</script>

<!-- Importar fuentes -->
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
