    @extends('landing.layouts.landing')
@section('title', 'Dr. Santana - Clínica Capilar Elite')

@section('content')
    @include('landing.menu.header')

    <div class="pt-28"> <!-- Empuja todo para que no lo tape el header -->

        <!-- Sección: Portada -->
        <section class="relative h-[92vh] flex items-center justify-center text-beigeClaro overflow-hidden">
            <img src="{{ asset('images/dr_santana.jpg') }}" class="absolute w-full h-full object-cover opacity-100">
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/30 to-black/70"></div>
            <div class="relative z-10 text-center px-6">
                <h1 class="text-5xl md:text-6xl font-extrabold drop-shadow-xl mb-4">
                    Dr. Santana
                </h1>
                <p class="text-lg md:text-xl text-beigeClaro/90">
                    Líder en injerto capilar y tratamientos FUE personalizados.
                </p>
                <div class="mt-8 flex gap-4 justify-center">
                    <a href="#experiencia" class="bg-beigeCalido text-verdeOscuro px-6 py-3 rounded-xl font-semibold hover:bg-verdeClaro hover:text-beigeClaro transition">
                        Conoce su trayectoria
                    </a>
                    <a href="#contacto" class="bg-transparent border border-beigeCalido/80 text-beigeClaro px-6 py-3 rounded-xl hover:bg-beigeCalido/20 transition">
                        Agenda una cita
                    </a>
                </div>
            </div>
        </section>

        <!-- Sección: Trayectoria y logros -->
        <section id="experiencia" class="py-16 px-6 bg-gray-50">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Trayectoria del Dr. Santana</h2>
                <p class="text-verdeOscuro/80 mb-6">
                    Más de 15 años de experiencia en injerto capilar, reconocido internacionalmente por sus técnicas avanzadas FUE.
                </p>
                <ul class="text-left text-verdeOscuro/90 list-disc list-inside space-y-2">
                    <li>Certificaciones nacionales e internacionales en injerto capilar.</li>
                    <li>Participación en congresos y conferencias médicas.</li>
                    <li>Más de 5000 pacientes satisfechos.</li>
                    <li>Investigaciones y publicaciones sobre trasplante capilar.</li>
                </ul>
            </div>
        </section>

        <!-- Sección: Galería -->
        <section class="py-16 px-6 bg-white">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Certificaciones del Dr. Santana</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <img src="{{ asset('images/dr_santana_1.jpg') }}" class="w-full h-64 object-cover rounded-xl shadow-lg">
                    <img src="{{ asset('images/dr_santana_2.jpg') }}" class="w-full h-64 object-cover rounded-xl shadow-lg">
                    <img src="{{ asset('images/dr_santana_3.jpg') }}" class="w-full h-64 object-cover rounded-xl shadow-lg">
                </div>
            </div>
        </section>
        <!-- Blog del Dr. Santana - Tarjetas horizontales alternadas -->
<section id="blog" class="py-16 px-6 bg-gray-50">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Blog del Dr. Santana</h2>
        <p class="text-verdeOscuro/80 mb-12">Últimos artículos y consejos sobre salud capilar y tratamientos innovadores.</p>

        @php
            $blogPosts = [
                [
                    'titulo' => '5 consejos para un cabello saludable',
                    'descripcion' => 'Descubre las mejores prácticas para mantener tu cabello fuerte y con volumen.',
                    'imagen' => 'https://source.unsplash.com/600x400/?hair,care',
                    'url' => '#'
                ],
                [
                    'titulo' => 'Técnica FUE: todo lo que necesitas saber',
                    'descripcion' => 'Aprende en detalle cómo funciona la técnica FUE y sus beneficios.',
                    'imagen' => 'https://source.unsplash.com/600x400/?clinic,hair',
                    'url' => '#'
                ],
                [
                    'titulo' => 'Mitos y realidades sobre el injerto capilar',
                    'descripcion' => 'Despeja dudas frecuentes sobre los procedimientos capilares.',
                    'imagen' => 'https://source.unsplash.com/600x400/?hair,transplant',
                    'url' => '#'
                ],
            ];
        @endphp

        @foreach($blogPosts as $index => $post)
            <div class="flex flex-col md:flex-row items-center mb-12 gap-6 {{ $index % 2 !== 0 ? 'md:flex-row-reverse' : '' }}">
                <div class="md:w-1/2 flex-shrink-0">
                    <img src="{{ $post['imagen'] }}" alt="{{ $post['titulo'] }}" class="w-full h-64 object-cover rounded-2xl shadow-lg">
                </div>
                <div class="md:w-1/2 text-left">
                    <h3 class="text-2xl font-bold text-verdeOscuro mb-4">{{ $post['titulo'] }}</h3>
                    <p class="text-verdeOscuro/80 mb-4">{{ $post['descripcion'] }}</p>
                    <a href="{{ $post['url'] }}" class="text-beigeCalido font-semibold hover:text-verdeOscuro transition">
                        Leer más &rarr;
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>


        <!-- Sección: Contacto -->
        <section id="contacto" class="py-16 px-6 bg-gray-50">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">Agenda tu cita</h2>
                <p class="text-verdeOscuro/80 mb-8">Llena el formulario y nuestro equipo se pondrá en contacto contigo.</p>
                <form class="max-w-2xl mx-auto flex flex-col gap-4">
                    <input type="text" placeholder="Nombre completo" class="p-3 rounded-xl border border-gray-300">
                    <input type="email" placeholder="Correo electrónico" class="p-3 rounded-xl border border-gray-300">
                    <input type="tel" placeholder="Teléfono" class="p-3 rounded-xl border border-gray-300">
                    <textarea placeholder="Mensaje" class="p-3 rounded-xl border border-gray-300"></textarea>
                    <button type="submit" class="bg-verdeOscuro text-beigeClaro px-6 py-3 rounded-xl font-semibold hover:bg-verdeClaro transition">
                        Enviar
                    </button>
                </form>
            </div>
        </section>

    </div>

    @include('landing.sections.footer')
@endsection
