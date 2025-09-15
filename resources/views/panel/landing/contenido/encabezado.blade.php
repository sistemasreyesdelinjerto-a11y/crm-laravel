<section id="encabezado" class="py-0 px-6 bg-gradient-to-r from-gray-100 via-white to-gray-100">
<main class="flex-1 overflow-y-auto p-6 bg-gray-50" x-data="{ openCreate: false, editId: null }">


    <!-- Título y botón Crear -->
    <div class="flex justify-between items-center mb-9">
        <h1 class="text-3xl font-bold text-tealOscuro">Conócenos</h1>
        <button @click="openCreate = true"
            class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-tealClaro transition">
            Crear encabezado
        </button>
    </div>

    @if ($encabezados->isEmpty())
        <p>No hay encabezados disponibles.</p>
    @else
        <!-- Contenedor del carrusel -->
        <div class="relative">

            <!-- Botón Izquierda -->
            <button onclick="scrollLeft()"
                class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-[#1C6C73] text-white p-2 rounded-full shadow hover:bg-tealOscuro z-10">
                ‹-
            </button>

            <!-- Scroll horizontal -->
            <div id="scrollContainer" class="flex overflow-x-auto space-x-6 scrollbar-hide scroll-smooth">
                @foreach ($encabezados as $enca)
                    <div class="min-w-[300px] bg-beigeNeutro shadow-lg rounded-lg p-6 flex justify-between items-center hover:shadow-xl transition-shadow">
                        <div>
                            <h2 class="text-xl font-bold text-tealOscuro">{{ $enca->titulo }}</h2>
                            <p class="text-tealOscuro mt-2">{{ $enca->subtitulo }}</p>
                        </div>
                        <div class="flex flex-col items-end space-y-2">
                            <div class="w-20 h-20 rounded-lg flex items-center justify-center bg-white shadow-lg">
                                @if($enca->imagen)
                                    <img src="{{ asset($enca->imagen) }}" alt="imagen" class="w-12 h-12 object-contain">
                                @else
                                    <span class="text-gray-400">Sin imagen</span>
                                @endif
                            </div>
                            <button @click="editId = {{ $enca->id }}"
                                class="bg-[#1C6C73] text-white px-3 py-1 rounded hover:bg-tealOscuro text-sm">
                                Editar
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Botón Derecha -->
            <button onclick="scrollRight()"
                class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-[#1C6C73] text-white p-2 rounded-full shadow hover:bg-tealOscuro z-10">
                ->
            </button>
        </div>
        @endif

            <!-- Modal Crear -->
            <div x-show="openCreate" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                <div class="bg-white rounded-lg w-96 p-6 relative">
                    <button @click="openCreate = false"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>
                    <h2 class="text-xl font-bold mb-4">Crear Encabezado</h2>
                    <form action="{{ route('panel.landing.encabezado.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <label class="block mb-2">Título</label>
                        <input type="text" name="titulo" class="w-full border rounded p-2 mb-4" required>
                        <label class="block mb-2">SubTítulo</label>
                        <input type="text" name="subtitulo" class="w-full border rounded p-2 mb-4" required>
                        <!-- Subir imagen -->
                        <label class="block mt-2">Imagen</label>
                        <input type="file" name="imagen" accept="image/" class="mt-1">

                        <br><br>

                        <button type="submit"
                            class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-tealClaro">Agregar</button>
                    </form>
                </div>
            </div>

            <!-- Modal Editar -->
             @foreach ($encabezados as $enca)
                <div x-show="editId === {{ $enca->id }}" x-cloak
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                    <div class="bg-white rounded-lg w-96 p-6 relative">
                        <button @click="editId = null"
                            class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>
                        <h2 class="text-xl font-bold mb-4">Editar Resultado</h2>
                        <form action="{{ route('panel.landing.encabezado.update', $enca->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label class="block mb-2">Título</label>
                            <input type="text" name="titulo" value="{{ $enca->titulo }}"
                                class="w-full border rounded p-2 mb-4">
                            <label class="block mb-2">SubTítulo</label>
                            <input type="text" name="subtitulo" value="{{ $enca->subtitulo }}"
                                class="w-full border rounded p-2 mb-4">
                            <!-- Subir imagen -->
                            <label class="block mt-2">Imagen</label>
                            <input type="file" name="imagen" accept="image/*,image/svg+xml" class="mt-1">
                            <br><br>
                            <button type="submit"
                                class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-tealOscuro">Guardar
                                Cambios</button>
                        </form>
                        <form action="{{ route('panel.landing.encabezado.destroy', $enca->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este encabezado?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-[#ff1616] text-white px-3 py-1 rounded hover:bg-tealOscuro text-sm mt-4">
                                Borrar
                            </button>
                        </form>

                    </div>
                </div>
            @endforeach



    <!-- JS para scroll -->
<script>
    const container = document.getElementById('scrollContainer');

    function scrollLeft() {
        container.scrollBy({ left: -300, behavior: 'smooth' });
    }

    function scrollRight() {
        container.scrollBy({ left: 300, behavior: 'smooth' });
    }
</script>
</main>
</section>
