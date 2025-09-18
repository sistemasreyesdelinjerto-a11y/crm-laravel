    @extends('landing.layouts.landing')
    @section('title', 'Clínica Querétaro')

    @section('content')
        @include('landing.menu.header')
        <!-- Tailwind ya lo tendrás -->


        <div class="pt-28">
             <div class="max-w-6xl mx-auto text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Sucursal Queretaro</h2>
             </div>
                 <!-- Empuja todo para que no lo tape el header -->
            <!-- Sección: Ubicación -->
            <section class="py-16 px-6 bg-white">
                <div class="max-w-6xl mx-auto text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Ubicación</h2>
                    <p class="text-verdeOscuro/80 mb-6">Visítanos en nuestra sede de Querétaro.</p>
                    <div class="w-full h-96 rounded-2xl overflow-hidden shadow-lg">
                        <iframe class="w-full h-full"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1491.6842020530594!2d-100.4510173580255!3d20.688888366765383!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d3576b32abba61%3A0xaf0d3874c8a58b92!2sLos%20Reyes%20del%20Injerto%20Quer%C3%A9taro!5e1!3m2!1ses!2smx!4v1757632338313!5m2!1ses!2smx"
                            style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </section>

            <!-- Sección: Conoce nuestras instalaciones -->
            <section class="py-16 px-6 bg-gray-50">
                <div class="max-w-6xl mx-auto text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Conoce nuestras instalaciones</h2>
                    <p class="text-verdeOscuro/80 mb-8">Espacios modernos y cómodos para tu atención capilar.</p>

                    <!-- Carrusel -->
                    <div id="default-carousel" class="relative w-full" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                            <!-- Item 1 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset('images/clinicaQRO/QRO1.jpeg') }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </div>
                            <!-- Item 2 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset('images/clinicaQRO/QRO2.jpeg') }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </div>
                            <!-- Item 3 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset('images/clinicaQRO/QRO3.jpeg') }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </div>
                            <!-- Item 4 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset('images/clinicaQRO/QRO4.jpeg') }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </div>
                            <!-- Item 5 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset('images/clinicaQRO/QRO5.jpeg') }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </div>
                        </div>
                        <!-- Slider indicators -->
                        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                                data-carousel-slide-to="0"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                                data-carousel-slide-to="1"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                                data-carousel-slide-to="2"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                                data-carousel-slide-to="3"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                                data-carousel-slide-to="4"></button>
                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>


            </section>

            <!-- Sección: Recorrido a Querétaro -->
            <section class="py-16 px-6 bg-white">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Recorrido a Querétaro</h2>
                    <p class="text-verdeOscuro/80 mb-4">Planea tu visita y llega sin complicaciones.</p>
                    <ul class="text-left text-verdeOscuro/90 list-disc list-inside space-y-2">
                        <li>Acceso rápido desde principales avenidas de Querétaro.</li>
                        <li>Estacionamiento propio para pacientes.</li>
                        <li>Transporte público cercano a la clínica.</li>
                        <li>Recomendamos llegar 10 minutos antes de tu cita.</li>
                    </ul>
                </div>
            </section>

            <!-- Sección: Apartado legal -->
            <section class="py-16 px-6 bg-gray-50">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Apartado legal</h2>
                    <p class="text-verdeOscuro/80">
                        La Clínica Capilar Querétaro cumple con todas las regulaciones sanitarias vigentes, asegurando la
                        privacidad
                        y seguridad de tus datos y tratamientos.
                        Todos los procedimientos son realizados por personal certificado y bajo estrictos estándares
                        médicos.
                    </p>
                </div>
            </section>
        </div>
    @include('landing.forms.contacto')

        @include('landing.sections.footer')

    @section('scripts')
        <script>
            const carouselQro = document.getElementById('carouselQueretaro');
            const slidesQro = carouselQro.querySelectorAll("div"); // cada slide
            let indexQro = 0;

            function showSlideQro() {
                carouselQro.style.transform = `translateX(-${indexQro * 100}%)`;
            }

            document.getElementById('nextSlideQro').addEventListener('click', () => {
                indexQro = (indexQro + 1) % slidesQro.length;
                showSlideQro();
            });

            document.getElementById('prevSlideQro').addEventListener('click', () => {
                indexQro = (indexQro - 1 + slidesQro.length) % slidesQro.length;
                showSlideQro();
            });

            // ✅ Cambio automático cada 5s
            setInterval(() => {
                indexQro = (indexQro + 1) % slidesQro.length;
                showSlideQro();
            }, 5000);
        </script>
    @endsection


@endsection
