<div id="productMovementModal" class="modal fixed inset-0 z-50 items-center justify-center hidden">
    <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
    <div class="modal-container bg-white w-full max-w-2xl rounded-2xl shadow-lg z-50 overflow-hidden mx-4 max-h-[90vh] overflow-y-auto">
        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b bg-gray-50 sticky top-0">
            <h2 class="text-lg font-semibold text-gray-800">Registrar Movimiento de Producto</h2>
            <button onclick="closeModal('productMovementModal')" class="text-gray-500 hover:text-gray-700 text-xl">✕</button>
        </div>

        <!-- Body -->
        <div class="p-6">
            <form id="formAddMovement" method="post" onsubmit="handleProductMovement(event)">
                <input type="hidden" id="isNewProduct" name="is_new_product" value="0">

                <!-- Tipo de movimiento -->
                <div class="mb-4">
                    <label for="movementType" class="block font-medium text-gray-700 mb-2">Tipo de Movimiento:</label>
                    <select class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73]" 
                            id="movementType" name="movement_type" required onchange="toggleMovementFields()">
                        <option value="" disabled selected>Seleccione...</option>
                        <option value="entrada">Entrada</option>
                        <option value="salida">Salida</option>
                    </select>
                </div>

                <!-- Entrada -->
                <div id="entradaFields" class="hidden space-y-4">
                    <div id="productNameContainer">
                        <label for="itemNameSelect" class="block font-medium text-gray-700 mb-2">Nombre del Producto:</label>
                        <select class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73]" 
                                id="itemNameSelect" name="item_name" required>
                            <option value="" disabled selected>Seleccione un producto...</option>
                        </select>
                    </div>

                    <!-- Producto nuevo -->
                    <div class="flex items-center">
                        <input type="checkbox" id="newProductCheckbox" class="w-4 h-4 text-[#1C6C73] border-gray-300 rounded focus:ring-[#1C6C73]"
                               onchange="toggleNewProductFields()">
                        <label for="newProductCheckbox" class="ml-2 text-gray-700">¿Es un producto nuevo?</label>
                    </div>

                    <!-- Categoría -->
                    <div>
                        <label for="itemsCategory" class="block font-medium text-gray-700 mb-2">Categoría:</label>
                        <select class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73]" 
                                id="itemsCategory" name="category" required>
                            <option value="" disabled selected>Seleccione una categoría...</option>
                            <option value="Farmacia">Farmacia</option>
                            <option value="Lanceta">Lanceta</option>
                            <option value="La paz">La paz</option>
                            <option value="TIM">TIM</option>
                            <option value="Imprenta">Imprenta</option>
                            <option value="Sams">Sams</option>
                            <option value="Amazon">Amazon</option>
                            <option value="Office">Office</option>
                            <option value="Instituto de tricologia">Instituto de tricologia</option>
                            <option value="Turquia">Turquia</option>
                            <option value="mercado libre">mercado libre</option>
                            <option value="Kabla">Kabla</option>
                            <option value="Varios">Varios</option>
                            <option value="walmart">Walmart</option>
                        </select>
                    </div>

                    <!-- Cantidad -->
                    <div>
                        <label for="itemQuantity" class="block font-medium text-gray-700 mb-2">Cantidad:</label>
                        <input type="number" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73]" 
                               id="itemQuantity" name="stock" min="1" required>
                    </div>

                    <!-- Es medicamento -->
                    <div class="flex items-center">
                        <input type="checkbox" id="isMedicineCheck" name="has_expiry" value="1" checked
                               class="w-4 h-4 text-[#1C6C73] border-gray-300 rounded focus:ring-[#1C6C73]"
                               onchange="toggleMedicineFields()">
                        <label for="isMedicineCheck" class="ml-2 text-gray-700">Es medicamento</label>
                    </div>

                    <input type="hidden" id="itemLocation" name="item_location" value="Bodega">

                    <div id="minimumValueField" class="hidden">
                        <label for="minimumValue" class="block font-medium text-gray-700 mb-2">Valor Mínimo Requerido:</label>
                        <input type="number" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73]" 
                               id="minimumValue" name="minimum_value" min="0">
                    </div>

                    <div id="expirationDateField" class="hidden">
                        <label for="expirationDate" class="block font-medium text-gray-700 mb-2">Fecha de caducidad:</label>
                        <input type="date" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73]" 
                               id="expirationDate" name="expirationDate">
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="toggleManualPrice"
                               class="w-4 h-4 text-[#1C6C73] border-gray-300 rounded focus:ring-[#1C6C73]"
                               onchange="togglePriceField()">
                        <label for="toggleManualPrice" class="ml-2 text-gray-700">Venta</label>
                    </div>

                    <div id="manualPriceField" class="hidden">
                        <label for="manualPrice" class="block font-medium text-gray-700 mb-2">Precio:</label>
                        <input type="number" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73]" 
                               id="manualPrice" name="manualPrice" step="0.01" min="0" placeholder="Opcional">
                    </div>
                </div>

                <!-- Salida -->
                <div id="salidaFields" class="hidden space-y-4">
                    <div>
                        <label for="productSelect" class="block font-medium text-gray-700 mb-2">Seleccionar Producto:</label>
                        <select class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73]" 
                                id="productSelect" name="product_id" required>
                            <option value="" disabled selected>Seleccione un producto...</option>
                        </select>
                    </div>

                    <div>
                        <label for="outputQuantity" class="block font-medium text-gray-700 mb-2">Cantidad a Salir:</label>
                        <input type="number" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73]" 
                               id="outputQuantity" name="output_quantity" min="1" required>
                    </div>

                    <div>
                        <label for="receivedByOutput" class="block font-medium text-gray-700 mb-2">Quién se le entrega:</label>
                        <select id="receivedByOutput" name="received_by" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73]" required>
                            <option value="">Selecciona a quién se le entrega</option>
                            <option value="Idania Bastida">Idania Bastida</option>
                            <option value="Dra Oriana">Dra Oriana</option>
                            <option value="Gaby">Gaby</option>
                            <option value="Luis">Luis</option>
                            <option value="Sra Susana">Sra Susana</option>
                            <option value="Sra Liseth">Sra Liseth</option>
                            <option value="Alan">Alan</option>
                            <option value="Xochitl">Xochitl</option>
                            <option value="Janeth">Janeth</option>
                            <option value="Dra Samanta">Dra Samanta</option>
                            <option value="Paola">Paola</option>
                            <option value="Armando">Armando</option>
                            <option value="Monica">Monica</option>
                            <option value="Ana">Ana</option>
                            <option value="Dr Joaquín">Dr Joaquín</option>
                            <option value="Dra Amairani">Dra Amairani</option>
                        </select>
                    </div>

                    <div>
                        <label for="outputDateMovement" class="block font-medium text-gray-700 mb-2">Fecha:</label>
                        <input type="date" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73]" 
                               id="outputDateMovement" name="output_date" required>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="flex justify-end gap-3 px-6 py-4 border-t bg-gray-50 sticky bottom-0">
            <button onclick="closeModal('productMovementModal')" 
                    class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-400 transition-colors font-medium">
                Cancelar
            </button>
            <button onclick="handleProductMovement()" 
                    class="bg-[#1C6C73] text-white px-5 py-2 rounded-lg hover:bg-[#14565c] transition-colors font-medium">
                Guardar
            </button>
        </div>
    </div>
