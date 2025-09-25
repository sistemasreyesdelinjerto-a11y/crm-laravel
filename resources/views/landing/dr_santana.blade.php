    @extends('landing.layouts.landing')
    @section('title', 'Dr. Santana - Clínica Capilar Elite')

    @section('content')
        @include('landing.menu.header')

        <div class="pt-20"> <!-- Empuja todo para que no lo tape el header -->

         <!-- Contenedor de imágenes y videos -->
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



            <!-- Sección: Trayectoria y logros -->
            <section id="experiencia" class="py-16 px-6 bg-gray-50">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Trayectoria del Dr. Santana</h2>
                    <p class="text-verdeOscuro/80 mb-6">
                        Más de 8 años de experiencia en injerto capilar, reconocido internacionalmente por sus técnicas
                        avanzadas de injerto.
                        <br>
                        El Dr. Alejandro Santana es el director médico de la clínica capilar elite, clínica de trasplante
                        capilar en México.
                        <br>
                        Nació en Guadalajara y se graduó en la Facultad de Medicina de la Universidad de Guadalajara.
                    </p>
                    <ul class="text-left text-verdeOscuro/90 list-disc list-inside space-y-2">
                        <li>Certificaciones nacionales e internacionales en injerto capilar.</li>
                        <li>Participación en congresos y conferencias médicas.</li>
                        <li>+1500 pacientes satisfechos.</li>
                        <li>Investigaciones y publicaciones sobre trasplante capilar.</li>
                    </ul>
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




            <!-- Blog del Dr. Santana - Carrusel -->
            <section id="blog" class="py-16 px-6 bg-gray-50">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Blog del Dr. Santana</h2>
                        <p class="text-verdeOscuro/80">Últimos artículos y consejos sobre salud capilar y tratamientos
                            innovadores.</p>
                    </div>

                    @if ($blogdrs->count() > 0)
                        <!-- Contenedor del carrusel -->
                        <div class="relative">
                            <!-- Botones de navegación -->
                            @if ($blogdrs->count() > 3)
                                <button id="prevBlog"
                                    class="absolute text-white left-0 top-1/2 transform -translate-y-1/2 -translate-x-4 z-10 bg-[#1c6c73] rounded-full p-3 shadow-md hover:bg-[#4298a7] transition">
                                    &larr;
                                </button>
                                <button id="nextBlog"
                                    class="absolute text-white right-0 top-1/2 transform -translate-y-1/2 translate-x-4 z-10 bg-[#1c6c73] rounded-full p-3 shadow-md hover:bg-[#4298a7] transition">
                                    &rarr;
                                </button>
                            @endif

                            <!-- Carrusel -->
                            <!-- Carrusel -->
                            <div class="overflow-x-auto -mx-3">
                                <div id="blogCarousel" class="flex gap-6 px-3">
                                    @foreach ($blogdrs as $post)
                                        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3">
                                            <div
                                                class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition h-full flex flex-col">
                                                <!-- Imagen -->
                                                @if ($post->imagen)
                                                    <img src="{{ asset($post->imagen) }}" alt="{{ $post->titulo }}"
                                                        class="w-full h-48 object-cover">
                                                @else
                                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                                        <span class="text-4xl">📝</span>
                                                    </div>
                                                @endif

                                                <!-- Contenido -->
                                                <div class="p-6 flex-1 flex flex-col">
                                                    <h3 class="text-xl font-bold text-verdeOscuro mb-3">{{ $post->titulo }}
                                                    </h3>
                                                    <p class="text-sm text-verdeOscuro/60 mb-3">📅 {{ $post->fecha }}</p>
                                                    <p class="text-verdeOscuro/80 flex-1">{!! nl2br(e($post->contenido)) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Indicadores de paginación -->
                            @if ($blogdrs->count() > 3)
                                <div class="flex justify-center mt-6 space-x-2" id="blogIndicators">
                                    @for ($i = 0; $i < ceil($blogdrs->count() / 3); $i++)
                                        <button
                                            class="w-3 h-3 rounded-full bg-gray-300 hover:bg-verdeOscuro transition indicator"
                                            data-index="{{ $i }}"></button>
                                    @endfor
                                </div>
                            @endif
                        </div>
                    @else
                        <!-- Mensaje si no hay artículos -->
                        <div class="text-center py-12">
                            <div class="text-6xl mb-4">📝</div>
                            <h3 class="text-xl font-semibold text-verdeOscuro mb-2">Próximamente</h3>
                            <p class="text-verdeOscuro/60">Estamos preparando contenido especial para ti.</p>
                        </div>
                    @endif
                </div>
            </section>

            <!-- JavaScript para el carrusel -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const carousel = document.getElementById('blogCarousel');
                    const prevBtn = document.getElementById('prevBlog');
                    const nextBtn = document.getElementById('nextBlog');
                    const indicators = document.querySelectorAll('.indicator');

                    if (!carousel) return;

                    let currentIndex = 0;
                    const itemsCount = {{ $blogdrs->count() }};
                    const visibleItems = window.innerWidth < 768 ? 1 : window.innerWidth < 1024 ? 2 : 3;
                    const totalSlides = Math.ceil(itemsCount / visibleItems);

                    // Función para actualizar el carrusel
                    function updateCarousel() {
                        const itemWidth = carousel.children[0].offsetWidth + 24; // width + gap
                        const translateX = -currentIndex * itemWidth * visibleItems;
                        carousel.style.transform = `translateX(${translateX}px)`;

                        // Actualizar indicadores
                        indicators.forEach((indicator, index) => {
                            if (index === currentIndex) {
                                indicator.classList.add('bg-verdeOscuro');
                                indicator.classList.remove('bg-gray-300');
                            } else {
                                indicator.classList.remove('bg-verdeOscuro');
                                indicator.classList.add('bg-gray-300');
                            }
                        });
                    }

                    // Event listeners para botones de navegación
                    if (prevBtn) {
                        prevBtn.addEventListener('click', () => {
                            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                            updateCarousel();
                        });
                    }

                    if (nextBtn) {
                        nextBtn.addEventListener('click', () => {
                            currentIndex = (currentIndex + 1) % totalSlides;
                            updateCarousel();
                        });
                    }

                    // Event listeners para indicadores
                    indicators.forEach((indicator, index) => {
                        indicator.addEventListener('click', () => {
                            currentIndex = index;
                            updateCarousel();
                        });
                    });

                    // Responsive: recalcular en resize
                    let resizeTimer;
                    window.addEventListener('resize', () => {
                        clearTimeout(resizeTimer);
                        resizeTimer = setTimeout(() => {
                            const newVisibleItems = window.innerWidth < 768 ? 1 : window.innerWidth < 1024 ?
                                2 : 3;
                            if (visibleItems !== newVisibleItems) {
                                visibleItems = newVisibleItems;
                                currentIndex = 0;
                                updateCarousel();
                            }
                        }, 250);
                    });

                    // Inicializar
                    updateCarousel();
                });
            </script>

            <style>
                .line-clamp-3 {
                    display: -webkit-box;
                    -webkit-line-clamp: 3;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                }

                .whitespace-pre-line {
                    white-space: pre-line;
                }

                .modal {
                    display: none;
                }

                .modal:not(.hidden) {
                    display: flex;
                }

                /* Smooth transitions */
                #blogCarousel {
                    transition: transform 0.3s ease-in-out;
                }
            </style>
            </section>





        </div>
        @include('landing.forms.contacto')

        @include('landing.sections.footer')
    @endsection
