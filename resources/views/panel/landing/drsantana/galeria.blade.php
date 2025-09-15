<div id="galeriaModal" class="modal fixed inset-0 z-50 items-center justify-center hidden">
    <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
    
    <div class="modal-container bg-white w-full max-w-5xl rounded-2xl shadow-lg z-50 overflow-hidden mx-4 max-h-[90vh] overflow-y-auto">
        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b bg-[#CDAF95]">
            <h2 class="text-lg font-semibold text-[#ffffff]">📸 Gestión de Galería</h2>
            <button onclick="closeModal('galeriaModal')" class="text-[#ffffff] hover:text-[#1c6c73] text-xl">✕</button>
        </div>

        <!-- Body -->
        <div class="p-6">
            <!-- Subir nuevas imágenes -->
            <div class="mb-6 bg-[#ded5ce] rounded-lg p-4">
                <h3 class="text-lg font-semibold text-[#ffffff]">Subir Nueva Imagen</h3>
                <div class="border-2 border-dashed border-[#c8baaf] rounded-lg p-8 text-center">
                    <input type="file" class="hidden" id="imageUpload">
                    <label for="imageUpload" class="cursor-pointer flex flex-col items-center">
                        <span class="text-4xl mb-3">📁</span>
                        <p class="text-[#ffffff] font-medium">Arrastra imágenes aquí o haz clic para seleccionar</p>
                        <p class="text-[#ffffff] text-sm mt-1">Formatos: JPG, PNG, GIF (Máx. 5MB)</p>
                    </label>
                </div>
                <button class="w-full bg-[#1c6c73] text-white px-4 py-3 rounded-lg hover:bg-[#4298a7] mt-4">
                    Subir Imágenes Seleccionadas
                </button>
            </div>

            <!-- Imágenes existentes -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Imágenes en Galería</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @for($i = 1; $i <= 8; $i++)
                    <div class="relative group">
                        <img src="https://via.placeholder.com/150?text=Imagen+{{ $i }}" 
                             alt="Imagen {{ $i }}" 
                             class="w-full h-32 object-cover rounded-lg">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 rounded-lg transition-opacity flex items-center justify-center opacity-0 group-hover:opacity-100">
                            <button class="bg-[#1c6c73] text-white rounded-full p-2 mx-1">
                                🗑️
                            </button>
                            <button class="bg-[#42] text-white rounded-full p-2 mx-1">
                                ✏️
                            </button>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="flex justify-end gap-3 px-6 py-4 border-t bg-gray-50">
            <button onclick="closeModal('galeriaModal')" 
                    class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                Cerrar
            </button>
        </div>
    </div>
</div>

<script>
// Funciones globales para modales
function openModal(galeriaModal) {
    const modal = document.getElementById(galeriaModal);
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}

function closeModal(galeriaModal) {
    const modal = document.getElementById(galeriaModal);
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