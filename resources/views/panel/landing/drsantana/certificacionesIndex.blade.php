<section id="certificaciones" class="py-10 px-6 bg-gray-50 mb-12">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Título y botón Crear -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-[#1C6C73]">Certificaciones Dr. Santana</h1>
            <button onclick="openModal('createCerModal')"
                class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-tealClaro transition">
                Crear Certificación
            </button>
        </div>

        @if ($certificaciones->isEmpty())
            <p>No hay certificaciones disponibles.</p>
        @else
            <!-- Contenedor del carrusel -->
            <div class="relative">
                <!-- Botón Izquierda -->
                <button onclick="CerscrollLeft()"
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-[#1C6C73] text-white p-2 rounded-full shadow hover:bg-tealOscuro z-10">
                    ‹
                </button>

                <!-- Scroll horizontal -->
                <div id="CerscrollContainer" class="flex overflow-x-auto space-x-6 scrollbar-hide scroll-smooth">
                    @foreach ($certificaciones as $cert)
                        <div
                            class="min-w-[300px] bg-beigeNeutro shadow-lg rounded-lg p-6 flex justify-between items-center hover:shadow-xl transition-shadow">
                            <div>
                                <h2 class="text-xl font-bold text-tealOscuro">{{ $cert->titulo }}</h2>
                                <p class="text-tealOscuro mt-2">{{ $cert->descripcion }}</p>
                            </div>
                            <div class="flex flex-col items-end space-y-2">
                                <div class="w-20 h-20 rounded-lg flex items-center justify-center bg-white shadow-lg">
                                    @if ($cert->imagen)
                                        <img src="{{ asset($cert->imagen) }}" alt="imagen"
                                            class="w-12 h-12 object-contain">
                                    @else
                                        <span class="text-gray-400">Sin imagen</span>
                                    @endif
                                </div>
                                <button onclick="openModal('editCerModal{{ $cert->id }}')"
                                    class="bg-[#1C6C73] text-white px-3 py-1 rounded hover:bg-tealOscuro text-sm">
                                    Editar
                                </button>
                            </div>
                        </div>

                        <!-- Modal Editar -->
                        <div id="editCerModal{{ $cert->id }}"
                            class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                            <div class="bg-white rounded-lg w-96 p-6 relative">
                                <button onclick="closeModal('editCerModal{{ $cert->id }}')"
                                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>

                                <h2 class="text-xl font-bold mb-4">Editar Certificación</h2>
                                <form action="{{ route('panel.certificaciones.update', $cert->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <label class="block mb-2">Título</label>
                                    <input type="text" name="titulo" value="{{ $cert->titulo }}"
                                        class="w-full border rounded p-2 mb-4" required>

                                    <label class="block mb-2">Descripción</label>
                                    <textarea name="descripcion" class="w-full border rounded p-2 mb-4" required>{{ $cert->descripcion }}</textarea>

                                    <label class="block mb-2">Imagen</label>
                                    <input type="file" name="imagen" accept="image/*" class="mt-1">

                                    <button type="submit"
                                        class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-tealOscuro mt-4">Guardar
                                        cambios</button>
                                </form>

                                <form action="{{ route('panel.certificaciones.destroy', $cert->id) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de eliminar esta certificación?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-800 mt-4 w-full">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Botón Derecha -->
                <button onclick="CerscrollRight()"
                    class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-[#1C6C73] text-white p-2 rounded-full shadow hover:bg-tealOscuro z-10">
                    ›
                </button>
            </div>
        @endif

        <!-- Modal Crear -->
        <div id="createCerModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="bg-white rounded-lg w-96 p-6 relative">
                <button onclick="closeModal('createCerModal')"
                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>

                <h2 class="text-xl font-bold mb-4">Crear Certificación</h2>
                <form action="{{ route('panel.certificaciones.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class="block mb-2">Título</label>
                    <input type="text" name="titulo" class="w-full border rounded p-2 mb-4" required>

                    <label class="block mb-2">Descripción</label>
                    <textarea name="descripcion" class="w-full border rounded p-2 mb-4" required></textarea>

                    <label class="block mb-2">Imagen</label>
                    <input type="file" name="imagen" accept="image/*" class="mt-1">

                    <button type="submit"
                        class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-tealOscuro mt-4">Agregar</button>
                </form>
            </div>
        </div>

    </div>
    <!-- JS para modales -->
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>

    <!-- JS para scroll -->
    <script>
        const container = document.getElementById('CerscrollContainer');

        function CerscrollLeft() {
            container.scrollBy({
                left: -350,
                behavior: 'smooth'
            });
        }

        function CerscrollRight() {
            container.scrollBy({
                left: 350,
                behavior: 'smooth'
            });
        }
    </script>
</section>
