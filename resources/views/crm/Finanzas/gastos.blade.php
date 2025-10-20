@extends('panel.layouts.panel')

@section('title', 'Gestión de gastos')
 
@section('content')

<section class="py-10 px-6 bg-gray-50">
    <h1 class="text-2xl text-center font-bold mb-8 text-[#1C6C73]">Administración de Gastos (Beta testing!)</h1>

    <!-- Botón para abrir modal -->
    <div class="flex justify-end mb-6">
        <button onclick="openModal('agregarGastoModal')"
            class="bg-[#1C6C73] hover:bg-[#14565c] text-white px-4 py-2 rounded shadow-md transition flex items-center gap-2">
            <span>Nuevo gasto</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="block">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
        </button>
    </div>

    <!-- Tabla de gastos -->
    <div class="bg-white p-4 rounded-lg shadow-md">

        <table border="0" cellspacing="5" cellpadding="5" class="date-table mb-4">
    <tbody>
        <tr>
            <td style="font-weight:bold;">Fecha Inicial:</td>
            <td><input type="text" id="minGastos" name="minGastos" class="date-input"></td>
            <td style="font-weight:bold;">Fecha Final:</td>
            <td><input type="text" id="maxGastos" name="maxGastos" class="date-input"></td>
        </tr>
    </tbody>
</table>


        <table id="tablaGastos" style="width:100%" class="table table-striped table-bordered nowrap">
            <thead class="bg-[#1C6C73] text-white">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2">Categoría</th>
                    <th class="px-4 py-2">Monto</th>
                    <th class="px-4 py-2">Fecha</th>
                    <th class="px-4 py-2">Sucursal</th>
                    <th class="px-4 py-2">Opciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($gastos as $gasto)
                <tr class="border-b">
                    <td>{{ $gasto->id }}</td>
                    <td style="white-space: pre-line;">{{ $gasto->description }}</td>
                    @if ($gasto->payment_method_id == 1)
                        <td>Efectivo</td>
                    @elseif ($gasto->payment_method_id == 2)
                        <td>Tarjeta</td>
                    @elseif ($gasto->payment_method_id == 3)
                        <td>Transferencia</td>
                    @elseif ($gasto->payment_method_id == 4)
                        <td>Depósito</td>
                    @else
                    <td>{{ $gasto->payment_method_id }}</td>
                    @endif
                    <td class="text-right text-red-600">$ {{ number_format(abs($gasto->amount), 2, '.', ',') }}</td>
                    <td data-order="{{ $gasto->date }}">
                        {{ \Carbon\Carbon::parse($gasto->date)->format('d/m/Y') }}
                    </td>
                    <td>{{ $gasto->clinic }}</td>
                    <td class="px-4 py-2 flex gap-2">
                       <button 
                            class="btn-editar bg-[#1c6c73] hover:bg-[#4298a7] text-white px-2 py-1 rounded"
                            data-id="{{ $gasto->id }}"
                            data-description="{{ $gasto->description }}"
                            data-store="{{ $gasto->store }}"
                            data-cat-id="{{ $gasto->cat_id }}"
                            data-subcategory="{{ $gasto->subcategory }}"
                            data-date="{{ $gasto->date }}"
                            data-payment="{{ $gasto->payment_method_id }}"
                            data-amount="{{ abs($gasto->amount) }}"
                            data-clinic="{{ $gasto->clinic }}"
                        >
                            Editar
                        </button>
                        <button class="btn-eliminar bg-red-600 text-white px-2 py-1 rounded hover:bg-red-800 text-xs"
                                data-id="{{ $gasto->id }}">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <div class="col-12 col-md-5 flex flex-col items-start mt-4">
                    <span class="text-gray-700 text-lg font-semibold">Total de gastos:</span>
                    <h1 id="total" class="text-4xl font-extrabold text-[#1C6C73] mt-2">
                        $0.00
                    </h1>
                </div>
                <br>
            </tfoot>
        </table>
    </div>
</section>

