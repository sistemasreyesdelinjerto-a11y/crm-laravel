@extends('landing.layouts.landing')
@section('title', 'Clínica Querétaro')

@section('content')
    @include('landing.menu.header')

    <div class="pt-28"> <!-- Empuja todo para que no lo tape el header -->
        <!-- Sección: Ubicación -->
        <section class="py-16 px-6 bg-white">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Ubicación</h2>
                <p class="text-verdeOscuro/80 mb-6">Visítanos en nuestra sede de Querétaro.</p>
                <div class="w-full h-96 rounded-2xl overflow-hidden shadow-lg">
                    <iframe class="w-full h-full"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!...AQUI_TU_EMBED_DE_QUERETARO..."
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
                    <div id="carouselQueretaro" class="flex transition-transform duration-500">
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
                                alt="Instalaciones Querétaro">
                        @endforeach
                    </div>

                    <!-- Controles -->
                    <button id="prevSlideQro"
                        class="absolute top-1/2 left-4 -translate-y-1/2 bg-verdeOscuro/50 text-beigeClaro p-3 rounded-full hover:bg-verdeOscuro transition">
                        &#10094;
                    </button>
                    <button id="nextSlideQro"
                        class="absolute top-1/2 right-4 -translate-y-1/2 bg-verdeOscuro/50 text-beigeClaro p-3 rounded-full hover:bg-verdeOscuro transition">
                        &#10095;
                    </button>
                </div>
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
                    Todos los procedimientos son realizados por personal certificado y bajo estrictos estándares médicos.
                </p>
            </div>
        </section>
    </div>

    @include('landing.sections.footer')
@endsection

@section('scripts')
    <script>
        const carouselQro = document.getElementById('carouselQueretaro');
        const slidesQro = carouselQro.children;
        let indexQro = 0;

        document.getElementById('nextSlideQro').addEventListener('click', () => {
            indexQro = (indexQro + 1) % slidesQro.length;
            carouselQro.style.transform = `translateX(-${indexQro * 100}%)`;
        });

        document.getElementById('prevSlideQro').addEventListener('click', () => {
            indexQro = (indexQro - 1 + slidesQro.length) % slidesQro.length;
            carouselQro.style.transform = `translateX(-${indexQro * 100}%)`;
        });
    </script>
@endsection
