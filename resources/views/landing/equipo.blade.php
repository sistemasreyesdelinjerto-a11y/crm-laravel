@extends('landing.layouts.landing')
@section('title', 'Nuestro Equipo')

@section('content')
    @include('landing.menu.headerX')

    <!-- Banner estático -->
    <section class="relative w-full h-64 md:h-96 bg-cover bg-center"
        style="background-image: url('{{ asset('images/equipo/Equipo 2.jpg') }}');">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <h1 class="text-white text-3xl md:text-5xl font-bold text-center">Conoce a Nuestro Equipo</h1>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-6 py-16">

        <!-- Sección Médicos -->
        <h2 class="text-3xl font-[Poppins] mb-6 text-center">Especialistas</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            <div class="bg-white shadow-lg rounded-xl overflow-hidden text-center flex flex-col">

                <div class="relative w-full h-80 overflow-hidden">
                    <img src="{{ asset('images/equipo/Dra Oriana Aguilar.jpg') }}" alt="Dra Amairani Romero"
                        class="w-full h-full object-cover" loading="lazy">
                </div>

                <div class="bg-teal-700 p-3 text-white">
                    <h3 class="text-xl font-[Cinzel] uppercase">ESP ORIANA AGUILAR </h3>

                </div>

                <div class="px-4 py-4 flex-grow">
                    <p class="text-sm font-[Poppins] text-gray-600">Tricóloga con experiencia en el diagnóstico y
                        tratamiento de diferentes tipos de alopecia.
                        Se distingue por su enfoque integral y humano, acompañando a cada paciente en su proceso de
                        transformación con atención personalizada
                        y resultados visibles.
                    </p>
                </div>


            </div>

            <div class="bg-white shadow-lg rounded-xl overflow-hidden text-center flex flex-col">

                <div class="relative w-full h-80 overflow-hidden">
                    <img src="{{ asset('images/equipo/Dra Amairani Romero .jpg') }}" alt="Dra Amairani Romero"
                        class="w-full h-full object-cover" loading="lazy">
                </div>

                <div class="bg-teal-700 p-3 text-white">
                    <h3 class="text-xl font-[Cinzel] uppercase">ESP Amairani Romero</h3>

                </div>

                <div class="px-4 py-4 flex-grow">
                    <p class="text-sm font-[Poppins] text-gray-600">Especialista con varios años de experiencia en el área
                        capilar.
                        Combina conocimiento técnico con sensibilidad humana,
                        brindando atención personalizada y cuidando cada detalle para que sus pacientes se sientan seguros y
                        satisfechos con su cambio.
                    </p>
                </div>


            </div>

            <div class="bg-white shadow-lg rounded-xl overflow-hidden text-center flex flex-col">

                <div class="relative w-full h-80 overflow-hidden">
                    <img src="{{ asset('images/equipo/Dra Monserrat Mata.jpg') }}" alt="Dra Amairani Romero"
                        class="w-full h-full object-cover " loading="lazy">
                </div>

                <div class="bg-teal-700 p-3 text-white">
                    <h3 class="text-xl font-[Cinzel] uppercase">ESP MONSERRAT MATA</h3>

                </div>

                <div class="px-4 py-4 flex-grow">
                    <p class="text-sm font-[Poppins] text-gray-600">Apasionada por el bienestar y la imagen personal, se
                        distingue por su energía positiva
                        y empatía con cada paciente, buscando que cada experiencia en la clínica sea cercana,
                        profesional y llena de confianza.
                    </p>
                </div>


            </div>

            <div class="bg-white shadow-lg rounded-xl overflow-hidden text-center flex flex-col">

                <div class="relative w-full h-80 overflow-hidden">
                    <img src="{{ asset('images/equipo/XochitlBata.jpg') }}" alt="Dra Amairani Romero"
                        class="w-full h-full object-cover " loading="lazy">
                </div>

                <div class="bg-teal-700 p-3 text-white">
                    <h3 class="text-xl font-[Cinzel] uppercase">ESP XÓCHITL LAGUNAS</h3>

                </div>

                <div class="px-4 py-4 flex-grow">
                    <p class="text-sm font-[Poppins] text-gray-600">Especialista comprometida con la excelencia en injerto
                        capilar.
                        Reconocida por su habilidad técnica con la que realiza sus procedimientos,
                        ofrece una atención cercana y eficiente, garantizando resultados de calidad y una experiencia cómoda
                        para cada paciente.
                    </p>
                </div>


            </div>

        </div>

        <!-- Segunda fila de médicos -->
        <br>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            <div class="bg-white shadow-lg rounded-xl overflow-hidden text-center flex flex-col">

                <div class="relative w-full h-80 overflow-hidden">
                    <img src="{{ asset('images/equipo/Dra Samanta Soto.jpg') }}" alt="Dra Amairani Romero"
                        class="w-full h-full object-cover" loading="lazy">
                </div>

                <div class="bg-teal-700 p-3 text-white">
                    <h3 class="text-xl font-[Cinzel] uppercase">ESP SAMANTA SOTO</h3>

                </div>

                <div class="px-4 py-4 flex-grow">
                    <p class="text-sm font-[Poppins] text-gray-600">Trícologa dedicada y detallista, apasionada por la
                        estética capilar.
                        Su enfoque combina técnica y empatía, brindando una experiencia cómoda y personalizada a cada
                        paciente.
                    </p>
                </div>


            </div>

            <div class="bg-white shadow-lg rounded-xl overflow-hidden text-center flex flex-col">

                <div class="relative w-full h-80 overflow-hidden">
                    <img src="{{ asset('images/equipo/Dra Ayeshia Salgado.png') }}" alt="Dra Amairani Romero"
                        class="w-full h-full object-cover" loading="lazy">
                </div>

                <div class="bg-teal-700 p-3 text-white">
                    <h3 class="text-xl font-[Cinzel] uppercase">ESP AYESHIA SALGADO</h3>

                </div>

                <div class="px-4 py-4 flex-grow">
                    <p class="text-sm font-[Poppins] text-gray-600">Detallista, paciente y dedicada,
                        disfruta ver la evolución de cada caso.
                        Cree firmemente en que recuperar el cabello también es recuperar la confianza y el bienestar
                        personal.
                    </p>
                </div>


            </div>

            <div class="bg-white shadow-lg rounded-xl overflow-hidden text-center flex flex-col">

                <div class="relative w-full h-80 overflow-hidden">
                    <img src="{{ asset('images/equipo/Dr Joaquin Meza.jpg') }}" alt="Dra Amairani Romero"
                        class="w-full h-full object-cover " loading="lazy">
                </div>

                <div class="bg-teal-700 p-3 text-white">
                    <h3 class="text-xl font-[Cinzel] uppercase">ESP JOAQUÍN MEZA</h3>

                </div>

                <div class="px-4 py-4 flex-grow">
                    <p class="text-sm font-[Poppins] text-gray-600">Destaca por su liderazgo dentro del equipo médico y su
                        compromiso con ofrecer resultados naturales,
                        priorizando siempre la confianza y bienestar de cada paciente.
                    </p>
                </div>


            </div>

            <div class="bg-white shadow-lg rounded-xl overflow-hidden text-center flex flex-col">

                <div class="relative w-full h-80 overflow-hidden">
                    <img src="{{ asset('images/equipo/Dra Zulema Sarmiento.jpg') }}" alt="Dra Amairani Romero"
                        class="w-full h-full object-cover object-top" loading="lazy">
                </div>

                <div class="bg-teal-700 p-3 text-white">
                    <h3 class="text-xl font-[Cinzel] uppercase">ESP ZULEMA SARMIENTO</h3>

                </div>

                <div class="px-4 py-4 flex-grow">
                    <p class="text-sm font-[Poppins] text-gray-600">Su atención y calidez hacen que cada paciente se sienta
                        en las mejores manos.
                        Zulema transmite confianza y tranquilidad, convirtiendo cada
                        visita en una experiencia amable y cercana.
                    </p>
                </div>


            </div>

        </div>

        <!-- tercera fila de médicos -->
        <br>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            <div class="col-span-full flex justify-center gap-8">

                <div class="bg-white shadow-lg rounded-xl overflow-hidden text-center flex flex-col max-w-xs">

                    <div class="relative w-full h-80 overflow-hidden">
                        <img src="{{ asset('images/equipo/Ivan2.jpg') }}" alt="ESP Ivan Mora"
                            class="w-full h-full object-cover object-top" loading="lazy">
                    </div>

                    <div class="bg-teal-700 p-3 text-white">
                        <h3 class="text-xl font-[Cinzel] uppercase">ESP IVAN MORA</h3>
                    </div>

                    <div class="px-4 py-4 flex-grow">
                        <p class="text-sm font-[Poppins] text-gray-600">
                            Atento y apasionado por lo que hace. Transforma cada procedimiento en una experiencia de
                            confianza y cuidado, donde el detalle marca la diferencia.
                        </p>
                    </div>
                </div>

                <div
                    class="bg-white shadow-lg rounded-xl overflow-hidden text-center flex flex-col max-w-xs **hidden md:block**">
                    <div class="relative w-full h-80 overflow-hidden">
                        <img src="{{ asset('images/equipo/Luis MOreno.jpg') }}" alt="ESP Ivan Mora"
                            class="w-full h-full object-cover" loading="lazy">
                    </div>

                    <div class="bg-teal-700 p-3 text-white">
                        <h3 class="text-xl font-[Cinzel] uppercase">Esp Luis Moreno</h3>
                    </div>

                    <div class="px-4 py-4 flex-grow">
                        <p class="text-sm font-[Poppins] text-gray-600">
                            Con años de experiencia dentro de la clínica, se caracteriza por su dedicación y
                            excelencia en cada procedimiento. Su habilidad técnica y
                            trato amable hacen que cada paciente se sienta en manos seguras.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección Enfermeros -->
        <h2 class="text-3xl font-[Poppins] mt-16 mb-6 text-center">Enfermería</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            <div class="bg-white shadow-lg rounded-xl overflow-hidden text-center flex flex-col">

                <div class="relative w-full h-80 overflow-hidden">
                    <img src="{{ asset('images/equipo/Pao.jpg') }}" alt="Dra Amairani Romero"
                        class="w-full h-full object-cover object-top" loading="lazy">
                </div>
                <div class="bg-teal-700 p-3 text-white">
                    <h3 class="text-xl font-[Cinzel] uppercase">Enf Paola Vidal</h3>

                </div>

                <div class="px-4 py-4 flex-grow">
                    <p class="text-sm font-[Poppins] text-gray-600">
                        Enfermera comprometida y empática. Su prioridad es brindar atención segura y
                        cálida durante cada procedimiento, garantizando la comodidad del paciente en todo momento.
                    </p>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-xl overflow-hidden text-center flex flex-col">

                <div class="relative w-full h-80 overflow-hidden">
                    <img src="{{ asset('images/equipo/Enf. Ana Benitez.png') }}" alt="Dra Amairani Romero"
                        class="w-full h-full object-cover object-top" loading="lazy">
                </div>
                <div class="bg-teal-700 p-3 text-white">
                    <h3 class="text-xl font-[Cinzel] uppercase">Enf ANA BENITEZ</h3>

                </div>

                <div class="px-4 py-4 flex-grow">
                    <p class="text-sm font-[Poppins] text-gray-600">Con gran vocación de servicio, Ana destaca por su
                        profesionalismo
                        y amabilidad. Acompaña cada etapa del procedimiento asegurando un entorno de confianza y cuidado.
                    </p>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-xl overflow-hidden text-center flex flex-col">

                <div class="relative w-full h-80 overflow-hidden">
                    <img src="{{ asset('images/equipo/Enf. Liliana.png') }}" alt="Dra Amairani Romero"
                        class="w-full h-full object-cover object-top" loading="lazy">
                </div>
                <div class="bg-teal-700 p-3 text-white">
                    <h3 class="text-xl font-[Cinzel] uppercase">Enf LILIANA GAMA</h3>

                </div>

                <div class="px-4 py-4 flex-grow">
                    <p class="text-sm font-[Poppins] text-gray-600">Apasionada por la salud y el bienestar,
                        Liliana combina técnica y sensibilidad, generando una experiencia positiva para
                        cada paciente que pasa por sus manos.
                    </p>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-xl overflow-hidden text-center flex flex-col">

                <div class="relative w-full h-80 overflow-hidden">
                    <img src="{{ asset('images/equipo/Enf. Alan Navarrete.jpg') }}" alt="Dra Amairani Romero"
                        class="w-full h-full object-cover object-top" loading="lazy">
                </div>
                <div class="bg-teal-700 p-3 text-white">
                    <h3 class="text-xl font-[Cinzel] uppercase">ENF ALAN NAVARRETE</h3>

                </div>

                <div class="px-4 py-4 flex-grow">
                    <p class="text-sm font-[Poppins] text-gray-600">Con una actitud tranquila y segura, Alan logra que cada
                        paciente se sienta en confianza.
                        Su enfoque está en cuidar cada detalle y hacer que el proceso sea tan cómodo como los resultados que
                        ayuda a conseguir.
                    </p>
                </div>
            </div>

        </div>

        <br>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <div class="col-span-full flex justify-center">
                <div
                    class="bg-white shadow-lg rounded-xl overflow-hidden text-center flex flex-col w-full sm:w-80 md:w-72 lg:w-80">

                    <div class="relative w-full h-80 overflow-hidden">
                        <img src="{{ asset('images/equipo/Enf. Mariana.jpg') }}" alt="Dr Joaquin Meza"
                            class="w-full h-full object-cover" loading="lazy">
                    </div>

                    <div class="bg-teal-700 p-3 text-white">
                        <h3 class="text-xl font-[Cinzel] uppercase">ENF MARIANA MELÉNDEZ</h3>

                    </div>

                    <div class="px-4 py-4 flex-grow">
                        <p class="text-sm font-[Poppins] text-gray-600">
                            Cálida y paciente, tiene un trato que inspira confianza desde el primer contacto. Su empatía y
                            actitud positiva hacen que cada jornada en la clínica se sienta más humana.
                        </p>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <section class="bg-white-100 py-12">
        <div class="grid lg:grid-cols-2 gap-8 mb-20">


            <div class="relative w-full max-w-sm mx-auto rounded-xl overflow-hidden shadow-2xl">

                <div class="relative w-full aspect-[9/16] lg:h-[600px] lg:aspect-auto">
                    <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay loop muted playsinline preload="none">
                        <source src="{{ asset('images/equipo/equipo.mp4') }}" type="video/mp4">
                        Tu navegador no soporta la reproducción de video.
                    </video>
                </div>

            </div>

            <div class="bg-gray-100 p-8 rounded-xl shadow-lg flex flex-col justify-center">
                <p class="uppercase text-sm font-semibold text-gray-500 mb-2"></p>
                <h3 class="text-3xl font-bold text-verdeOscuro mb-4">El equipo de confianza que ya conoces</h3>
                <p class="text-gray-500 text-lg mb-6">
                   Pendiente
                </p>
            </div>
        </div>
    </section>

    <hr class="my-12 border-t border-gray-300">
    @include('landing.sections.footer')
@endsection
