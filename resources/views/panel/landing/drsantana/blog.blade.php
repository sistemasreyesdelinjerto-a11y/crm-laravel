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
            </div>

        <!-- Footer -->
        <div class="flex justify-end gap-3 px-6 py-4 border-t bg-gray-50">
            <button onclick="closeModal('blogModal')"
                    class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                Cerrar
            </button>
        </div>
    </div>
</div>


