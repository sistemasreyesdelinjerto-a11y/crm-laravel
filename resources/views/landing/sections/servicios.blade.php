<section id="servicios" class="py-16 px-6 bg-white">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro text-center mb-10">Servicios</h2>

        <!-- Contenedor scroll horizontal -->
        <div class="flex space-x-6 overflow-x-auto pb-4 snap-x snap-mandatory custom-scrollbar">
            @if ($servicios->isEmpty())
                <p class="text-center text-gray-600 w-full">No hay servicios disponibles.</p>
            @else
                @foreach($servicios as $servicio)
                    <div
                        class="min-w-[100px] bg-gray-50 rounded-lg shadow-md overflow-hidden snap-center flex-shrink-0">
                        @if($servicio->imagen)
                            <img src="{{ asset($servicio->imagen) }}"
                                 alt="{{ $servicio->titulo }}"
                                 class="w-full h-56 object-cover">
                        @else
                            <div class="w-full h-56 bg-gray-200 flex items-center justify-center text-gray-400">
                                Sin imagen
                            </div>
                        @endif

                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-verdeOscuro mb-2">{{ $servicio->titulo }}</h3>
                            <p class="text-gray-700 mb-4">{{ $servicio->descripcion }}</p>
                            <p class="text-gray-500 text-sm">{{ $servicio->detalle }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<style>
/* Scrollbar personalizado */
.custom-scrollbar::-webkit-scrollbar {
  height: 10px; /* altura del scrollbar horizontal */
}

.custom-scrollbar::-webkit-scrollbar-track {
  background: #ded5ce; /* gris claro */
  border-radius: 8px;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
  background-color: #1C6C73; /* tu color tealOscuro */
  border-radius: 8px;
  border: 2px solid #ded5ce; /* borde para contraste */
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
  background-color: #128087; /* un poco más claro al hacer hover */
}

/* Para Firefox */
.custom-scrollbar {
  scrollbar-color: #1C6C73 #e5e7eb;
  scrollbar-width: thin;
}
</style>
