<h2 class="text-2xl text-center font-bold mb-4">Movimientos de inventario</h2>
<br>
<table id="TablaDetallados" style="width:100%" class="table table-striped table-bordered display nowrap">
    <thead class="bg-gray-dark color-palette text-white">
        <tr style="background-color: #4298a7">
            <th>Id</th>
            <th>Nombre</th>
            <th>Tipo de Movimiento</th>
            <th>Cantidad</th>
            <th>Fecha de Movimiento</th>
            <th>Entregado  a: </th>
            <th>Fecha de caducidad</th>   
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>2</td>
            <td>trt</td>
            <td>55</td>
            <td>12-12-12</td>
            <td>4</td>
            <td>23232</td>
            <td>12121</td>   
        </tr>
    </tbody>
</table>

<!--- Inicia script de DataTable --->

<script>
    $(document).ready(function() {
        $('#TablaDetallados').DataTable({
            responsive: true,
            scrollX: true,
            autoWidth: false,
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
            // Otras opciones de configuración si es necesario
            //idioma
            language: {
                info:           "Mostrando _START_ a _END_ de _TOTAL_ registros",
                infoEmpty:      "Mostrando 0 a 0 de 0 registros",
                lengthMenu:     "Mostrar _MENU_ registros",
                search:         "Buscar:",
                loadingRecords: "Loading...",
                processing:     "Procesando...",
                zeroRecords:    "No hay registros aún",
                paginate: {
                    // previous: "Anterior",
                    // next: "Siguiente"
                    next: '→',
                    previous: '←',
                    first:'Inicio',
                    last:'Ultimo'
                },
            },
        });
    });
</script>
