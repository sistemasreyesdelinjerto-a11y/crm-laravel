@extends('landing.layouts.landing')
@section('title', 'Tecnologías')

@section('content')
    @include('landing.menu.headerX')

    <!-- Banner estático -->
    <section class="relative w-full h-64 md:h-96 bg-cover bg-center"
        style="background-image: url('{{ asset('images/tecnologias/ImgTec.jpg') }}');">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <h1 class="text-white text-2xl md:text-4xl font-bold text-center">Tecnología de Vanguardia Para Resultados
                Excepcionales</h1>
        </div>
    </section>



    <!-- Sección de tecnologías -->
    <section class="max-w-7xl mx-auto px-6 py-12">
        <div class="max-w-7xl mx-auto py-16 px-6">
            <h2 class="text-2xl font-[Poppins] text-center text-verdeOscuro mb-12">Cada tratamiento y procedimiento en
                Clínica Capilar Élite está
                respaldado por equipos de última generación. Precisión, seguridad y resultados naturales gracias a
                tecnología exclusiva.</h2>

            <br>
            <div class="grid lg:grid-cols-2 gap-8 mb-20">


                <div class="relative w-full max-w-sm mx-auto rounded-xl overflow-hidden shadow-2xl">

                    <div class="relative w-full aspect-[9/16] lg:h-[600px] lg:aspect-auto">
                        <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay loop muted playsinline preload="none">
                            <source src="{{ asset('images/tecnologias/scalp1.MP4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de video.
                        </video>

                    </div>

                </div>

                <div class="bg-gray-100 p-8 rounded-xl shadow-lg flex flex-col justify-center">
                    <p class="uppercase text-sm font-semibold text-gray-500 mb-2">Planificación exacta de unidades
                        foliculares</p>
                    <h3 class="text-3xl font-bold text-verdeOscuro mb-4">SCALP SCAN</h3>
                    <p class="text-gray-700 text-lg mb-4">
                        • Utiliza modelos 3D para evaluar densidad, folículos activos y patrón de crecimiento.
                    </p>
                    <p class="text-gray-700 text-lg mb-4">
                        • Determina cuántas unidades foliculares son necesarias para cada paciente.
                    </p>
                    <p class="text-gray-700 text-lg mb-4">
                        • Optimiza la planificación de injertos y tratamientos, garantizando eficiencia y exactitud.
                    <p class="text-gray-700 text-lg">
                        • Presume la precisión, la baja invasividad o la rapidez del proceso, usando un
                        tono que destaque la determinación y confianza que le da al paciente.
                    </p>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-8 mb-20">

                <div class="bg-gray-100 p-8 rounded-xl shadow-lg flex flex-col justify-center **lg:order-first**">
                    <p class="uppercase text-sm font-semibold text-gray-500 mb-2">Diagnóstico capilar avanzado</p>
                    <h3 class="text-3xl font-bold text-verdeOscuro mb-4">TRICHOLAB</h3>
                    <p class="text-gray-700 text-lg mb-4">
                        • Utiliza la tricoscopia, un método de visualización de alta resolución, combinado con inteligencia
                        artificial para evaluar la salud capilar.
                    </p>
                    <p class="text-gray-700 text-lg">
                        • Ayuda a distinguir entre diferentes tipos de calvice y otros problemas.
                </div>

                <div class="relative w-full max-w-sm mx-auto rounded-xl overflow-hidden shadow-2xl">

                    <div class="relative w-full aspect-[9/16] lg:h-[600px] lg:aspect-auto">
                        <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay loop muted playsinline preload="none">
                            <source src="{{ asset('images/tecnologias/trichoVID2.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de video.
                        </video>
                    </div>

                </div>

            </div>

            <div class="grid lg:grid-cols-2 gap-8 mb-20">

                <div class="relative w-full max-w-sm mx-auto rounded-xl overflow-hidden shadow-2xl">
                    <div class="relative w-full aspect-[9/16] lg:h-[600px] lg:aspect-auto">
                        <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay loop muted playsinline preload="none">
                            <source src="{{ asset('images/tecnologias/waw1.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de video.
                        </video>
                    </div>
                </div>

                <div class="bg-gray-100 p-8 rounded-xl shadow-lg flex flex-col justify-center">
                    <p class="uppercase text-sm font-semibold text-gray-500 mb-2">Injerto capilar sin rapar</p>
                    <h3 class="text-3xl font-bold text-verdeOscuro mb-4">WAW FUE SYSTEM </h3>
                    <p class="text-gray-700 text-lg mb-4">
                        • Permite realizar injertos capilares sin necesidad de rapar el cabello.
                    </p>
                    <p class="text-gray-700 text-lg mb-4">
                        • Garantiza rigurosidad máxima en la extracción de folículos.
                    </p>
                    <p class="text-gray-700 text-lg mb-4">
                        • Conserva la longitud y estilo del cabello existente, logrando resultados naturales.
                    </p>
                    <p class="text-gray-700 text-lg">
                        • Exclusiva de clínicas especializadas.
                    </p>
                </div>
            </div>


            <div class="grid lg:grid-cols-2 gap-8">


                <div class="bg-gray-100 p-8 rounded-xl shadow-lg flex flex-col justify-center **lg:order-first**">
                    <p class="uppercase text-sm font-semibold text-gray-500 mb-2">Precisión en extracción e implantación</p>
                    <h3 class="text-3xl font-bold text-verdeOscuro mb-4">TRIVELLINI</h3>
                    <p class="text-gray-700 text-lg mb-4">
                        • Precisión en extracción e implantación.
                    </p>
                    <p class="text-gray-700 text-lg mb-4">
                        • Cada folículo se manipula con precisión quirúrgica para resultados naturales.
                    </p>
                    <p class="text-gray-700 text-lg mb-4">
                        • Minimiza trauma y acelera la recuperación, garantizando comodidad y seguridad durante el
                        procedimiento.
                    </p>
                </div>


                <div class="relative w-full max-w-sm mx-auto rounded-xl overflow-hidden shadow-2xl">
                    <div class="relative w-full aspect-[9/16] lg:h-[600px] lg:aspect-auto rounded-xl">
                        <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay loop muted playsinline preload="none">
                            <source src="{{ asset('images/tecnologias/trivelliniVID.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de video.
                        </video>
                    </div>
                </div>
            </div>

            <br><br><br><br><br>

            <div class="grid lg:grid-cols-2 gap-8 mb-20">
                <div class="relative w-full max-w-sm mx-auto rounded-xl overflow-hidden shadow-2xl">
                    <div class="relative w-full aspect-[9/16] lg:h-[600px] lg:aspect-auto">
                        <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay loop muted playsinline preload="none">
                            <source src="{{ asset('images/tecnologias/up225.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de video.
                        </video>
                    </div>
                </div>
                <div class="bg-gray-100 p-8 rounded-xl shadow-lg flex flex-col justify-center">
                    <p class=" text-sm font-semibold text-gray-500 mb-2 uppercase">Mesoterapia capilar de alta precisión</p>
                    <h3 class="text-3xl font-bold text-verdeOscuro mb-4">UP225</h3>
                     <p class="text-gray-700 text-lg mb-4">
                        • Precisión y uniformidad: Cada tratamiento llega directamente al folículo,
                        optimizando la absorción de nutrientes y factores de crecimiento.
                    </p>
                    <p class="text-gray-700 text-lg mb-4">
                        • Seguridad y control profesional: Permite regular profundidad y dosis exacta,
                        reduciendo riesgo de trauma y garantizando resultados consistentes.
                    </p>
                    <p class="text-gray-700 text-lg mb-4">
                        • Mayor eficacia de los tratamientos: Potencia la acción de mesoterapia, PRP,
                        Exosomas, Dutasteride y otros tratamientos capilares
                    </p>
                </div>
            </div>


            <div class="grid lg:grid-cols-2 gap-8">


                <div class="bg-gray-100 p-8 rounded-xl shadow-lg flex flex-col justify-center **lg:order-first**">
                    <p class="uppercase text-sm font-semibold text-gray-500 mb-2">Conservación avanzada de folículos</p>
                    <h3 class="text-3xl font-bold text-verdeOscuro mb-4">HypoThermosol</h3>
                   <p class="text-gray-700 text-lg mb-4">
                        • Máxima preservación de folículos: Mantiene los folículos en condiciones
                        ideales hasta el momento de la implantación.
                    </p>
                    <p class="text-gray-700 text-lg mb-4">
                        • Resultados más efectivos y naturales: Incrementa la supervivencia folicular,
                        asegurando densidad y cobertura óptimas.
                    </p>
                    <p class="text-gray-700 text-lg mb-4">
                        • Complemento de nuestra tecnología: Potencia procedimientos añadiendo un plus de cuidado y
                        seguridad.
                    </p>
                    <p class="text-gray-700 text-lg">
                        • Alta confiabilidad científica
                        Respaldado por BioLife Solution, líderes en soluciones de conservación celular.
                    </p>
                </div>

                <div class="relative w-full max-w-sm mx-auto rounded-xl overflow-hidden shadow-2xl">
                    <div class="relative w-full aspect-[9/16] lg:h-[600px] lg:aspect-auto">
                        <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay loop muted playsinline preload="none">
                            <source src="{{ asset('images/tecnologias/medi.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de video.
                        </video>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <hr class="my-12 border-t border-gray-300">
    @include('landing.sections.footer')
@endsection
