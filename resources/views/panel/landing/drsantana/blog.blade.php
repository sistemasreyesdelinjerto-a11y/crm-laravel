{{-- =================== BLOG =================== --}}
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Blog</h1>
        <button @click="createBlogModal = true"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
            + Nuevo Artículo
        </button>
    </div>

    <div class="space-y-4">
        @foreach($blogs as $b)
        <div class="bg-white dark:bg-gray-800 p-4 rounded shadow flex justify-between items-start">
            <div>
                <h3 class="font-bold text-lg">{{ $b->titulo }}</h3>
                <p class="text-gray-600 dark:text-gray-300">{{ $b->descripcion }}</p>
            </div>
            <div class="flex gap-2 mt-2">
                <button @click="editBlogModal = {{ $b->id }}"
                        class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition">
                    Editar
                </button>
                <form action="{{ route('panel.drsantana.blog.destroy', $b) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition">
                        Eliminar
                    </button>
                </form>
            </div>

            {{-- Modal Editar Blog --}}
            <div x-show="editBlogModal === {{ $b->id }}"
                 @click.away="editBlogModal = null"
                 class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl w-full max-w-lg">
                    <h2 class="text-xl font-bold mb-4">Editar Artículo</h2>
                    <form action="{{ route('panel.drsantana.blog.update', $b) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="text" name="titulo" value="{{ $b->titulo }}"
                               class="w-full mb-2 p-2 border rounded" required>
                        <textarea name="descripcion" class="w-full mb-2 p-2 border rounded" required>{{ $b->descripcion }}</textarea>
                        <input type="file" name="imagen" class="w-full mb-2 p-2 border rounded">
                        <div class="flex justify-end gap-2">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Guardar</button>
                            <button type="button" @click="editBlogModal = null" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 transition">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        @endforeach
    </div>

    {{-- Modal Crear Blog --}}
    <div x-show="createBlogModal" @click.away="createBlogModal = false"
         class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl w-full max-w-lg">
            <h2 class="text-xl font-bold mb-4">Nuevo Artículo</h2>
            <form action="{{ route('panel.drsantana.blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="titulo" placeholder="Título" class="w-full mb-2 p-2 border rounded" required>
                <textarea name="descripcion" placeholder="Descripción" class="w-full mb-2 p-2 border rounded" required></textarea>
                <input type="file" name="imagen" class="w-full mb-2 p-2 border rounded">
                <div class="flex justify-end gap-2">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Guardar</button>
                    <button type="button" @click="createBlogModal = false" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 transition">Cerrar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-4">{{ $blogs->links() }}</div>

{{-- Alpine.js para controlar los modales --}}
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('blogModals', () => ({
            createBlogModal: false,
            editBlogModal: null,
        }))
    })
</script>
