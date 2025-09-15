<div id="quickExitModal" class="modal fixed inset-0 z-50 items-center justify-center hidden">
    <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
    
    <div class="modal-container bg-white w-full max-w-md rounded-2xl shadow-lg z-50 overflow-hidden mx-4">
        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">Salida Rápida</h2>
            <button onclick="closeModal('quickExitModal')" class="text-gray-500 hover:text-gray-700 text-xl">✕</button>
        </div>

        <!-- Body -->
        <div class="p-6">
            <form id="formquickExit" method="post" onsubmit="handleQuickExit(event)">
                <div class="mb-4">
                    <label for="receivedBy" class="block font-medium text-gray-700 mb-2">Seleccionar a quién se le entrega:</label>
                    <select id="receivedBy" name="received_by" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73] focus:border-transparent" required>
                        <option value="" disabled selected>Seleccione a quién se le entrega</option>
                        <option value="Idania Bastida">Idania Bastida</option>
                        <option value="Dra Oriana">Dra Oriana</option>
                        <option value="Gaby">Gaby</option>
                        <option value="Sra Susana">Sra Susana</option>
                        <option value="Sra Liseth">Sra Liseth</option>
                        <option value="Alan">Alan</option>
                        <option value="Dra Samanta">Dra Samanta</option>
                        <option value="Xochitl">Xochitl</option>
                        <option value="Paola">Paola</option>
                        <option value="Juliza">Juliza</option>
                        <option value="Armando">Armando</option>
                        <option value="Monica">Monica</option>
                        <option value="Ana">Ana</option>
                        <option value="Dr Joaquín">Dr Joaquín</option>
                        <option value="Dra Amairani">Dra Amairani</option>
                    </select>
                </div>

                <input type="hidden" name="clinic" id="clinic_exit">

                <div class="mb-4">
                    <label for="type" class="block font-medium text-gray-700 mb-2">Tipo:</label>
                    <select id="type" name="type" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73] focus:border-transparent" required>
                        <option value="" disabled selected>Seleccione qué tipo de kits</option>
                        <option value="capilar">Capilar</option>
                        <option value="barba">Barba</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="outputDate" class="block font-medium text-gray-700 mb-2">Fecha:</label>
                    <input type="date" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73] focus:border-transparent" id="outputDate" name="output_date" required>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" onclick="closeModal('quickExitModal')" class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-400 transition-colors font-medium">
                        Cancelar
                    </button>
                    <button type="submit" class="bg-[#1C6C73] text-white px-5 py-2 rounded-lg hover:bg-[#14565c] transition-colors font-medium">
                        Enviar
                    </button>
                </div>
            </form>
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
// Función para manejar el envío del formulario
function handleQuickExit(event) {
    event.preventDefault();
    
    // Aquí va tu lógica para procesar el formulario
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    
    console.log('Datos de salida rápida:', data);
    
    // Simulación de envío (reemplaza con tu lógica real)
    setTimeout(() => {
        alert('Salida rápida registrada correctamente');
        closeModal('quickExitModal');
        event.target.reset(); // Limpiar formulario
    }, 500);
}

// Establecer fecha actual por defecto
document.addEventListener('DOMContentLoaded', function() {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('outputDate').value = today;
    
    // Aquí puedes establecer el valor de clinic_exit si es necesario
    // document.getElementById('clinic_exit').value = 'valor-de-la-clinica';
});
</script>