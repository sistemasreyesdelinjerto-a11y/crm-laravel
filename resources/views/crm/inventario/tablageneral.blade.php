<h2 class="text-2xl text-center font-bold mb-4">Vista General de inventario</h2>
<br>
@if ($inventarios->isEmpty())
    <p>No hay articulos disponibles.</p>
@else
    <table id="TablaGeneral" style="width:100%" class="table table-striped table-bordered display nowrap">
        <thead class="bg-gray-dark color-palette text-white">
            <tr style="background-color: #4298a7">
                <th>id</th>
                <th>Nombre</th>
                <th>Cantidad Minima <p> Requerida</th>
                <th>Stock actual</th>
                <th>Pendiente por comprar</th>
                <th>Acciones</th>
            </tr> 
        </thead>
            <tbody>
                @foreach ($inventarios as $inv)
                <tr>
                    <td>{{ $inv->id }}</td>
                    <td>{{ $inv->name }}</td>
                    <td>{{ $inv->minimum_required }} Piezas</td>
                    <td>{{ $inv->stock }} Piezas</td>
                    <td>{{ $inv->unidades }} Piezas</td>
                    <td class="flex space-x-2">
                        <!-- boton para editar -->
                        <button type="button"
                            onclick="openEditModal({{ $inv->id }}, '{{ $inv->name }}', '{{ $inv->category }}', {{ $inv->stock }}, {{ $inv->minimum_required }})"
                            class="bg-[#1C6C73] hover:bg-[#14565c] text-white px-3 py-1 rounded-lg shadow-md transition">
                            Editar
                        </button>


                        <!-- boton para salida de productos -->
                        <button type="button" onclick="openSalidaModal('{{ $inv->id }}', '{{ $inv->name }}')"
                            class="bg-[#FF7014] hover:bg-[#D66820] text-white px-3 py-1 rounded-lg shadow-md transition">
                            Salida de producto
                        </button>


                        <!-- boton para borrar registros -->
                        <form action="{{ route('panel.inventario.destroy', $inv->id) }}" method="POST"
                            onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg shadow-md transition">
                                Eliminar
                            </button>
                        </form>


                    </td>
                </tr>
            @endforeach
            </tbody>
    </table>
@endif
<!-- MOdales -->
@include('crm.inventario.modalEdit')
@include('crm.inventario.salidaModal')

<!--- Inicia script de DataTable --->
<script>
    function openEditModal(id, name, category, stock, minimum_required) {
        // Llenar inputs del modal
        document.getElementById('editProductId').value = id;
        document.getElementById('editProductName').value = name;
        document.getElementById('itemsCategory').value = category;
        document.getElementById('itemStock').value = stock;
        document.getElementById('itemMinima').value = minimum_required;

        // Mostrar modal
        document.getElementById('editProductModal').classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
</script>
<script>
    $(document).ready(function() {
        $('#TablaGeneral').DataTable({
            responsive: true,
            scrollX: true,
            autoWidth: true,
            buttons: [{
                    extend: 'excel',
                    text: 'Excel',
                    className: 'bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg'
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    className: 'bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg'
                }
            ],
            dom: 'Bfrtip',
            // Otras opciones de configuración si es necesario
            //idioma
            language: {
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                infoEmpty: "Mostrando 0 a 0 de 0 registros",
                lengthMenu: "Mostrar _MENU_ registros",
                search: "Buscar:",
                loadingRecords: "Loading...",
                processing: "Procesando...",
                zeroRecords: "No hay registros aún",
                paginate: {
                    // previous: "Anterior",
                    // next: "Siguiente"
                    next: '→',
                    previous: '←',
                    first: 'Inicio',
                    last: 'Ultimo'
                },
            },
        });
    });
</script>
