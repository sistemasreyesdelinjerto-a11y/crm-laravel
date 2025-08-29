@extends('landing.layouts.landing')
@section('title', 'Clínicas')

@section('content')
    @include('landing.menu.header')

    <section class="py-16 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro text-center mb-10">Nuestras Clínicas</h2>

            @php
                $clinicas = [
                    [
                        'nombre' => 'Clínica Santa Fe',
                        'direccion' => 'Av. Santa Fe 123, CDMX',
                        'contacto' => '55 1234 5678',
                        'horario' => 'Lun-Vie 9:00-18:00',
                        'mapa' => 'https://www.google.com/maps?q=19.387,-99.246',
                        'imagen' => 'https://source.unsplash.com/400x300/?clinic,hospital'
                    ],
                    [
                        'nombre' => 'Clínica Polanco',
                        'direccion' => 'Calle Polanco 456, CDMX',
                        'contacto' => '55 8765 4321',
                        'horario' => 'Lun-Vie 10:00-19:00',
                        'mapa' => 'https://www.google.com/maps?q=19.434,-99.201',
                        'imagen' => 'https://source.unsplash.com/400x300/?clinic,hair'
                    ]
                ];
            @endphp

            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($clinicas as $c)
                    <article class="group bg-beigeCalido rounded-2xl shadow-lg overflow-hidden flex flex-col transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                        <img src="{{$c['imagen']}}" alt="{{$c['nombre']}}" class="w-full h-48 object-cover rounded-t-2xl">
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="font-bold text-xl mb-2 text-verdeOscuro">{{$c['nombre']}}</h3>
                                <p class="text-sm"><strong>Dirección:</strong> {{$c['direccion']}}</p>
                                <p class="text-sm"><strong>Contacto:</strong> {{$c['contacto']}}</p>
                                <p class="text-sm"><strong>Horario:</strong> {{$c['horario']}}</p>
                            </div>
                            <a href="{{$c['mapa']}}" target="_blank"
                                class="mt-4 inline-block bg-verdeOscuro text-beigeClaro px-4 py-2 rounded-lg hover:bg-verdeClaro transition text-center font-semibold">
                                Ver en mapa
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
