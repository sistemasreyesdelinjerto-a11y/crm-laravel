@extends('landing.layouts.landing')
@section('title', 'Clínica Santa Fe')

@section('content')
    @include('landing.menu.headerX')

    <!-- Banner estático -->
    <section class="relative w-full h-64 md:h-96 bg-cover bg-center"
        style="background-image: url('{{ asset('images/clinicaSTFE/FE3.jpeg') }}');">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <h1 class="text-white text-3xl md:text-5xl font-bold text-center">Sucursal Santa Fe</h1>
        </div>
    </section>

    <div class="pt-15"> <!-- Empuja todo para que no lo tape el header -->
        <!-- Sección: Ubicación -->
        <section class="py-16 px-6 bg-white">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Ubicación</h2>
                <p class="text-verdeOscuro/80 mb-6">Visítanos en nuestra sede de Santa Fe, CDMX.</p>
                <div class="w-full h-96 rounded-2xl overflow-hidden shadow-lg">
                    <iframe class="w-full h-full"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3578.006605379548!2d-99.28196138233426!3d19.35793474784628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d20167fb97dab9%3A0x47ec54488d60f1d9!2sLos%20Reyes%20del%20Injerto%20CDMX!5e1!3m2!1ses!2smx!4v1757631541026!5m2!1ses!2smx"
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
                    <div class="relative h-80 overflow-hidden rounded-lg md:h-[650px]">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/clinicaSTFE/FE1.jpeg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/clinicaSTFE/FE2.jpeg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/clinicaSTFE/FE3.jpeg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/clinicaSTFE/FE4.jpeg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/clinicaSTFE/FE5.jpeg') }}"
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
        </section>

        <!-- Sección: Recorrido a Santa Fe -->
        <section class="py-16 px-6 bg-white">
            <div class="max-w-5xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Recorrido a Santa Fe</h2>
                <p class="text-verdeOscuro/80 mb-4">Explora la ruta en tiempo real desde tu ubicación hasta nuestra
                    clínica.
                </p>

                <!-- Contenedor del mapa dinámico -->
                <div id="map" class="w-full h-[500px] rounded-2xl shadow-lg"></div>
            </div>
        </section>

        <!-- Sección: Apartado legal -->
        <section class="py-16 px-6 bg-gray-50">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Apartado legal</h2>
                <p class="text-verdeOscuro/80">
                    La Clínica Capilar Santa Fe cumple con todas las regulaciones sanitarias vigentes, asegurando la
                    privacidad y seguridad de tus datos y tratamientos.
                    Todos los procedimientos son realizados por personal certificado y bajo estrictos estándares médicos.
                </p>
            </div>
        </section>
    </div>
    @include('landing.forms.contacto')

    @include('landing.sections.footer')
@endsection

@section('scripts')
    <script>
        function initMap() {
            // 📍 Coordenadas de destino: Clínica Santa Fe
            const destino = {
                lat: 19.3619,
                lng: -99.2769
            };

            // Crear mapa centrado en el destino
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: destino,
            });

            // Marcador en la clínica
            const marker = new google.maps.Marker({
                position: destino,
                map: map,
                title: "Clínica en Santa Fe",
            });

            // 📌 Trazar ruta desde ubicación actual
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const origen = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };

                    const directionsService = new google.maps.DirectionsService();
                    const directionsRenderer = new google.maps.DirectionsRenderer({
                        suppressMarkers: false
                    });
                    directionsRenderer.setMap(map);

                    directionsService.route({
                            origin: origen,
                            destination: destino,
                            travelMode: google.maps.TravelMode.DRIVING,
                        },
                        (response, status) => {
                            if (status === "OK") {
                                directionsRenderer.setDirections(response);
                            } else {
                                alert("No se pudo trazar la ruta: " + status);
                            }
                        }
                    );
                });
            }
        }
    </script>

    <!-- API de Google Maps (👉 reemplaza TU_API_KEY por tu clave de Google Maps) -->
    <script async src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&callback=initMap"></script>
@endsection
