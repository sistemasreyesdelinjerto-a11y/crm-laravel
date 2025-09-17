<<<<<<< HEAD
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
=======
<div id="blogModal" class="modal fixed inset-0 z-50 items-center justify-center hidden">
    <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
    
    <div class="modal-container bg-white w-full max-w-4xl rounded-2xl shadow-lg z-50 overflow-hidden mx-4 max-h-[90vh] overflow-y-auto">
        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b bg-[#CDAF95]">
            <h2 class="text-lg font-semibold text-[#ffffff]">📝 Gestión de Blog</h2>
            <button onclick="closeModal('blogModal')" class="text-[#ffff] hover:text-[#1c6c73] text-xl">✕</button>
        </div>

        <!-- Body -->
        <div class="p-6">
            <!-- Botón para nuevo artículo -->
            <div class="mb-6">
                <button class="bg-[#1c6c73] text-white px-4 py-2 rounded-lg hover:bg-[#4298a7] flex items-center">
                    <span class="mr-2"></span>Nuevo Artículo
                </button>
            </div>

            <!-- Lista de artículos -->
            <div class="bg-gray-50 rounded-lg p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Artículos Existentes</h3>
                <div class="space-y-3">
                    @for($i = 1; $i <= 3; $i++)
                    <div class="flex justify-between items-center bg-white p-3 rounded-lg border">
                        <div>
                            <h4 class="font-medium">Artículo de ejemplo {{ $i }}</h4>
                            <p class="text-sm text-gray-600">Publicado: 2023-12-0{{ $i }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-800 px-2">✏️ Editar</button>
                            <button class="text-red-600 hover:text-red-800 px-2">🗑️ Eliminar</button>
                        </div>
                    </div>
                    @endfor
                </div>
>>>>>>> 39ec60e074dce45f0a57a95aab5d968b0caf663d
            </div>

<<<<<<< HEAD
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
=======
        <!-- Footer -->
        <div class="flex justify-end gap-3 px-6 py-4 border-t bg-gray-50">
            <button onclick="closeModal('blogModal')" 
                    class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                Cerrar
            </button>
        </div>
    </div>
</div>

<script>
// Funciones globales para modales
function openModal(blogModal) {
    const modal = document.getElementById(blogModal);
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}

function closeModal(blogModal) {
    const modal = document.getElementById(blogModal);
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
}

// Cerrar modal con ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            if (!modal.classList.contains('hidden')) {
                closeModal(modal.id);
            }
        });
    }
});

// Cerrar modal al hacer clic fuera
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('modal-overlay')) {
        const modal = e.target.closest('.modal');
        if (modal) {
            closeModal(modal.id);
        }
    }
});
</script>

<style>
.modal {
    display: none; /* Asegurar que estén ocultos inicialmente */
    transition: opacity 0.3s ease;
}

.modal:not(.hidden) {
    display: flex;
}

.modal-overlay {
    z-index: 40;
}

.modal-container {
    z-index: 50;
    position: relative;
}

/* Prevenir que el contenido del modal sea clickeable */
.modal-container * {
    pointer-events: auto;
}

.modal-overlay {
    pointer-events: auto;
    cursor: pointer;
}
</style>
>>>>>>> 39ec60e074dce45f0a57a95aab5d968b0caf663d
