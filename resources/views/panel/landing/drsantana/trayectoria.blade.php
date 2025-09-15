<div id="trayectoriaModal" class="modal fixed inset-0 z-50 items-center justify-center hidden">
    <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
    
    <div class="modal-container bg-white w-full max-w-3xl rounded-2xl shadow-lg z-50 overflow-hidden mx-4 max-h-[90vh] overflow-y-auto">
        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b bg-[#CDAF95]">
            <h2 class="text-lg font-semibold text-[#ffffff]">🎓 Información de Trayectoria</h2>
            <button onclick="closeModal('trayectoriaModal')" class="text-[#ffffff] hover:text-[#1c6c73] text-xl">✕</button>
        </div>

        <!-- Body -->
        <div class="p-6">
            <form class="space-y-4" method="POST" action="#" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="block font-medium text-gray-700 mb-2">Título Principal</label>
                    <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" 
                           value="Dr. Juan Santana - Especialista en Tricología">
                </div>

                <div>
                    <label class="block font-medium text-gray-700 mb-2">Descripción</label>
                    <textarea class="w-full border border-gray-300 rounded-lg px-3 py-2 h-32">Más de 15 años de experiencia en restauración capilar. Especializado en tratamientos avanzados para la caída del cabello.</textarea>
                </div>

                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <h4 class="font-semibold text-yellow-800 mb-2">💡 Consejo</h4>
                    <p class="text-yellow-700 text-sm">Esta información se mostrará en la sección principal de la landing page.</p>
                </div>
            </form>
            <br>
            <button type="submit"
            class="bg-[#1c6c73] text-white px-5 py-2 rounded-lg hover:bg-[#4298a7] transition-colors">
                💾 Guardar Cambios
            </button>
        </div>

        <!-- Footer -->
        <div class="flex justify-end gap-3 px-6 py-4 border-t bg-gray-50">
            <button onclick="closeModal('trayectoriaModal')" 
                    class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                Cancelar
            </button>
            
        </div>
    </div>
</div>

<script>
// Funciones globales para modales
function openModal(trayectoriaModal) {
    const modal = document.getElementById(trayectoriaModal);
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}

function closeModal(trayectoriaModal) {
    const modal = document.getElementById(trayectoriaModal);
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

// Cerrar modal al hacer clic fuera (en el overlay)
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('modal-overlay')) {
        closeModal(e.target.closest('.modal').id);
    }
});

// Prevenir que los clics dentro del modal se propaguen al overlay
document.addEventListener('click', function(e) {
    if (e.target.closest('.modal-container')) {
        e.stopPropagation();
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