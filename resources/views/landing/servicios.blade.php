@extends('landing.layouts.landing')
@section('title', 'Servicios')

@section('content')
    @include('landing.menu.headerX')

    <!-- Banner estático -->
    <section class="relative w-full h-64 md:h-96 bg-cover bg-center"
        style="background-image: url('{{ asset('images/servicios/serv2.jpg') }}');">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <h1 class="text-white text-2xl md:text-4xl font-bold text-center">La Ciencia de Recuperar tú Mejor Versíon.</h1>
        </div>
    </section>

    <section id="diagnostico-flujo-estructurado" class="py-20 px-6 bg-gray-50">
    <div class="max-w-7xl mx-auto text-center">
        
        <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-3">
            ¿NOTAS CAÍDA DE CABELLO O BAJA DENSIDAD?
        </h2>
        <p class="text-lg text-gray-700 mb-12 max-w-3xl mx-auto">
            Determinamos la causa, el tipo y el grado de tu alopecia con la ayuda de la ciencia capilar avanzada.
        </p>

        <div class="mb-12">
            <div class="inline-block bg-beigeCalido/80 p-6 rounded-xl shadow-lg border-b-4 border-verdeOscuro max-w-md mx-auto">
                <h3 class="text-xl font-bold text-verdeOscuro mb-2">ACUDE A UNA CITA PARA OBTENER TU DIAGNÓSTICO</h3>
                <p class="text-gray-700 text-sm">
                    Determinamos causa, tipo y grado de alopecia y salud de tu cuero cabelludo con ayuda de nuestras herramientas con inteligencia artificial.
                </p>
            </div>
        </div>

        <div class="h-8 w-px bg-gray-400 mx-auto mb-10"></div>
        <div class="w-4 h-4 mx-auto border-t-2 border-r-2 border-gray-400 transform rotate-45 -mt-6 mb-10"></div>
        

        <div class="grid md:grid-cols-2 gap-12 items-start">
            
            <div class="relative flex flex-col items-center">
                <h4 class="text-lg font-bold text-verdeOscuro mb-4 border-b-2 border-verdeOscuro inline-block pb-1">FOLÍCULOS SANOS</h4>
                
                <div class="bg-teal-700 text-white p-5 rounded-xl shadow-xl w-full max-w-sm mb-6">
                    <h5 class="font-bold text-lg mb-1">TRATAMIENTOS REGENERATIVOS</h5>
                    <p class="text-sm">Detener la caída, fortalecer y estimular el crecimiento.</p>
                </div>

                <div class="h-8 w-px bg-teal-700 mx-auto"></div>
                
                <ul class="text-left space-y-3 mt-4 w-full max-w-sm text-verdeOscuro">
                    <li class="p-3 bg-white rounded-lg shadow-md border-l-4 border-teal-700 text-sm">
                        <span class="font-bold">- TRATAMIENTO ORAL:</span> <br> Detiene la hormona que causa caída.
                    </li>
                    <li class="p-3 bg-white rounded-lg shadow-md border-l-4 border-teal-700 text-sm">
                        <span class="font-bold">- TRATAMIENTO INYECTADO:</span> <br> Bioestimuladores capilares.
                    </li>
                    <li class="p-3 bg-white rounded-lg shadow-md border-l-4 border-teal-700 text-sm">
                        <span class="font-bold">- TRATAMIENTO INFILTRADO (EN LA CLÍNICA):</span> <br> PRP, Exosomas, Dutasteride, Kenalog, etc.
                    </li>
                </ul>
            </div>

            <div class="relative flex flex-col items-center">
                <h4 class="text-lg font-bold text-verdeOscuro mb-4 border-b-2 border-verdeOscuro inline-block pb-1">FOLÍCULOS NO SANOS / ALOPECIA AVANZADA</h4>

                <div class="bg-teal-700 text-white p-5 rounded-xl shadow-xl w-full max-w-sm mb-6">
                    <h5 class="font-bold text-lg mb-1">MICRO TRANSPLANTE CAPILAR</h5>
                    <p class="text-sm">Ideal para casos donde los folículos ya no son recuperables.</p>
                </div>

                <div class="h-8 w-px bg-teal-700 mx-auto"></div>
                
                <ul class="text-left space-y-3 mt-4 w-full max-w-sm text-verdeOscuro">
                    <li class="p-3 bg-white rounded-lg shadow-md border-l-4 border-teal-700 text-sm">
                        <span class="font-bold">- Seguimiento:</span> <br> Debe cuidarse con tratamientos posteriores para conservar los resultados.
                    </li>
                    <li class="p-3 bg-white rounded-lg shadow-md border-l-4 border-teal-700 text-sm">
                        <span class="font-bold">- Éxito:</span> <br> Depende de la continuidad del cuidado y tratamiento que lleves con tu procedimiento.
                    </li>
                </ul>
            </div>
            
        </div>
        
        <div class="w-full h-10 border-t-2 border-gray-400 mt-12 mb-4 hidden md:block"></div>
        <div class="w-4 h-4 mx-auto border-b-2 border-r-2 border-gray-400 transform rotate-45 md:mt-[-28px] md:mb-10"></div>


        <div class="mt-10">
            <div class="inline-block bg-teal-700 text-white p-6 rounded-xl shadow-lg border-b-4 border-teal-900 max-w-md mx-auto">
                <h3 class="text-xl font-bold mb-2">RESULTADOS</h3>
                <p class="text-sm">
                    Cabello más fuerte, denso y natural. Gracias a un plan médico integral, adaptado a tus necesidades.
                </p>
            </div>
        </div>

    </div>
