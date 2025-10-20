    @extends('landing.layouts.landing')
    @section('title', 'Dr. Santana - Clínica Capilar Elite')

    @section('content')
        @include('landing.menu.header')

        <div class="pt-20"> <!-- Empuja todo para que no lo tape el header -->

            <!-- Contenedor de imágenes y videos -->
            <section class="relative w-full flex items-center justify-center text-center overflow-hidden"
                    style="min-height: 80vh; height: auto;">
                <div class="absolute inset-0 w-full h-full overflow-hidden">
                    @foreach ($galerias as $index => $galeria)
                        @if ($galeria->tipo == 'video')
                            <video
                                class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 ease-in-out bg-slide {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                                muted preload="auto" loop playsinline>
                                <source src="{{ asset($galeria->imagen) }}" type="video/mp4">
                                Tu navegador no soporta videos.
                            </video>
                        @else
                            <img src="{{ asset($galeria->imagen) }}" alt="Imagen {{ $index + 1 }}"
                                class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 ease-in-out bg-slide {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                        @endif
                    @endforeach

                    <!-- Degradado -->
                    <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/20 to-black/40"></div>
                </div>

                <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
                    <h1 id="mainText"
                        class="text-4xl md:text-5xl lg:text-6xl font-extrabold drop-shadow-xl transition-opacity duration-1000 ease-in-out opacity-100">
                        {{ $galerias->first()->titulo ?? '' }}
                    </h1>
                    <p id="subText"
                    class="mt-4 text-base md:text-lg lg:text-xl text-beigeClaro/90 transition-opacity duration-1000 ease-in-out opacity-100">
                        {{ $galerias->first()->descripcion ?? '' }}
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4 justify-center animate-glow">
                        <a href="#experiencia"
                        class="bg-beigeCalido text-verdeOscuro px-6 py-3 rounded-xl font-semibold hover:bg-verdeClaro hover:text-beigeClaro transition">
                            Conoce su Trayectoria
                        </a>
                        <a href="#contacto"
                        class="bg-transparent border border-beigeCalido/80 text-beigeClaro px-6 py-3 rounded-xl hover:bg-beigeCalido/20 transition">
                            Agenda una cita
                        </a>
                    </div>
                </div>
            </section>



            <script>
                const slides = document.querySelectorAll('.bg-slide');
                const texts = [
                    @foreach ($galerias as $gal)
                        {
                            main: {!! json_encode($gal->titulo) !!},
                            sub: {!! json_encode($gal->descripcion) !!},
                            type: {!! json_encode($gal->tipo) !!}
                        }
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                ];

                let currentSlide = 0;
                let slideInterval;

                function startSlideShow() {
                    if (!slides.length || !texts.length) return;
                    clearTimeout(slideInterval);

                    const currentMedia = slides[currentSlide];
                    const isVideo = texts[currentSlide].type === 'video';
                    const displayTime = isVideo ? 10000 : 5000;

                    const nextSlide = (currentSlide + 1) % slides.length;
                    const nextMedia = slides[nextSlide];

                    // Reset video
                    if (nextMedia.tagName === 'VIDEO') {
                        nextMedia.currentTime = 0;
                        nextMedia.load();
                    }

                    slideInterval = setTimeout(() => {
                        currentMedia.classList.remove('opacity-100');
                        currentMedia.classList.add('opacity-0');

                        if (currentMedia.tagName === 'VIDEO') {
                            currentMedia.pause();
                            currentMedia.currentTime = 0;
                        }

                        nextMedia.classList.remove('opacity-0');
                        nextMedia.classList.add('opacity-100');

                        if (nextMedia.tagName === 'VIDEO') {
                            nextMedia.play().catch(e => console.log('Auto-play prevented:', e));
                        }

                        currentSlide = nextSlide;
                        updateTexts();
                        startSlideShow();
                    }, displayTime);
                }

                function updateTexts() {
                    const mainText = document.getElementById('mainText');
                    const subText = document.getElementById('subText');

                    if (!mainText || !subText) return;

                    mainText.classList.remove('opacity-100');
                    mainText.classList.add('opacity-0');
                    subText.classList.remove('opacity-100');
                    subText.classList.add('opacity-0');

                    setTimeout(() => {
                        mainText.textContent = texts[currentSlide]?.main || '';
                        subText.textContent = texts[currentSlide]?.sub || '';

                        mainText.classList.remove('opacity-0');
                        mainText.classList.add('opacity-100');
                        subText.classList.remove('opacity-0');
                        subText.classList.add('opacity-100');
                    }, 500);
                }

                document.addEventListener('DOMContentLoaded', function() {
                    if (!slides.length) return;
                    const firstMedia = slides[0];
                    if (firstMedia.tagName === 'VIDEO') {
                        firstMedia.play().catch(e => console.log('Auto-play prevented:', e));
                    }
                    startSlideShow();
                });
            </script>

            <!-- Sección: Calculadora de Resultados -->

                <section id="calculadora" class="py-16 px-6 bg-white">
                <div class="max-w-6xl mx-auto text-center mb-16">
                    <h2 class="text-5xl font-extrabold text-gray-800">Resultados del Dr.Santana</h2>
                    <p class="text-xl text-gray-600 mt-4">Confianza respaldada por nuestros resultados</p>
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
                    const target = +counter.getAttribute("data-target");

                    let current = 0;
                    const duration = 2000; // Duración total del conteo en ms (2 segundos)
                    const stepTime = 15;   // Cada cuánto se actualiza el contador
                    const steps = Math.ceil(duration / stepTime);
                    const increment = target / steps;

                    const updateCounter = () => {
                    current += increment;
                    if (current < target) {
                        counter.innerText = Math.ceil(current).toLocaleString();
                        setTimeout(updateCounter, stepTime);
                    } else {
                        counter.innerText = target.toLocaleString();
                    }
                    };

                    updateCounter();
                });
                });
                </script>


            <!-- Sección: Trayectoria y logros -->
            <section id="experiencia" class="py-16 px-6 bg-gray-50">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">El Dr. Santana</h2>
                    <p class="text-verdeOscuro/80 text-justify mb-6">
                        El Dr. Alejandro Santana es el director médico de la "Clínica Capilar Élite", clínica de trasplante
                        capilar en México, graduado en la Facultad de Medicina de la Universidad de Guadalajara.
                        <br>
                        Se dedica al tratamiento de la pérdida de cabello tanto en hombres como en mujeres.
                        Ha realizado más de 1000 procedimientos a lo largo de su carrera. 
                        Como forma de retribuir a la comunidad, 
                        también ha realizado procedimientos gratuitos a víctimas de quemaduras. 
                        <br>
                        Su constante búsqueda de la perfección en sus procedimientos le ha llevado a mantenerse al día de las 
                        últimas innovaciones y tecnologías a través de diversos cursos y certificaciones.
                        <br>
                        Actualmente es miembro activo de:
                    </p>
                    <ul class="text-left text-verdeOscuro/90 list-disc list-inside space-y-2">
                        <li>Sociedad Mundial de Tricología | 2022 - Actualidad</li>
                        <li>Sociedad Internacional de Cirugía de Restauración Capilar | 2024 - Actualidad</li>
                        <li>Instituto Mundial FUE | 2022 - Actualidad</li>
                        <li>Alianza Internacional de Cirujanos de Restauración Capilar | 2022 - Actualidad</li>
                        <li>Sociedad Internacional de Tricoscopia | 2023 - Actualidad</li>
                        <li>Sociedad Ibero Latinoamericana de Trasplante de Cabello | 2024 - Actualidad</li>
                    </ul>
                    <br>
                    <p class="text-verdeOscuro/80 text-justify mb-6">
                     Ademas esta certificado en las siguentes instituciones: 
                    </p>
                    <ul class="text-left text-verdeOscuro/90 list-disc list-inside space-y-2">
                        <li>Técnica FUE de trasplante capilar por el Colegio Iberoamericano de Dermatología | Buenos Aires, Argentina | 2022.</li>
                        <li>Maestría en Tricología por el Colegio Mexicano de Tricología y Trasplante Capilar | Guadalajara, México | 2022.</li>
                        <li>Maestría en Tricología por AMIR | Ciudad de México, México | 2023.</li>
                    </ul>
                    <br>
                     <p class="text-verdeOscuro/80 text-justify mb-6">
                     Gracias a su amplia experiencia, ha podido garantizar resultados naturales y de alta densidad, 
                     así como un procedimiento indoloro y sin cicatrices significativas para sus pacientes. 
                    </p>
                </div>
            </section>

            <!-- Sección: Certificaciones -->
            <section class="py-16 px-6 bg-white">
                <div class="max-w-6xl mx-auto text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">
                        Certificaciones del Dr. Santana
                    </h2>

                    <!-- Carrusel -->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($certificaciones as $certificacion)
                                <div class="swiper-slide">
                                    <img src="{{ asset($certificacion->imagen) }}" alt="{{ $certificacion->titulo }}"
                                        class="w-full h-64 object-cover rounded-xl shadow-lg">
                                    <p class="mt-2 font-semibold text-verdeOscuro">{{ $certificacion->titulo }}</p>
                                </div>
                            @endforeach
                        </div>

                        <!-- Botones de navegación -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>

                        <!-- Paginación -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>

            <!-- Importar Swiper -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

            <script>
                const swiper = new Swiper(".mySwiper", {
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 20,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    breakpoints: {
                        768: {
                            slidesPerView: 2
                        }, // tablets
                        1024: {
                            slidesPerView: 3
                        }, // desktop
                    }
                });
            </script>




         <section id="blog" class="py-16 px-6 bg-gray-50">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Blog del Dr. Santana</h2>
                        <p class="text-verdeOscuro/80">Últimos artículos y consejos sobre salud capilar y tratamientos innovadores.</p>
                    </div>

                    @if ($blogdrs->count() > 0)
                        <div x-data="carousel()" class="relative">

                            <!-- Botones de navegación -->
                             @if ($blogdrs->count() > 2)
                                <button @click="scrollLeft"
                                    class="absolute text-white left-0 top-1/2 transform -translate-y-1/2 -translate-x-4 z-10 bg-[#1c6c73] rounded-full p-3 shadow-md hover:bg-[#4298a7] transition">
                                    &larr;
                                </button>
                                <button @click="scrollRight"
                                    class="absolute text-white right-0 top-1/2 transform -translate-y-1/2 translate-x-4 z-10 bg-[#1c6c73] rounded-full p-3 shadow-md hover:bg-[#4298a7] transition">
                                    &rarr;
                                </button>
                            @endif


                            <!-- Carrusel -->
                                <div x-ref="container" class="flex gap-6 overflow-x-hidden cursor-grab active:cursor-grabbing select-none"
                                @mousedown="startDrag($event)" @mouseup="endDrag" @mouseleave="endDrag" @mousemove="drag($event)"
                                @touchstart="startTouch($event)" @touchmove="dragTouch($event)">
                                @foreach ($blogdrs as $post)
                                     <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3">
                                        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition h-full flex flex-col">
                                            <!-- Imagen -->
                                            @if ($post->imagen)
                                                <img src="{{ asset($post->imagen) }}" alt="{{ $post->titulo }}" class="w-full h-48 object-cover">
                                            @else
                                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                                    <span class="text-4xl">📝</span>
                                                </div>
                                            @endif

                                            <!-- Contenido -->
                                            <div class="p-6 flex-1 flex flex-col">
                                                <h3 class="text-xl font-bold text-verdeOscuro mb-3">{{ $post->titulo }}</h3>
                                                <p class="text-sm text-verdeOscuro/60 mb-3">📅 {{ $post->fecha }}</p>
                                                <p class="text-verdeOscuro/80 flex-1 line-clamp-4 whitespace-pre-line">{!! nl2br(e($post->contenido)) !!}</p>
                                                @if ($post->link)
                                                <p class="mt-2">
                                                    🔗 <a href="{{ $post->link }}" target="_blank" class="text-[#1C6C73] hover:underline">
                                                        Ver enlace
                                                    </a>
                                                </p>
                                                 @endif

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="text-6xl mb-4">📝</div>
                            <h3 class="text-xl font-semibold text-verdeOscuro mb-2">Próximamente</h3>
                            <p class="text-verdeOscuro/60">Estamos preparando contenido especial para ti.</p>
                        </div>
                    @endif
                </div>
            </section>

            <script>
            function carousel() {
                return {
                    isDown: false,
                    startX: 0,
                    scrollLeftStart: 0,
                    scrollLeft() { this.$refs.container.scrollBy({ left: -350, behavior: 'smooth' }); },
                    scrollRight() { this.$refs.container.scrollBy({ left: 350, behavior: 'smooth' }); },
                    startDrag(e) {
                        this.isDown = true;
                        this.startX = e.pageX - this.$refs.container.offsetLeft;
                        this.scrollLeftStart = this.$refs.container.scrollLeft;
                    },
                    endDrag() { this.isDown = false; },
                    drag(e) {
                        if (!this.isDown) return;
                        e.preventDefault();
                        const x = e.pageX - this.$refs.container.offsetLeft;
                        this.$refs.container.scrollLeft = this.scrollLeftStart - (x - this.startX) * 2;
                    },
                    startTouch(e) {
                        this.startX = e.touches[0].pageX;
                        this.scrollLeftStart = this.$refs.container.scrollLeft;
                    },
                    dragTouch(e) {
                        const x = e.touches[0].pageX;
                        this.$refs.container.scrollLeft = this.scrollLeftStart - (x - this.startX) * 2;
                    }
                }
            }
            </script>

            <style>
                .scrollbar-hide::-webkit-scrollbar { display: none; }
                .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
                .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
            </style>




        </div>
        @include('landing.forms.contacto')

        @include('landing.sections.footer')
    @endsection