<!-- Modal de Crear Gasto -->
<div id="agregarGastoModal" class="fixed inset-0 bg-black/40 hidden flex items-center justify-center z-50 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl p-6 relative border border-gray-100">
        <!-- Botón cerrar -->
        <button onclick="closeModal('agregarGastoModal')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl">
            &times;
        </button>

        <!-- Título -->
        <h2 class="text-lg font-semibold text-gray-700 mb-5">Añadir Gasto</h2>

        <form method="post" action="{{ route('panel.gastos.guardar') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="created_by" value="{{ auth()->id() }}">

            <div class="space-y-4">
                <!-- Descripción -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Descripción de la transacción</label>
                    <textarea name="description" rows="2"
                        class="w-full border border-gray-200 rounded-lg p-2 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none"></textarea>
                </div>

                <!-- Establecimiento -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Establecimiento</label>
                    <input type="text" name="store"
                        class="w-full border border-gray-200 rounded-lg p-2 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none" required>
                </div>

                <!-- Fila 1 -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Categoría</label>
                        <select name="cat_id" id="cat_id"
                            class="w-full border border-gray-200 rounded-lg p-2 bg-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none" required>
                            <option value="">Selecciona...</option>
                            @foreach($categorias as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Subcategoría</label>
                        <select name="subcategory" id="subcategory"
                            class="w-full border border-gray-200 rounded-lg p-2 bg-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none">
                            <option value="">Selecciona...</option>
                            @foreach($subcategorias as $sub)
                                <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Fila 2 -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Fecha</label>
                        <input type="date" name="date"
                            class="w-full border border-gray-200 rounded-lg p-2 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Método de Pago</label>
                        <select name="payment_method_id"
                            class="w-full border border-gray-200 rounded-lg p-2 bg-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none" required>
                            <option value="">Selecciona...</option>
                            <option value="1">Efectivo</option>
                            <option value="2">Tarjeta</option>
                            <option value="3">Transferencia</option>
                            <option value="4">Depósito</option>
                        </select>
                    </div>
                </div>

                <!-- Fila 3 -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Monto de la compra</label>
                        <input type="number" name="amount" step="0.1" required
                            class="w-full border border-gray-200 rounded-lg p-2 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Sucursal</label>
                        <select name="clinic"
                            class="w-full border border-gray-200 rounded-lg p-2 bg-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none" required>
                            <option value="">Selecciona...</option>
                            <option value="Santafe">Santa Fe</option>
                            <option value="Pedregal">Pedregal</option>
                            <option value="Queretaro">Querétaro</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Botón -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full bg-[#1C6C73] text-white font-semibold py-2.5 rounded-lg hover:bg-[#1b5e61] transition-all">
                    Añadir gasto
                </button>
            </div>
        </form>
    </div>
</div>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            // 🔹 Obtenemos subcategorías agrupadas por categoría desde Blade
            const subcategoriasPorCategoria = @json(
                $subcategorias->groupBy('category_id')->map(function ($items) {
                    return $items->map(fn($sub) => ['id' => $sub->id, 'name' => $sub->name]);
                })
            );

            const categoriaSelect = document.querySelector('select[name="cat_id"]');
            const subcategoriaSelect = document.querySelector('select[name="subcategory"]');

            if (categoriaSelect && subcategoriaSelect) {
                categoriaSelect.addEventListener('change', function () {
                    const catId = this.value;
                    subcategoriaSelect.innerHTML = '<option value="">Seleccione...</option>';

                    if (catId && subcategoriasPorCategoria[catId]) {
                        subcategoriasPorCategoria[catId].forEach(sub => {
                            const option = document.createElement('option');
                            option.value = sub.id;
                            option.textContent = sub.name;
                            subcategoriaSelect.appendChild(option);
                        });
                    }
                });
            }
        });
</script>

