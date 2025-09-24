<section id="casos-exito" class="py-0 px-6 bg-gradient-to-r from-gray-100 via-white to-gray-100">
    <main class="flex-1 overflow-y-auto p-6 bg-gray-50" x-data="{ openCreate: false, editId: null }">
        <div class="max-w-6xl mx-auto px-6">

            <!-- Título y botón Crear -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-tealOscuro">Casos de Éxito</h1>
                <button @click="openCreate = true"
                    class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-tealClaro transition">
                    Crear Caso de Éxito
                </button>
            </div>

            @if ($casos->isEmpty())
                <p>No hay casos de éxito disponibles.</p>
            @else
                <!-- Contenedor scroll -->
                <div class="relative">
                    <!-- Botón Izquierda -->
                    <button onclick="scrollLeftCasos()"
                        class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-[#1C6C73] text-white p-2 rounded-full shadow hover:bg-tealOscuro z-10">
                        ‹
                    </button>

                    <!-- Scroll horizontal -->
                    <div id="casosScrollContainer"
                        class="flex overflow-x-auto space-x-6 scrollbar-hide scroll-smooth cursor-grab active:cursor-grabbing select-none">

                        @foreach ($casos as $caso)
                            <div class="min-w-[350px] bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow">
                                <!-- Imagen -->
                                <div class="w-full h-48 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                    @if($caso->imagen)
                                        <img src="{{ asset($caso->imagen) }}" alt="caso" class="w-full h-full object-cover">
                                    @else
                                        <span class="text-gray-400">Sin imagen</span>
                                    @endif
                                </div>

                                <!-- Texto -->
                                <h2 class="text-xl font-bold text-tealOscuro mt-4">{{ $caso->titulo }}</h2>
                                <p class="text-gray-600 mt-2 line-clamp-4 text-justify">
                                    {{ $caso->descripcion }}
                                </p>

                                <!-- Botón Editar -->
                                <div class="text-right mt-4">
                                    <button @click="editId = {{ $caso->id }}"
                                        class="bg-[#1C6C73] text-white px-3 py-1 rounded hover:bg-tealOscuro text-sm">
                                        Editar
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Botón Derecha -->
                    <button onclick="scrollRightCasos()"
                        class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-[#1C6C73] text-white p-2 rounded-full shadow hover:bg-tealOscuro z-10">
                        ›
                    </button>
                </div>
            @endif


            <!-- Modal Crear -->
            <div x-show="openCreate" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                <div class="relative bg-white rounded-lg w-96 max-h-[80vh] p-6 overflow-y-auto">
                    <button @click="openCreate = false"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>
                    <h2 class="text-xl font-bold mb-4">Crear caso de éxito</h2>
                    <form action="{{ route('panel.casos.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <label class="block mb-2">Título</label>
                        <input type="text" name="titulo" class="w-full border rounded p-2 mb-4" required>

                        <label class="block mb-2">Descripción</label>
                        <textarea name="descripcion" class="w-full border rounded p-2 mb-4 resize-y" required></textarea>

                        <label class="block mb-2">Imagen</label>
                        <input type="file" name="imagen" accept="image/*" class="w-full border rounded p-2 mb-4" required>

                        <button type="submit"
                            class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-tealClaro">Agregar</button>
                    </form>
                </div>
            </div>

            <!-- Modal Editar -->
            @foreach ($casos as $caso)
                <div x-show="editId === {{ $caso->id }}" x-cloak
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                    <div class="relative bg-white rounded-lg w-96 max-h-[80vh] p-6 overflow-y-auto">
                        <button @click="editId = null"
                            class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>
                        <h2 class="text-xl font-bold mb-4">Editar caso de éxito</h2>
                        <form action="{{ route('panel.casos.update', $caso->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <label class="block mb-2">Título</label>
                            <input type="text" name="titulo" value="{{ $caso->titulo }}" class="w-full border rounded p-2 mb-4" required>

                            <label class="block mb-2">Descripción</label>
                            <textarea name="descripcion" class="w-full border rounded p-2 mb-4 resize-y" required>{{ $caso->descripcion }}</textarea>

                            <label class="block mb-2">Imagen</label>
                            <input type="file" name="imagen" accept="image/*" class="w-full border rounded p-2 mb-4">

                            <button type="submit"
                                class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-tealOscuro">Guardar Cambios</button>
                        </form>

                        <form action="{{ route('panel.casos.destroy', $caso->id) }}" method="POST"
                            onsubmit="return confirm('¿Seguro que deseas eliminar este caso de éxito?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-[#ff1616] text-white px-3 py-1 rounded hover:bg-red-700 text-sm mt-4">
                                Borrar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
    </main>
</section>

<!-- JS scroll -->
<script>
    const casosContainer = document.getElementById('casosScrollContainer');
    function scrollLeftCasos() {
        casosContainer.scrollBy({ left: -350, behavior: 'smooth' });
    }
    function scrollRightCasos() {
        casosContainer.scrollBy({ left: 350, behavior: 'smooth' });
    }
</script>

<!-- CSS ocultar scrollbar -->
<style>
.scrollbar-hide::-webkit-scrollbar { display: none; }
.scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
</style>
