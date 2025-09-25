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
            <th>Stock  actual</th>
            <th>Pendiente por comprar</th>    
            <th>Acciones</th>
        </tr>
    </thead>
    @foreach ($inventarios as $inv)
    <tbody>
        <tr>
            <td>{{ $inv->id }}</td>
            <td>{{ $inv->nombre }}</td>
            <td>{{ $inv->cantidad_minima }}</td>
            <td>{{ $inv->stock }}</td>
            <td>{{ $inv->unidades }}</td>           
            <td>
                aqui van las acciones
            </td>                      
        </tr>
    </tbody>
    @endforeach
</table>
@endif
<!--- Inicia script de DataTable --->

<script>
    $(document).ready(function() {
        $('#TablaGeneral').DataTable({
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

