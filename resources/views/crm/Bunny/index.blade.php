{{-- o tu layout base --}}
@section('content')

<div class="container mt-4">
    <h3>Archivos del paciente #{{ $lead_id }}</h3>

    {{-- Formulario para subir archivo --}}
    <form id="formSubir" enctype="multipart/form-data" class="mb-4">
        @csrf
        <input type="hidden" name="lead_id" value="{{ $lead_id }}">
        <div class="row g-2 align-items-center">
            <div class="col-md-6">
                <input type="file" name="archivo" id="archivo" class="form-control" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Subir</button>
            </div>
        </div>
    </form>

    {{-- Tabla de archivos --}}
    <table id="tablaArchivos" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nombre del archivo</th>
                <th>Tamaño</th>
                <th>Última modificación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {{-- Se llenará con AJAX --}}
        </tbody>
    </table>
</div>

{{-- Script con AJAX --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabla = document.querySelector('#tablaArchivos tbody');
    const leadId = "{{ $lead_id }}";

    // 🔹 Cargar archivos al iniciar
    cargarArchivos();

    // 🔹 Subir archivo
    document.getElementById('formSubir').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch('{{ route("bunny.subir") }}', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert('Archivo subido correctamente');
                cargarArchivos();
                this.reset();
            } else {
                alert('Error: ' + data.error);
            }
        });
    });

    // 🔹 Función para cargar archivos desde Bunny
    function cargarArchivos() {
        fetch(`/bunny/listar/${leadId}`)
            .then(res => res.json())
            .then(data => {
                tabla.innerHTML = '';
                if (Array.isArray(data)) {
                    data.forEach(file => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${file.ObjectName}</td>
                            <td>${(file.Length / 1024).toFixed(2)} KB</td>
                            <td>${new Date(file.LastChanged).toLocaleString()}</td>
                            <td>
                                <a href="/bunny/mostrar/${leadId}/${encodeURIComponent(file.ObjectName)}" target="_blank" class="btn btn-sm btn-success">Ver</a>
                                <button class="btn btn-sm btn-danger btnEliminar" data-nombre="${file.ObjectName}">Eliminar</button>
                            </td>
                        `;
                        tabla.appendChild(tr);
                    });
                }
            });
    }

    // 🔹 Eliminar archivo
    tabla.addEventListener('click', function(e) {
        if (e.target.classList.contains('btnEliminar')) {
            const archivo = e.target.dataset.nombre;
            if (confirm(`¿Eliminar el archivo "${archivo}"?`)) {
                fetch(`/bunny/borrar/${leadId}/${encodeURIComponent(archivo)}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert('Archivo eliminado correctamente');
                        cargarArchivos();
                    } else {
                        alert('Error al eliminar: ' + data.error);
                    }
                });
            }
        }
    });
});
</script>

@endsection
