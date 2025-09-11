<section id="trayectoria">
    <h1>Trayectoria</h1>

    <button onclick="abrirModal('createTrayectoriaModal')">+ Nuevo</button>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trayectorias as $t)
                <tr>
                    <td>{{ $t->titulo }}</td>
                    <td>{{ $t->descripcion }}</td>
                    <td>
                        <button onclick="abrirModal('editTrayectoriaModal{{ $t->id }}')">Editar</button>
                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modales fuera de la tabla --}}
    @foreach($trayectorias as $t)
    <div id="editTrayectoriaModal{{ $t->id }}" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-xl w-1/2">
            <h2>Editar Trayectoria</h2>
            <form action="{{ route('panel.drsantana.trayectoria.update', $t) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="titulo" value="{{ $t->titulo }}">
                <textarea name="descripcion">{{ $t->descripcion }}</textarea>
                <button type="submit">Guardar</button>
                <button type="button" onclick="cerrarModal('editTrayectoriaModal{{ $t->id }}')">Cerrar</button>
            </form>
        </div>
    </div>
    @endforeach

    <div id="createTrayectoriaModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-xl w-1/2">
            <h2>Nueva Trayectoria</h2>
            <form action="{{ route('panel.drsantana.trayectoria.store') }}" method="POST">
                @csrf
                <input type="text" name="titulo" placeholder="Título" required>
                <textarea name="descripcion" placeholder="Descripción" required></textarea>
                <button type="submit">Guardar</button>
                <button type="button" onclick="cerrarModal('createTrayectoriaModal')">Cerrar</button>
            </form>
        </div>
    </div>
</section>

<script>
function abrirModal(id) {
    document.getElementById(id).classList.remove('hidden');
}
function cerrarModal(id) {
    document.getElementById(id).classList.add('hidden');
}
</script>
