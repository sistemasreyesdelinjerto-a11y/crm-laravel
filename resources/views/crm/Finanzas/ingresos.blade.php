@extends('panel.layouts.panel')

@section('title', 'Gestión de Ingresos/Transacciones')

@section('content') 

<section class="py-10 px-6 bg-white">
    <h1 class="text-2xl text-center font-bold mb-8 text-[#1C6C73]">
        Administración de Ingresos / Transacciones (Beta!)
    </h1>

{{--  Filtros --}}
<div class="bg-gray-50 p-4 rounded-lg shadow-md mb-6">
    <div class="grid grid-cols-1 md:grid-cols-6 gap-4">

        {{-- Fecha inicio --}}
        <div>
            <label for="fechaInicio" class="block text-gray-700 text-sm font-bold mb-1">Fecha inicio</label>
            <input type="date" id="fechaInicio" class="form-control border-gray-300 rounded w-full">
        </div>

        {{-- Fecha fin --}}
        <div>
            <label for="fechaFin" class="block text-gray-700 text-sm font-bold mb-1">Fecha fin</label>
            <input type="date" id="fechaFin" class="form-control border-gray-300 rounded w-full">
        </div>

        {{-- Movimiento --}}
        <div>
            <label for="movimiento" class="block text-gray-700 text-sm font-bold mb-1">Movimiento</label>
            <select id="movimiento" class="form-control border-gray-300 rounded w-full">
                <option value="Ambos">Ambos</option>
                <option value="Ingreso">Ingreso</option>
                <option value="Egreso">Egreso</option>
            </select>
        </div>

        {{-- Sucursal --}}
        <div>
            <label for="clinic" class="block text-gray-700 text-sm font-bold mb-1">Clinica</label>
            <select id="clinic" class="form-control border-gray-300 rounded w-full">
                <option value="Ambas">Ambas</option>
                <option value="Santa Fe">Santa Fe</option>
                <option value="Roma">Roma</option>
            </select>
        </div>

        {{-- Método de Pago --}}
        <div> 
            <label for="method" class="block text-gray-700 text-sm font-bold mb-1">Método de Pago</label>
            <select id="method" class="form-control border-gray-300 rounded w-full">
                <option value="Ambos">Ambos</option>
                <option value="Efectivo">Efectivo</option>
                <option value="Tarjeta">Tarjeta</option>
                <option value="Transferencia">Transferencia</option>
                <option value="Otro">Otro</option>
            </select>
        </div>

        {{-- Tipo de Producto --}}
        <div>
            <label for="product_type" class="block text-gray-700 text-sm font-bold mb-1">Tipo de Producto</label>
            <select id="product_type" class="form-control border-gray-300 rounded w-full">
                <option value="Todos">Todos</option>
                <option value="tratamiento">Tratamiento</option>
                <option value="producto">Producto</option>
                <option value="anticipo">Anticipo</option>
                <option value="liquidacion">Liquidacion</option>
            </select>
        </div>
    </div>

    {{-- Botón de búsqueda --}}
    <div class="flex justify-end mt-4">
        <button id="btnFiltrar" class="bg-[#1C6C73] hover:bg-[#15595F] text-white font-semibold py-2 px-6 rounded">
            Filtrar
        </button>
    </div>
</div>


    {{-- Resumen de totales --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 text-center">
        <div class="bg-green-100 text-green-800 p-4 rounded-lg shadow">
            <h3 class="text-lg font-bold">Total Ingresos</h3>
            <p id="totalIngresos" class="text-2xl font-extrabold mt-2">$0.00</p>
        </div>
        <div class="bg-red-100 text-red-800 p-4 rounded-lg shadow">
            <h3 class="text-lg font-bold">Total Egresos</h3>
            <p id="totalEgresos" class="text-2xl font-extrabold mt-2">$0.00</p>
        </div>
        <div class="bg-blue-100 text-blue-800 p-4 rounded-lg shadow">
            <h3 class="text-lg font-bold">Balance</h3>
            <p id="totalBalance" class="text-3xl font-extrabold mt-2">$0.00</p>
        </div>
    </div>

    {{-- Tabla --}}
    <div class="bg-white p-4 rounded-lg shadow-md">
        <table id="tablaIngresos" style="width:100%" class="table table-striped table-bordered nowrap">
            <thead class="bg-[#1C6C73] text-white">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Concepto</th>
                    <th>Movimiento</th>
                    <th>Tipo</th>
                    <th>Importe</th>
                    <th>Método</th>
                    <th>Sucursal</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</section>

{{-- Script --}}
<script>
$(document).ready(function () {
    let tabla = $('#tablaIngresos').DataTable({
        responsive: true,
        scrollX: true,
        autoWidth: true,
        dom: 'Bfrtip',
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
        language: {
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 a 0 de 0 registros",
            lengthMenu: "Mostrar _MENU_ registros",
            search: "Buscar:",
            zeroRecords: "No hay registros aún",
            paginate: {
                next: '→',
                previous: '←',
                first: 'Inicio',
                last: 'Último'
            },
        },
        columns: [
            { data: 'id', title: 'ID' },
            { data: 'fecha', title: 'Fecha' },
            { data: 'nombre', title: 'Nombre' },
            { data: 'concepto', title: 'Concepto' },
            { data: 'movimiento', title: 'Movimiento' },
            { data: 'tipo', title: 'Tipo' },
            { data: 'importe', title: 'Importe' },
            { data: 'metodo', title: 'Método' },
            { data: 'clinic', title: 'Sucursal' }
        ]
    });

    function cargarDatos(fechaInicio, fechaFin) {
        let movimiento = $('#movimiento').val() || 'Ambos';
        let clinic = $('#clinic').val() || 'Ambas';
        let metodo = $('#method').val() || 'Ambos';
        let tipoProducto = $('#product_type').val() || 'Todos';

        // Determinar si es día o rango
        let modoFiltro = (fechaInicio === fechaFin) ? 'day' : 'week';

        $.ajax({
            url: "{{ route('panel.ingresosTransacciones.data') }}",
            method: "GET",
            data: {
                filter_mode: modoFiltro,
                fecha: fechaInicio,
                week_start: fechaInicio,
                week_end: fechaFin,
                movement: movimiento,
                clinic: clinic,
                method: metodo,
                product_type: tipoProducto
            },
            beforeSend: function() {
                $('#btnFiltrar').prop('disabled', true).text('Cargando...');
            },
            success: function (response) {
                if (response.success) {
                    tabla.clear().rows.add(response.data).draw();

                    $('#totalIngresos').text(response.ingresos);
                    $('#totalEgresos').text(response.egresos);
                    $('#totalBalance').text(response.total);
                } else {
                    alert("Error: " + response.error);
                }
            },
            error: function (xhr) {
                alert("Error al cargar los datos");
                console.error(xhr.responseText);
            },
            complete: function() {
                $('#btnFiltrar').prop('disabled', false).text('Aplicar filtros');
            }
        });
    }

    // Obtener la fecha de hoy (formato YYYY-MM-DD)
    let hoy = new Date().toISOString().split('T')[0];
    $('#fechaInicio').val(hoy);
    $('#fechaFin').val(hoy);

    // Cargar automáticamente los datos del día actual
    cargarDatos(hoy, hoy);

    // Refiltrar al presionar el botón
    $('#btnFiltrar').click(function() {
        let fechaInicio = $('#fechaInicio').val();
        let fechaFin = $('#fechaFin').val();
        cargarDatos(fechaInicio, fechaFin);
    });
});
</script>
@endsection