<!-- Modal Editar Gasto -->
<div id="editarGastoModal" class="fixed inset-0 bg-black/40 hidden flex items-center justify-center z-50 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl p-6 relative border border-gray-100">
        <!-- Cerrar -->
        <button onclick="closeModal('editarGastoModal')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl">
            &times;
        </button>

        <!-- Título -->
        <h2 class="text-lg font-semibold text-gray-700 mb-5">Editar Gasto</h2>

        <!-- Formulario -->
        <form id="formEditarGasto" method="POST" action="">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="edit_id">

            <div class="space-y-4">
                <!-- Descripción -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Descripción de la transacción</label>
                    <textarea name="description" id="edit_description" rows="2"
                        class="w-full border border-gray-200 rounded-lg p-2 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none"></textarea>
                </div>

                <!-- Establecimiento -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Establecimiento</label>
                    <input type="text" name="store" id="edit_store"
                        class="w-full border border-gray-200 rounded-lg p-2 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none">
                </div>

                <!-- Fila 1 -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Categoría</label>
                        <select name="cat_id" id="edit_cat_id"
                            class="w-full border border-gray-200 rounded-lg p-2 bg-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none">
                            <option value="">Selecciona...</option>
                            @foreach($categorias as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Subcategoría</label>
                        <select name="subcategory" id="edit_subcategory"
                            class="w-full border border-gray-200 rounded-lg p-2 bg-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none">
                            <option value="">Selecciona...</option>
                            @foreach($subcategorias as $sub)
                                <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Fila 2 -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Fecha</label>
                        <input type="date" name="date" id="edit_date"
                            class="w-full border border-gray-200 rounded-lg p-2 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Método de Pago</label>
                        <select name="payment_method_id" id="edit_payment_method_id"
                            class="w-full border border-gray-200 rounded-lg p-2 bg-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none">
                            <option value="1">Efectivo</option>
                            <option value="2">Tarjeta</option>
                            <option value="3">Transferencia</option>
                            <option value="4">Depósito</option>
                        </select>
                    </div>
                </div>

                <!-- Fila 3 -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Monto de la compra</label>
                        <input type="number" step="0.1" name="amount" id="edit_amount"
                            class="w-full border border-gray-200 rounded-lg p-2 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Sucursal</label>
                        <select name="clinic" id="edit_clinic"
                            class="w-full border border-gray-200 rounded-lg p-2 bg-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 outline-none">
                            <option value="">Selecciona...</option>
                            <option value="Santafe">Santa Fe</option>
                            <option value="Pedregal">Pedregal</option>
                            <option value="Queretaro">Querétaro</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Botón -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full bg-[#1C6C73] text-white font-semibold py-2.5 rounded-lg hover:bg-[#1b5e61] transition-all">
                    Actualizar gasto
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    // Funciones para abrir/cerrar modales
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // 🔹 Subcategorías agrupadas por categoría
    const subcategoriasPorCategoria = @json(
        $subcategorias->groupBy('category_id')->map(function ($items) {
            return $items->map(fn($sub) => ['id' => $sub->id, 'name' => $sub->name]);
        })
    );

    // 🔹 Al hacer clic en "Editar"
    $('#tablaGastos').on('click', '.btn-editar', function () {
        const btn = $(this);

        // Obtener los datos desde los atributos data-*
        const data = {
            id: btn.data('id'),
            description: btn.data('description'),
            store: btn.data('store'),
            cat_id: btn.data('cat-id'),
            subcategory: btn.data('subcategory'),
            date: btn.data('date'),
            payment_method_id: btn.data('payment'),
            amount: btn.data('amount'),
            clinic: btn.data('clinic'),
        };

        // Llenar los campos del modal
        $('#edit_id').val(data.id);
        $('#edit_description').val(data.description);
        $('#edit_store').val(data.store);
        $('#edit_cat_id').val(data.cat_id);
        $('#edit_amount').val(data.amount);
        $('#edit_date').val(data.date);
        $('#edit_payment_method_id').val(data.payment_method_id);
        $('#edit_clinic').val(data.clinic);

        // 🔹 Actualizar subcategorías según la categoría seleccionada
        const subSelect = $('#edit_subcategory');
        subSelect.html('<option value="">Seleccione...</option>');

        if (data.cat_id && subcategoriasPorCategoria[data.cat_id]) {
            subcategoriasPorCategoria[data.cat_id].forEach(sub => {
                const selected = (sub.id == data.subcategory) ? 'selected' : '';
                subSelect.append(`<option value="${sub.id}" ${selected}>${sub.name}</option>`);
            });
        }

        // Establecer acción del formulario
        $('#formEditarGasto').attr('action', `/panel/gastos/${data.id}`);

        // Mostrar el modal
        openModal('editarGastoModal');
    });

    // 🔹 Cuando cambia la categoría dentro del modal, actualizar subcategorías
    $('#edit_cat_id').on('change', function () {
        const catId = $(this).val();
        const subSelect = $('#edit_subcategory');
        subSelect.html('<option value="">Seleccione...</option>');

        if (catId && subcategoriasPorCategoria[catId]) {
            subcategoriasPorCategoria[catId].forEach(sub => {
                subSelect.append(`<option value="${sub.id}">${sub.name}</option>`);
            });
        }
    });
});
</script>

