<div id="kitModal" class="modal fixed inset-0 z-50 hidden items-center justify-center overflow-y-auto">
    <div class="modal-overlay absolute inset-0 bg-black opacity-50" onclick="closeModal('kitModal')"></div>
    
    <div class="modal-container bg-white w-full max-w-2xl rounded-2xl shadow-lg z-50 overflow-hidden">
        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Editar Kit: Capilar</h2>
            <button onclick="closeModal('kitModal')" class="text-gray-500 hover:text-gray-700 text-xl">✕</button>
        </div>

        <!-- Body -->
        <div class="p-6">
            <div class="mb-4">
                <label for="treatment_type" class="block font-medium">Tipo de Kit:</label>
                <select id="treatment_type" class="w-full border rounded px-3 py-2">
                    <option value="capilar">Capilar</option>
                    <option value="barba">Barba</option>
                </select>
            </div>

            <div class="p-6 max-h-[70vh] overflow-y-auto">
            <div class="mb-4">
            <table class="w-full border border-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-3 py-2">Producto</th>
                        <th class="border px-3 py-2">Cantidad</th>
                        <th class="border px-3 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody id="kitBody">
                    @foreach ($kits as $kit)
                    <tr>
                        <td>{{ $kit->nombre }}</td>
                        <td>{{ $kit->quantity }}</td>
                        <td>Acciones</td>        
                    </tr>                        
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>


            <button type="button" class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Agregar Producto
            </button>
        </div>

        <!-- Footer -->
        <div class="flex justify-end gap-2 px-6 py-4 border-t">
            <button class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-[#14565c]">
                Guardar Cambios
            </button>
            <button onclick="closeModal('kitModal')" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                Cerrar
            </button>
        </div>
    </div>
</div>

<style>
.modal {
    transition: opacity 0.25s ease;
}
.modal-hidden {
    opacity: 0;
    pointer-events: none;
}
.modal-visible {
    opacity: 1;
    pointer-events: auto;
}
</style>

    <script>
            function openModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }

            function closeModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';
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
</script>

