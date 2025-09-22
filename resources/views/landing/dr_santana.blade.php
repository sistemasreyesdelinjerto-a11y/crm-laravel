    @extends('landing.layouts.landing')
    @section('title', 'Dr. Santana - Clínica Capilar Elite')

    @section('content')
        @include('landing.menu.header')

        <div class="pt-20"> <!-- Empuja todo para que no lo tape el header -->

            <!-- Contenedor de imágenes -->
            <section class="relative h-[80vh] md:h-[90vh] flex items-center justify-center text-center overflow-hidden">
                <div class="absolute w-full h-full overflow-hidden">
                    @foreach ($galerias as $index => $galeria)
                        @if ($galeria->tipo == 'video')
                            <video
                                class="absolute w-full h-full object-cover transition-opacity duration-1000 ease-in-out bg-slide {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                                muted preload="auto" loop playsinline>
                                <source src="{{ asset($galeria->imagen) }}" type="video/mp4">
                                Tu navegador no soporta videos.
                            </video>
                        @else
                            <img src="{{ asset($galeria->imagen) }}" alt="Imagen {{ $index + 1 }}"
                                class="absolute w-full h-full object-cover transition-opacity duration-1000 ease-in-out bg-slide {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                        @endif
                    @endforeach

                    <!-- Degradado oscuro sobre la imagen -->
                    <div class="absolute w-full h-full bg-gradient-to-b from-black/40 via-black/20 to-black/40"></div>
                </div>

                <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/20 to-black/40"></div>

                <div class="relative z-10 max-w-3xl mx-auto px-6 text-center">
                    <!-- Texto principal -->
                    <h1 id="mainText"
                        class="text-5xl md:text-6xl font-extrabold drop-shadow-xl transition-opacity duration-1000 ease-in-out opacity-100">
                        {{ $galerias->first()->titulo ?? '' }}
                    </h1>
                    <p id="subText"
                        class="mt-4 text-lg md:text-xl text-beigeClaro/90 transition-opacity duration-1000 ease-in-out opacity-100">
                        {{ $galerias->first()->descripcion ?? '' }}
                    </p>

                    <div class="mt-8 flex gap-4 justify-center animate-glow">
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
                let currentText = 0;
                let slideInterval;

                function startSlideShow() {
                    if (!slides.length || !texts.length) return;
                    clearTimeout(slideInterval);

                    const currentMedia = slides[currentSlide];
                    const isVideo = texts[currentText]?.type === 'video';
                    const displayTime = isVideo ? 10000 : 5000;

                    const nextSlide = (currentSlide + 1) % slides.length;
                    const nextMedia = slides[nextSlide];

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
                        currentText = nextSlide;
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
                        mainText.textContent = texts[currentText]?.main || '';
                        subText.textContent = texts[currentText]?.sub || '';

                        mainText.classList.remove('opacity-0');
                        mainText.classList.add('opacity-100');
                        subText.classList.remove('opacity-0');
                        subText.classList.add('opacity-100');
                    }, 500);
                }

                document.addEventListener('DOMContentLoaded', function() {
                    if (!slides.length || !texts.length) return;
                    const firstMedia = slides[0];
                    if (firstMedia && firstMedia.tagName === 'VIDEO') {
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
                            <div class="overflow-hidden">
                                <div id="blogCarousel" class="flex transition-transform duration-300 ease-in-out gap-6">
                                    @foreach ($blogdrs as $post)
                                        <div class="flex-shrink-0 w-full md:w-1/2 lg:w-1/3 px-3">
                                            <div
                                                class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition-shadow h-full">
                                                <!-- Imagen -->
                                                @if ($post->imagen)
                                                    <img src="{{ asset('storage/images/blog/' . $post->imagen) }}"
                                                        alt="{{ $post->titulo }}" class="w-full h-48 object-cover">
                                                @else
                                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                                        <span class="text-4xl">📝</span>
                                                    </div>
                                                @endif

                                                <!-- Contenido -->
                                                <div class="p-6">
                                                    <h3 class="text-xl font-bold text-verdeOscuro mb-3">{{ $post->titulo }}
                                                    </h3>

                                                    <p class="text-sm text-verdeOscuro/60 mb-3">
                                                        📅 {{ $post->fecha }}
                                                    </p>

                                                    <p class="text-verdeOscuro/80 mb-4 line-clamp-3">
                                                        {{ Str::limit(strip_tags($post->contenido), 100) }}
                                                    </p>

                                                    <button onclick="openModal('blog-modal-{{ $post->id }}')"
                                                        class="text-beigeCalido font-semibold hover:text-verdeOscuro transition inline-flex items-center">
                                                        Leer más &rarr;
                                                    </button>
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

            <!-- Modales para cada artículo (se mantienen igual) -->
            @foreach ($blogdrs as $post)
                <div id="blog-modal-{{ $post->id }}"
                    class="modal fixed inset-0 z-50 items-center justify-center hidden">
                    <div class="modal-overlay absolute inset-0 bg-black opacity-50"
                        onclick="closeModal('blog-modal-{{ $post->id }}')"></div>

                    <div
                        class="modal-container bg-white w-full max-w-4xl rounded-2xl shadow-lg z-50 overflow-hidden mx-4 max-h-[90vh] overflow-y-auto relative">
                        <div class="flex justify-between items-center px-6 py-4 border-b bg-verdeOscuro">
                            <h3 class="text-lg font-semibold text-white">{{ $post->titulo }}</h3>
                            <button onclick="closeModal('blog-modal-{{ $post->id }}')"
                                class="text-white hover:text-gray-300 text-xl">✕</button>
                        </div>

                        <div class="p-6">
                            @if ($post->imagen)
                                <img src="{{ asset('storage/images/blog/' . $post->imagen) }}" alt="{{ $post->titulo }}"
                                    class="w-full h-64 object-cover rounded-lg mb-6">
                            @endif

                            <div class="prose max-w-none">
                                <p class="text-sm text-gray-600 mb-4">
                                    📅 Publicado el: {{ $post->fecha }}
                                </p>

                                <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                                    {{ $post->contenido }}
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end px-6 py-4 border-t bg-gray-50">
                            <button onclick="closeModal('blog-modal-{{ $post->id }}')"
                                class="bg-verdeOscuro text-white px-5 py-2 rounded-lg hover:bg-verdeOscuro/90">
                                Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

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

                // Funciones para modales (se mantienen igual)
                function closeModal(modalId) {
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        modal.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }
                }

                function openModal(modalId) {
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        modal.classList.remove('hidden');
                        document.body.style.overflow = 'hidden';
                    }
                }

                // Cerrar modal con ESC
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        const modals = document.querySelectorAll('.modal');
                        modals.forEach(modal => {
                            if (!modal.classList.contains('hidden')) {
                                closeModal(modal.id);
                            }
                        });
                    }
                });

                // Cerrar modal al hacer clic fuera
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('modal-overlay')) {
                        closeModal(e.target.closest('.modal').id);
                    }
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



            <!-- Sección: Contacto -->
            <section id="contacto" class="py-16 px-6 bg-gray-50">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Agenda tu cita</h2>
                    <p class="text-verdeOscuro/80 mb-8">Llena el formulario y nuestro equipo se pondrá en contacto contigo.
                    </p>
                    <form class="max-w-2xl mx-auto flex flex-col gap-4">
                        <input type="text" placeholder="Nombre completo"
                            class="p-3 rounded-xl border border-gray-300">
                        <input type="email" placeholder="Correo electrónico"
                            class="p-3 rounded-xl border border-gray-300">
                        <input type="tel" placeholder="Teléfono" class="p-3 rounded-xl border border-gray-300">
                        <textarea placeholder="Mensaje" class="p-3 rounded-xl border border-gray-300"></textarea>
                        <button type="submit"
                            class="bg-verdeOscuro text-beigeClaro px-6 py-3 rounded-xl font-semibold hover:bg-verdeClaro transition">
                            Enviar
                        </button>
                    </form>
                </div>
            </section>

        </div>
        @include('landing.forms.contacto')

        @include('landing.sections.footer')
    @endsection
