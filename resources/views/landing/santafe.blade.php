@extends('landing.layouts.landing')
@section('title', 'Clínica Santa Fe')

@section('content')
    @include('landing.menu.header')

    <div class="pt-28"> <!-- Empuja todo para que no lo tape el header -->
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
                <div class="relative w-full overflow-hidden rounded-2xl shadow-lg">
                    <div id="carouselSantaFe" class="flex transition-transform duration-500">
                        @php
                            $imagenes = [
                                'https://source.unsplash.com/800x500/?clinic,interior',
                                'https://source.unsplash.com/800x500/?clinic,reception',
                                'https://source.unsplash.com/800x500/?clinic,waiting',
                                'https://source.unsplash.com/800x500/?clinic,room'
                            ];
                        @endphp
                        @foreach($imagenes as $img)
                            <img src="{{$img}}" class="w-full flex-shrink-0 object-cover rounded-2xl"
                                alt="Instalaciones Santa Fe">
                        @endforeach
                    </div>

                    <!-- Controles -->
                    <button id="prevSlide"
                        class="absolute top-1/2 left-4 -translate-y-1/2 bg-verdeOscuro/50 text-beigeClaro p-3 rounded-full hover:bg-verdeOscuro transition">
                        &#10094;
                    </button>
                    <button id="nextSlide"
                        class="absolute top-1/2 right-4 -translate-y-1/2 bg-verdeOscuro/50 text-beigeClaro p-3 rounded-full hover:bg-verdeOscuro transition">
                        &#10095;
                    </button>
                </div>
            </div>
        </section>

        <!-- Sección: Recorrido a Santa Fe -->
        <section class="py-16 px-6 bg-white">
            <div class="max-w-5xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Recorrido a Santa Fe</h2>
                <p class="text-verdeOscuro/80 mb-4">Explora la ruta en tiempo real desde tu ubicación hasta nuestra clínica.</p>

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

    @include('landing.sections.footer')
@endsection

@section('scripts')
<script>
    function initMap() {
        // 📍 Coordenadas de destino: Clínica Santa Fe
        const destino = { lat: 19.3619, lng: -99.2769 };

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
            navigator.geolocation.getCurrentPosition(function (position) {
                const origen = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };

                const directionsService = new google.maps.DirectionsService();
                const directionsRenderer = new google.maps.DirectionsRenderer({ suppressMarkers: false });
                directionsRenderer.setMap(map);

                directionsService.route(
                    {
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
<script async
    src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&callback=initMap">
</script>
@endsection