<script>
    //funciones de eliminar
$(document).ready(function () {
    // Acción del botón eliminar
    $('#tablaGastos').on('click', '.btn-eliminar', function () {
        const id = $(this).data('id');

        if (confirm('¿Estás seguro de eliminar este gasto?')) {
            $.ajax({
                url: `/panel/gastos/${id}`,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload(); // recarga la tabla
                    } else {
                        alert('Ocurrió un error al eliminar.');
                    }
                },
                error: function () {
                    alert('Error en la solicitud.');
                }
            });
        }
    });
});
</script>


<!-- Inicia script de DataTable -->
<script>
$(document).ready(function () {
    let minDate, maxDate;

    // Inicializar los pickers de fecha
    minDate = new DateTime($('#minGastos'), { format: 'YYYY-MM-DD' });
    maxDate = new DateTime($('#maxGastos'), { format: 'YYYY-MM-DD' });

    // Filtro personalizado por rango de fechas
    $.fn.dataTable.ext.search.push(function (settings, data) {
        let min = minDate.val();
        let max = maxDate.val();
        let dateStr = data[4]; // Columna FECHA (5ta columna)

         let date = moment(dateStr, 'DD/MM/YYYY');

        if (
            (min === null && max === null) ||
            (min === null && date.isSameOrBefore(max)) ||
            (max === null && date.isSameOrAfter(min)) ||
            (date.isSameOrAfter(min) && date.isSameOrBefore(max))
        ) {
            return true;
        }
        return false;
    });

    // Inicializar DataTable
    let table = $('#tablaGastos').DataTable({
        responsive: true,
        autoWidth: true,
        scrollX: true,
        order: [[4, 'desc']],
        buttons: [
            {
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
        pageLength: 10,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });

    // --- Función para formatear total en moneda MXN ---
    function parseTotal(total) {
        let total_parsed = total * -1; // Si tus montos son negativos
        return total_parsed.toLocaleString('es-MX', {
            style: 'currency',
            currency: 'MXN',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    // --- Función para calcular total de la tabla actual ---
    function actualizarTotal() {
    let total = 0;

    // Sumar los montos visibles en la tabla (columna 4)
    $('#tablaGastos tbody tr').each(function () {
        let montoTexto = $(this).find('td:eq(3)').text().replace(/[^\d.-]/g, '');
        let monto = parseFloat(montoTexto);
        if (!isNaN(monto)) total += monto;
    });

    // Convertir a positivo (ya que los registros están en negativo)
    //stotal = total * -1;

    // Formatear con estilo moneda MXN
    const totalFormateado = total.toLocaleString('es-MX', {
        style: 'currency',
        currency: 'MXN',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    // Mostrar en el elemento con id="total"
    $('#total').text(totalFormateado);
}

    // Redibujar tabla al cambiar fechas y recalcular total
    $('#minGastos, #maxGastos').on('change', function () {
        table.draw();
        actualizarTotal();
    });

    // Cada vez que se cambie el filtro o la tabla se redibuje
    $('#tablaGastos').on('draw.dt', function () {
        actualizarTotal();
    });

});
</script>


<style>
   .date-input {
    width: 150px;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

</style>

@endsection