</section>
<hr class="my-0 border-t border-gray-300">

<section id="servicios" class="py-16 px-6 bg-white" x-data="{ open: 'servicio1' }">
    <div class="max-w-6xl mx-auto grid lg:grid-cols-2 gap-12 items-start">

        <div class="flex justify-center w-full">
            <div class="relative w-full max-w-sm mx-auto rounded-xl overflow-hidden shadow-2xl">

                <div class="relative w-full aspect-[9/16] lg:h-[600px] lg:aspect-auto">
                    <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay loop muted playsinline preload="none">
                        <source src="{{ asset('images/servicios/proced.mp4') }}" type="video/mp4">
                        Tu navegador no soporta la reproducción de video.
                    </video>
                </div>
            </div>
        </div>

        <div id="MicroCB">
            <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">MICRO TRANSPLANTE CAPILAR Y DE BARBA</h2>

            <p class="text-verdeOscuro/80 text-lg mb-8">
                Los nuevos avances en medicina nos han permitido planificar nuestros procedimientos de manera más
                precisa, logrando una mayor extracción de unidades y una mayor concentración por centímetro cuadrado, lo
                que nos permite ofrecer los mejores resultados.
            </p>

            <div class="space-y-4">

                <div x-data="{ open: null }" :class="{ 'shadow-xl border-t-4 border-teal-700': open === 'servicio1' }">
                    <button @click="open = (open === 'servicio1' ? null : 'servicio1')"
                        class="w-full text-left flex justify-between items-center p-5 font-semibold bg-white rounded-lg transition-colors duration-200"
                        :class="{ 'bg-teal-50': open === 'servicio1', 'border-b': open !== 'servicio1' }">
                        <span class="text-lg text-verdeOscuro">● Clasificación precisa del grado de alopecia. </span>
                        <svg class="w-6 h-6 transform transition-transform duration-300"
                            :class="{ 'rotate-180': open === 'servicio1' }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open === 'servicio1'" x-collapse class="p-5 text-gray-700 bg-white"
                        style="display: none;">
                        <p>Con Scalp Scan.</p>
                    </div>
                </div>

                <div x-data="{ open: null }">
                    <button @click="open = (open === 'servicio2' ? null : 'servicio2')"
                        class="w-full text-left flex justify-between items-center p-5 font-semibold bg-white rounded-lg transition-colors duration-200"
                        :class="{ 'bg-teal-50': open === 'servicio2', 'border-b': open !== 'servicio2' }">
                        <span class="text-lg text-verdeOscuro">● Plan de injerto capilar o de barba. </span>
                        <svg class="w-6 h-6 transform transition-transform duration-300"
                            :class="{ 'rotate-180': open === 'servicio2' }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open === 'servicio2'" x-collapse class="p-5 text-gray-700 bg-white"
                        style="display: none;">
                        <p>Según tu perfil estético y densidad natural</p>
                    </div>
                </div>

                <div x-data="{ open: null }">
                    <button @click="open = (open === 'servicio3' ? null : 'servicio3')"
                        class="w-full text-left flex justify-between items-center p-5 font-semibold bg-white rounded-lg transition-colors duration-200"
                        :class="{ 'bg-teal-50': open === 'servicio3', 'border-b': open !== 'servicio3' }">
                        <span class="text-lg text-verdeOscuro">● Procedimiento de alta precisión. </span>
                        <svg class="w-6 h-6 transform transition-transform duration-300"
                            :class="{ 'rotate-180': open === 'servicio3' }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open === 'servicio3'" x-collapse class="p-5 text-gray-700 bg-white"
                        style="display: none;">
                        <p>Realizado por especialistas certificados.</p>
                    </div>
                </div>

                <div x-data="{ open: null }">
                    <button @click="open = (open === 'servicio4' ? null : 'servicio4')"
                        class="w-full text-left flex justify-between items-center p-5 font-semibold bg-white rounded-lg transition-colors duration-200"
                        :class="{ 'bg-teal-50': open === 'servicio4', 'border-b': open !== 'servicio4' }">
                        <span class="text-lg text-verdeOscuro">● Seguimiento postoperatorio. </span>
                        <svg class="w-6 h-6 transform transition-transform duration-300"
                            :class="{ 'rotate-180': open === 'servicio4' }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open === 'servicio4'" x-collapse class="p-5 text-gray-700 bg-white"
                        style="display: none;">
                        <p>Para asegurar resultados óptimos y duraderos (10 días, 1 mes, 3 meses, 6 meses, 9 meses, 12
                            meses, Post alta)</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <br><br><br>
    <hr class="my-12 border-t border-gray-300">
    <br><br><br>

    <div class="max-w-7xl mx-auto">

        <div class="text-center max-w-4xl mx-auto mb-16">
            <p class="uppercase text-sm font-semibold text-gray-500 tracking-widest mb-2">Realizado con técnología WAW
                de Devroye Systems</p>
            <h2 class="text-4xl md:text-5xl font-bold text-verdeOscuro mb-4">
                RECUPERA TU CABELLO SIN RAPARTE
            </h2>
            <p class="text-lg text-gray-700">
                En Clínica Capilar Élite trabajamos con uno de los sistemas más avanzados del mundo en injerto capilar:
                el sistema WAW, diseñado para optimizar la extracción folicular con máxima precisión y mínima invasión.

                Gracias a esta tecnología, realizamos injertos sin rapar que preservan tu estilo, reducen el tiempo de
                recuperación y logran una densidad completamente natural.

            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <article
                class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-teal-700 hover:shadow-xl transition duration-300">
                <div class="flex items-center mb-4">

                    <h3 class="font-bold text-xl text-verdeOscuro">Discreción total</h3>
                </div>
                <p class="text-gray-600">
                    Recupera tu imagen sin raparte, manteniendo tu imagen dura todo el proceso de recuperación.
                </p>
            </article>

            <article
                class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-teal-700 hover:shadow-xl transition duration-300">
                <div class="flex items-center mb-4">

                    <h3 class="font-bold text-xl text-verdeOscuro">Naturalidad inmediata</h3>
                </div>
                <p class="text-gray-600">
                    El cabello existente cubre el área implantada, permitiendo un aspecto estético incluso en los
                    primeros días.
                </p>
            </article>

            <article
                class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-teal-700 hover:shadow-xl transition duration-300">
                <div class="flex items-center mb-4">

                    <h3 class="font-bold text-xl text-verdeOscuro">Tecnología WAW de Devroye Systems </h3>
                </div>
                <p class="text-gray-600">
                    Un sistema que regula profundidad y dirección de extracción, garantizando folículos intactos y
                    resultados de alta densidad.
                </p>
            </article>

            <article
                class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-teal-700 hover:shadow-xl transition duration-300">
                <div class="flex items-center mb-4">

                    <h3 class="font-bold text-xl text-verdeOscuro">
                        Recuperación cómoda y rápida
                    </h3>
                </div>
                <p class="text-gray-600">
                    La precisión del sistema WAW minimiza la manipulación del cuero cabelludo, el proceso es más cómodo
                    y con menor tiempo de recuperación.
                </p>
            </article>
        </div>

        <div class="mt-16 text-center">
            <h3 class="text-3xl font-bold text-verdeOscuro mb-6">El injerto capilar sin rapar es el equilibrio perfecto
                entre TECNOLOGÍA Y ESTÉTICA</h3>
            <img src="{{ asset('images/servicios/waw2.gif') }}" alt="Instalaciones modernas de la clínica capilar"
                class="mx-auto rounded-xl shadow-2xl max-w-5xl w-full h-auto object-cover">
        </div>

    </div>

    <br><br><br>
    <hr class="my-12 border-t border-gray-300">
    <br><br><br>

    <div class="max-w-6xl mx-auto grid lg:grid-cols-2 gap-12 items-start">

        <div class="**lg:order-first**">
            <p class="uppercase text-sm font-semibold text-gray-500 tracking-widest mb-2">CUIDADO Y REGENERACIÓN
                CAPILAR
                AVANZADA </p>

            <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">TERAPIAS CAPILARES AVANZADAS</h2>

            <p class="text-verdeOscuro/80 text-lg mb-8">
                El uso de nuestra pistola de mesoterapia U225 potencia la eficacia de cada sesión. Permite llegar a la
                profundidad adecuada y depositar la cantidad precisa de medicamento para garantizar efectividad.
            </p>

            <div class="space-y-4">

                <div x-data="{ open: null }"
                    :class="{ 'shadow-xl border-t-4 border-teal-700': open === 'servicio1' }">
                    <button @click="open = (open === 'servicio1' ? null : 'servicio1')"
                        class="w-full text-left flex justify-between items-center p-5 font-semibold bg-white rounded-lg transition-colors duration-200"
                        :class="{ 'bg-teal-50': open === 'servicio1', 'border-b': open !== 'servicio1' }">
                        <span class="text-lg text-verdeOscuro">● PRP (Plasma Rico en Plaquetas) </span>
                        <svg class="w-6 h-6 transform transition-transform duration-300"
                            :class="{ 'rotate-180': open === 'servicio1' }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open === 'servicio1'" x-collapse class="p-5 text-gray-700 bg-white"
                        style="display: none;">
                        <p>Regenera y activa el crecimiento capilar.</p>
                    </div>
                </div>

                <div x-data="{ open: null }">
                    <button @click="open = (open === 'servicio2' ? null : 'servicio2')"
                        class="w-full text-left flex justify-between items-center p-5 font-semibold bg-white rounded-lg transition-colors duration-200"
                        :class="{ 'bg-teal-50': open === 'servicio2', 'border-b': open !== 'servicio2' }">
                        <span class="text-lg text-verdeOscuro">● Dutasteride</span>
                        <svg class="w-6 h-6 transform transition-transform duration-300"
                            :class="{ 'rotate-180': open === 'servicio2' }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open === 'servicio2'" x-collapse class="p-5 text-gray-700 bg-white"
                        style="display: none;">
                        <p>Tratamiento farmacológico aplicado localmente para frenar la caída y mejorar la densidad.</p>
                    </div>
                </div>

                <div x-data="{ open: null }">
                    <button @click="open = (open === 'servicio3' ? null : 'servicio3')"
                        class="w-full text-left flex justify-between items-center p-5 font-semibold bg-white rounded-lg transition-colors duration-200"
                        :class="{ 'bg-teal-50': open === 'servicio3', 'border-b': open !== 'servicio3' }">
                        <span class="text-lg text-verdeOscuro">● Finasteride</span>
                        <svg class="w-6 h-6 transform transition-transform duration-300"
                            :class="{ 'rotate-180': open === 'servicio3' }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open === 'servicio3'" x-collapse class="p-5 text-gray-700 bg-white"
                        style="display: none;">
                        <p>Tratamiento vía oral que se utiliza principalmente para detener la caída del cabello y en
                            algunos casos favorecer su crecimiento.</p>
                    </div>
                </div>

                <div x-data="{ open: null }">
                    <button @click="open = (open === 'servicio4' ? null : 'servicio4')"
                        class="w-full text-left flex justify-between items-center p-5 font-semibold bg-white rounded-lg transition-colors duration-200"
                        :class="{ 'bg-teal-50': open === 'servicio4', 'border-b': open !== 'servicio4' }">
                        <span class="text-lg text-verdeOscuro">● Exosomas</span>
                        <svg class="w-6 h-6 transform transition-transform duration-300"
                            :class="{ 'rotate-180': open === 'servicio4' }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open === 'servicio4'" x-collapse class="p-5 text-gray-700 bg-white"
                        style="display: none;">
                        <p>Factores de crecimiento celulares que promueven la regeneración capilar profunda.</p>
                    </div>
                </div>

                <div x-data="{ open: null }">
                    <button @click="open = (open === 'servicio5' ? null : 'servicio5')"
                        class="w-full text-left flex justify-between items-center p-5 font-semibold bg-white rounded-lg transition-colors duration-200"
                        :class="{ 'bg-teal-50': open === 'servicio5', 'border-b': open !== 'servicio5' }">
                        <span class="text-lg text-verdeOscuro">● Kenalog</span>
                        <svg class="w-6 h-6 transform transition-transform duration-300"
                            :class="{ 'rotate-180': open === 'servicio5' }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open === 'servicio5'" x-collapse class="p-5 text-gray-700 bg-white"
                        style="display: none;">
                        <p>Detiene la caída del cabello causada por inflamación y trata afecciones del cuero cabelludo.
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="flex justify-center w-full **lg:order-last**">
            <div class="relative w-full max-w-sm mx-auto rounded-xl overflow-hidden shadow-2xl">
                <div class="relative w-full aspect-[9/16] lg:h-[600px] lg:aspect-auto">
                    <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay loop muted playsinline preload="none">
                        <source src="{{ asset('images/tecnologias/up225.mp4') }}" type="video/mp4">
                        Tu navegador no soporta la reproducción de video.
                    </video>
                </div>
            </div>
        </div>

    </div>

    <div class="max-w-7xl mx-auto px-6 py-16">

        <div class="bg-gray-100 p-8 rounded-xl shadow-lg flex flex-col justify-center">
            <p class="uppercase text-sm font-semibold text-gray-500 mb-2">Con U225 cada tratamiento es más eficiente,
                preciso y
                efectivo. Porque tu cabello merece tecnología de vanguardia.</p>
            <h3 class="text-3xl font-bold text-verdeOscuro mb-4">Beneficios</h3>
            <p class="text-gray-500 text-lg mb-6">
                ● Aplicación precisa y uniforme
            </p>
            <p class="text-gray-500 text-lg mb-6">
                ● Mayor absorción y estimulación del folículo
            </p>
            <p class="text-gray-500 text-lg mb-6">
                ● Resultados más visibles
            </p>
            <p class="text-gray-500 text-lg mb-6">
                ● Versatilidad para diversas condiciones capilares
            </p>
            <p class="text-gray-500 text-lg mb-6">
                ● Procedimiento rápido, cómodo, seguro y sin dolor
            </p>
        </div>
    </div>
</section>

<hr class="my-12 border-t border-gray-300">
    @include('landing.sections.footer')
 @endsection