</div>

<script>
let productsData = []; // Guardar productos para autocompletar

async function loadProducts() {
    const select1 = document.getElementById('itemNameSelect');
    const select2 = document.getElementById('productSelect');
    if (!select1 || !select2) return;

    try {
        const res = await fetch('/panel/api/products');
        const products = await res.json();
        productsData = products;

        select1.innerHTML = select2.innerHTML = '<option value="" disabled selected>Seleccione un producto...</option>';

        products.forEach(p => {
            const option1 = document.createElement('option');
            option1.value = p.id;
            option1.textContent = p.nombre;
            select1.appendChild(option1);

            const option2 = document.createElement('option');
            option2.value = p.id;
            option2.textContent = p.nombre;
            select2.appendChild(option2);
        });
    } catch (err) {
        console.error('Error cargando productos:', err);
    }
}

// Actualizar categoría al seleccionar producto existente
document.getElementById('itemNameSelect').addEventListener('change', function() {
    const selectedId = parseInt(this.value);
    const product = productsData.find(p => p.id === selectedId);
    if (product) document.getElementById('itemsCategory').value = product.categoria;
});

// Funciones para mostrar/ocultar campos
function toggleMovementFields() {
    const movementType = document.getElementById('movementType').value;
    document.getElementById('entradaFields').classList.toggle('hidden', movementType !== 'entrada');
    document.getElementById('salidaFields').classList.toggle('hidden', movementType !== 'salida');
}

function toggleNewProductFields() {
    const isNew = document.getElementById('newProductCheckbox').checked;
    document.getElementById('isNewProduct').value = isNew ? '1' : '0';
    
    const container = document.getElementById('productNameContainer');
    if (isNew) {
        container.innerHTML = `
            <label for="itemNameInput" class="block font-medium text-gray-700 mb-2">Nombre del Nuevo Producto:</label>
            <input type="text" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73]" 
                   id="itemNameInput" name="item_name" required>
        `;
    } else {
        container.innerHTML = `
            <label for="itemNameSelect" class="block font-medium text-gray-700 mb-2">Nombre del Producto:</label>
            <select class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1C6C73]" 
                    id="itemNameSelect" name="item_name" required>
                <option value="" disabled selected>Seleccione un producto...</option>
            </select>
        `;
        loadProducts(); // recargar productos
        document.getElementById('itemNameSelect').addEventListener('change', function() {
            const selectedId = parseInt(this.value);
            const product = productsData.find(p => p.id === selectedId);
            if (product) document.getElementById('itemsCategory').value = product.categoría;
        });
    }
}

function toggleMedicineFields() {
    const isMedicine = document.getElementById('isMedicineCheck').checked;
    document.getElementById('expirationDateField').classList.toggle('hidden', !isMedicine);
    document.getElementById('minimumValueField').classList.toggle('hidden', !isMedicine);
}

function togglePriceField() {
    const showPrice = document.getElementById('toggleManualPrice').checked;
    document.getElementById('manualPriceField').classList.toggle('hidden', !showPrice);
}

// Manejo del envío
function handleProductMovement(event) {
    if (event) event.preventDefault();
    const formData = new FormData(document.getElementById('formAddMovement'));
    const data = Object.fromEntries(formData.entries());
    console.log('Datos de movimiento:', data);
    alert('Movimiento registrado correctamente');
    closeModal('productMovementModal');
    document.getElementById('formAddMovement').reset();
    resetMovementFields();
}

function resetMovementFields() {
    document.getElementById('entradaFields').classList.add('hidden');
    document.getElementById('salidaFields').classList.add('hidden');
    document.getElementById('expirationDateField').classList.add('hidden');
    document.getElementById('minimumValueField').classList.add('hidden');
    document.getElementById('manualPriceField').classList.add('hidden');
    document.getElementById('isMedicineCheck').checked = true;
}

// Inicializar fecha y productos
document.addEventListener('DOMContentLoaded', function() {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('outputDateMovement').value = today;
    loadProducts();
});
</script>
