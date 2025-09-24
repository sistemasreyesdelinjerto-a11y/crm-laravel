<table id="TablaGeneral" class="table table-striped table-bordered display">
    <thead class="bg-gray-dark color-palette">
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
        <tr>
            <td>23</td>
            <td>Cefadroxilo</td>
            <td>23</td>
            <td>5656</td>
            <td>65</td>           
            <td>a</td>                      
        </tr>
        <tr>
            <td>2</td>
            <td>Lidocaina</td>
            <td>253</td>
            <td>100</td>
            <td>654</td>           
            <td>as</td>                      
        </tr>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#TablaGeneral').DataTable({
            responsive: false,
            scrollX: true,
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