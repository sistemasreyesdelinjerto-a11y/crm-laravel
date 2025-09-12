@extends('landing.layouts.landing')
@section('title', 'Clínica Pedregal')

@section('content')
    @include('landing.menu.header')

    <div class="pt-28">
        <!-- Sección: Ubicación -->
        <section class="py-16 px-6 bg-white">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Ubicación</h2>
                <p class="text-verdeOscuro/80 mb-6">Visítanos en nuestra sede de Pedregal, CDMX.</p>
                <div class="w-full h-96 rounded-2xl overflow-hidden shadow-lg">
                    <iframe class="w-full h-full"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3009.3755693542394!2d-99.21991174614952!3d19.323071500486666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cdff21c758114b%3A0xba3d659909ee858d!2sLos%20Reyes%20del%20Injerto%20Pedregal!5e1!3m2!1ses!2smx!4v1757631601394!5m2!1ses!2smx"
                     style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </section>

        <!-- Sección: Conoce nuestras instalaciones -->
        <section class="py-16 px-6 bg-gray-50">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Conoce nuestras instalaciones</h2>
                <p class="text-verdeOscuro/80 mb-8">Un espacio moderno y acogedor para tu tratamiento capilar.</p>

                <div class="relative w-full overflow-hidden rounded-2xl shadow-lg">
                    <div id="carouselPedregal" class="flex transition-transform duration-500">
                        @php
                            $imagenes = [
                                'https://source.unsplash.com/800x500/?clinic,modern',
                                'https://source.unsplash.com/800x500/?clinic,reception',
                                'https://source.unsplash.com/800x500/?clinic,room',
                                'https://source.unsplash.com/800x500/?clinic,waiting'
                            ];
                        @endphp
                        @foreach($imagenes as $img)
                            <img src="{{$img}}" class="w-full flex-shrink-0 object-cover rounded-2xl"
                                alt="Instalaciones Pedregal">
                        @endforeach
                    </div>
                    <button id="prevSlidePedregal"
                        class="absolute top-1/2 left-4 -translate-y-1/2 bg-verdeOscuro/50 text-beigeClaro p-3 rounded-full hover:bg-verdeOscuro transition">
                        &#10094;
                    </button>
                    <button id="nextSlidePedregal"
                        class="absolute top-1/2 right-4 -translate-y-1/2 bg-verdeOscuro/50 text-beigeClaro p-3 rounded-full hover:bg-verdeOscuro transition">
                        &#10095;
                    </button>
                </div>
            </div>
        </section>

        <!-- Sección: Recorrido a Pedregal -->
        <section class="py-16 px-6 bg-white">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Recorrido a Pedregal</h2>
                <p class="text-verdeOscuro/80 mb-4">Planea tu llegada fácilmente.</p>
                <ul class="text-left text-verdeOscuro/90 list-disc list-inside space-y-2">
                    <li>Acceso rápido desde Periférico Sur.</li>
                    <li>Estacionamiento para pacientes.</li>
                    <li>Transporte público: rutas de autobús cercanas.</li>
                    <li>Recomendamos llegar 15 minutos antes de tu cita.</li>
                </ul>
            </div>
        </section>

        <!-- Sección: Apartado legal -->
        <section class="py-16 px-6 bg-gray-50">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Apartado legal</h2>
                <p class="text-verdeOscuro/80">
                    La Clínica Capilar Pedregal cumple con las normas sanitarias vigentes y garantiza la seguridad de tus
                    datos y tratamientos, bajo estricta supervisión médica.
                </p>
            </div>
        </section>
    </div>

    @include('landing.sections.footer')
@endsection

@section('scripts')
    <script>
        const carouselPed = document.getElementById('carouselPedregal');
        const slidesPed = carouselPed.children;
        let indexPed = 0;

        document.getElementById('nextSlidePedregal').addEventListener('click', () => {
            indexPed = (indexPed + 1) % slidesPed.length;
            carouselPed.style.transform = `translateX(-${indexPed * 100}%)`;
        });

        document.getElementById('prevSlidePedregal').addEventListener('click', () => {
            indexPed = (indexPed - 1 + slidesPed.length) % slidesPed.length;
            carouselPed.style.transform = `translateX(-${indexPed * 100}%)`;
        });
    </script>
@endsection
