
    {{-- =================== GALERÍA =================== --}}
    <section id="galeria">
        <h1 class="text-2xl font-bold mb-4">Galería</h1>

        <button class="bg-green-500 text-white px-4 py-2 rounded mb-4" data-modal-toggle="createGaleriaModal">
            + Nueva Imagen
        </button>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($galerias as $g)
            <div class="bg-white p-2 rounded shadow flex flex-col">
                <img src="{{ asset('storage/'.$g->imagen) }}" class="w-full h-48 object-cover rounded mb-2">
                <h3 class="font-bold">{{ $g->titulo }}</h3>
                <p class="text-gray-600">{{ $g->descripcion }}</p>
                <div class="flex gap-2 mt-2">
                    <button data-modal-toggle="editGaleriaModal{{ $g->id }}" class="bg-blue-500 text-white px-2 py-1 rounded">Editar</button>
                    <form action="{{ route('panel.drsantana.galeria.destroy', $g) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                    </form>
                </div>
            </div>

            {{-- Modal Editar Galería --}}
            <div id="editGaleriaModal{{ $g->id }}" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-xl w-1/2">
                    <h2 class="text-xl font-bold mb-4">Editar Imagen</h2>
                    <form action="{{ route('panel.drsantana.galeria.update', $g) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="file" name="imagen" class="w-full mb-2 p-2 border rounded">
                        <input type="text" name="titulo" value="{{ $g->titulo }}" class="w-full mb-2 p-2 border rounded">
                        <textarea name="descripcion" class="w-full mb-2 p-2 border rounded">{{ $g->descripcion }}</textarea>
                        <div class="flex justify-end gap-2">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
                            <button type="button" data-modal-toggle="editGaleriaModal{{ $g->id }}" class="bg-gray-300 px-4 py-2 rounded">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>

            @endforeach
        </div>

        {{-- Modal Crear Galería --}}
        <div id="createGaleriaModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-xl w-1/2">
                <h2 class="text-xl font-bold mb-4">Nueva Imagen</h2>
                <form action="{{ route('panel.drsantana.galeria.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="imagen" class="w-full mb-2 p-2 border rounded" required>
                    <input type="text" name="titulo" placeholder="Título (opcional)" class="w-full mb-2 p-2 border rounded">
                    <textarea name="descripcion" placeholder="Descripción (opcional)" class="w-full mb-2 p-2 border rounded"></textarea>
                    <div class="flex justify-end gap-2">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
                        <button type="button" data-modal-toggle="createGaleriaModal" class="bg-gray-300 px-4 py-2 rounded">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-4">{{ $galerias->links() }}</div>
    </section>
