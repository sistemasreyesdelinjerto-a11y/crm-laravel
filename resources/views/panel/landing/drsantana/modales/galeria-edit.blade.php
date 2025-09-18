<!-- Modal Editar Galería -->
<div id="editGaleriaModal" class="fixed inset-0 z-50 hidden items-center justify-center">
    <!-- Overlay -->
    <div class="modal-overlay absolute inset-0 bg-black opacity-50" onclick="closeModal('editGaleriaModal')"></div>

    <!-- Contenedor -->
    <div class="modal-container bg-white rounded-2xl w-full max-w-md p-6 relative mx-4 max-h-[90vh] overflow-y-auto
                fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
        <button onclick="closeModal('editGaleriaModal')"
            class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-xl">×</button>

        <h2 class="text-2xl font-bold text-[#1C6C73] mb-6">Editar elemento de Galería</h2>

<form action="{{ route('panel.drsantana.galeria.update', $galeria->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- ID oculto -->
            <input type="hidden" id="editGaleriaId" name="id" value="">

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-2">Título</label>
                <input type="text" id="editGaleriaTitulo" name="titulo"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#1C6C73] focus:border-transparent"
                       placeholder="Título de la imagen">
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-2">Descripción</label>
                <textarea id="editGaleriaDescripcion" name="descripcion" rows="3"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#1C6C73] focus:border-transparent resize-vertical"
                          placeholder="Descripción opcional"></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-2">Archivo</label>
                <input type="file" name="archivo" accept="image/*,video/*"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
                <p class="text-sm text-gray-500 mt-1">Si subes un nuevo archivo, reemplazará al anterior.</p>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="closeModal('editGaleriaModal')"
                        class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-400 transition">
                    Cancelar
                </button>
                <button type="submit"
                        class="bg-[#1C6C73] text-white px-5 py-2 rounded-lg hover:bg-[#14565c] transition">
                    💾 Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditGaleriaModal(id, titulo, descripcion, imagen) {
    document.getElementById('editGaleriaId').value = id;
    document.getElementById('editGaleriaTitulo').value = titulo || '';
    document.getElementById('editGaleriaDescripcion').value = descripcion || '';
    openModal('editGaleriaModal');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}
</script>
