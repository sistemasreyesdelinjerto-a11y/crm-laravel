<section id="conocenos" class="py-16 px-6 bg-white">

<main class="flex-1 overflow-y-auto p-6 bg-gray-50" x-data="{ openCreate: false, editId: null }">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Título y botón Crear -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-verdeOscuro">Quiénes somos</h1>
            <button @click="openCreate = true"
                class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-verdeClaro transition">
                Crear Nuevo Elemento
            </button>
        </div>

        <!-- Grid de elementos -->
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($quienes_somos as $item)
            <div class="flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-shadow duration-300">
                <div class="w-20 h-20 rounded-full overflow-hidden mb-4">
                    @if($item->imagen)
                        <img src="{{ asset($item->imagen) }}" alt="{{ $item->titulo }}" class="w-full h-full object-cover">
                    @else
                        <span class="text-gray-400">Sin imagen</span>
                    @endif
                </div>
                <h3 class="font-semibold text-xl mb-2 text-verdeOscuro">{{ $item->titulo }}</h3>
                <p class="text-sm text-verdeOscuro/80">{{ $item->descripcion }}</p>

                <button @click="editId = {{ $item->id }}" class="mt-3 bg-[#1C6C73] text-white px-3 py-1 rounded hover:bg-verdeClaro text-sm">
                    Editar
                </button>
            </div>
            @endforeach
        </div>

        <!-- Modal Crear -->
        <div x-show="openCreate" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="bg-white rounded-lg w-96 p-6 relative">
                <button @click="openCreate = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>
                <h2 class="text-xl font-bold mb-4">Crear Elemento</h2>
                <form action="{{ route('panel.landing.quienes_somos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class="block mb-2">Título</label>
                    <input type="text" name="titulo" class="w-full border rounded p-2 mb-4" required>
                    <label class="block mb-2">Descripción</label>
                    <textarea name="descripcion" class="w-full border rounded p-2 mb-4" rows="4" required></textarea>
                    <label class="block mb-2">Imagen</label>
                    <input type="file" name="imagen" accept="image/*" class="mb-4">

                    <button type="submit" class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-verdeClaro">Crear</button>
                </form>
            </div>
        </div>

        <!-- Modal Editar -->
        @foreach($quienes_somos as $item)
        <div x-show="editId === {{ $item->id }}" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="bg-white rounded-lg w-96 p-6 relative">
                <button @click="editId = null" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>
                <h2 class="text-xl font-bold mb-4">Editar Elemento</h2>
                <form action="{{ route('panel.landing.quienes_somos.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label class="block mb-2">Título</label>
                    <input type="text" name="titulo" value="{{ $item->titulo }}" class="w-full border rounded p-2 mb-4" required>
                    <label class="block mb-2">Descripción</label>
                    <textarea name="descripcion" class="w-full border rounded p-2 mb-4" rows="4" required>{{ $item->descripcion }}</textarea>
                    <label class="block mb-2">Imagen</label>
                    <input type="file" name="imagen" accept="image/*" class="mb-4">
                    @if($item->imagen)
                        <img src="{{ asset($item->imagen) }}" alt="{{ $item->titulo }}" class="w-20 h-20 object-cover mb-4 rounded-full">
                    @endif

                    <button type="submit" class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-verdeClaro">Guardar Cambios</button>
                </form>
            </div>
        </div>
        @endforeach

    </div>
</main>
</section>
