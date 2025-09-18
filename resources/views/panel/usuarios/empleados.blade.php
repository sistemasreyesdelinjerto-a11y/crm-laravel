@extends('panel.layouts.panel')

@section('title', 'Empleados')

@section('content')
<div x-data="{ editModal: null, deleteModal: null, fotoPreview: '' }" class="p-6 bg-white shadow rounded-lg">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold text-gray-700">Empleados</h1>
        <button @click="editModal = 'create'; fotoPreview=''"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Agregar Empleado
        </button>
    </div>

    <div class="overflow-x-auto">
        <table id="empleadosTable" class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Apellido</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Puesto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Usuario CRM</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($empleados as $empleado)
                <tr>
                    <td class="px-6 py-4">
                        @if($empleado->foto)
                            <img src="{{ asset('storage/'.$empleado->foto) }}" class="w-10 h-10 rounded-full">
                        @else
                            <span class="text-gray-400">Sin foto</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">{{ $empleado->nombre }}</td>
                    <td class="px-6 py-4">{{ $empleado->apellido }}</td>
                    <td class="px-6 py-4">{{ $empleado->puesto }}</td>
                    <td class="px-6 py-4">{{ $empleado->user ? $empleado->user->name : 'No asignado' }}</td>
                    <td class="px-6 py-4 flex gap-2">
                        <button @click="editModal={{ $empleado->id }}; fotoPreview='{{ $empleado->foto ? asset('storage/'.$empleado->foto) : '' }}'"
                                class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</button>
                        <button @click="deleteModal={{ $empleado->id }}"
                                class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Crear/Editar Modal --}}
<div x-show="editModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white rounded-2xl shadow-md w-full max-w-2xl p-6 overflow-y-auto max-h-[90vh]">
        <h2 class="text-xl font-bold mb-4" x-text="editModal==='create' ? 'Agregar Empleado' : 'Editar Empleado'"></h2>
        <form :action="editModal==='create' ? '{{ route('panel.empleados.store') }}' : '/empleados/'+editModal"
              method="POST" enctype="multipart/form-data">
            @csrf
            <template x-if="editModal !== 'create'">
                <input type="hidden" name="_method" value="PUT">
            </template>

            <div class="grid grid-cols-2 gap-4 mb-3">
                <div>
                    <label class="block mb-1">Nombre</label>
                    <input type="text" name="nombre" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label class="block mb-1">Apellido</label>
                    <input type="text" name="apellido" class="w-full p-2 border rounded">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-3">
                <div>
                    <label class="block mb-1">Puesto</label>
                    <input type="text" name="puesto" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label class="block mb-1">Departamento</label>
                    <input type="text" name="departamento" class="w-full p-2 border rounded">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-3">
                <div>
                    <label class="block mb-1">Usuario CRM</label>
                    <select name="user_id" class="w-full p-2 border rounded">
                        <option value="">No asignado</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Estatus</label>
                    <select name="estatus" class="w-full p-2 border rounded">
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-3">
                <div>
                    <label class="block mb-1">Fecha de ingreso</label>
                    <input type="date" name="fecha_ingreso" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label class="block mb-1">Teléfono</label>
                    <input type="text" name="telefono" class="w-full p-2 border rounded">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-3">
                <div>
                    <label class="block mb-1">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label class="block mb-1">Identificación</label>
                    <input type="text" name="identificacion" class="w-full p-2 border rounded">
                </div>
            </div>

            <div class="mb-3">
                <label class="block mb-1">Dirección</label>
                <textarea name="direccion" class="w-full p-2 border rounded"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-3">
                <div>
                    <label class="block mb-1">Contacto de emergencia - Nombre</label>
                    <input type="text" name="emergencia_nombre" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label class="block mb-1">Contacto de emergencia - Teléfono</label>
                    <input type="text" name="emergencia_telefono" class="w-full p-2 border rounded">
                </div>
            </div>

            <div class="mb-3">
                <label class="block mb-1">Notas</label>
                <textarea name="notas" class="w-full p-2 border rounded"></textarea>
            </div>

            <div class="mb-3">
                <label class="block mb-1">Foto</label>
                <input type="file" name="foto" class="w-full p-2 border rounded" @change="fotoPreview = URL.createObjectURL($event.target.files[0])">
                <template x-if="fotoPreview">
                    <img :src="fotoPreview" class="w-24 h-24 rounded-full mt-2">
                </template>
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" @click="editModal = null" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Guardar</button>
            </div>

        </form>
    </div>
</div>

    {{-- Eliminar Modal --}}
    <div x-show="deleteModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-2xl shadow-md w-full max-w-sm p-6">
            <h2 class="text-xl font-bold mb-4">Eliminar Empleado</h2>
            <p>¿Deseas eliminar a este empleado?</p>
            <div class="flex justify-end gap-2 mt-4">
                <form :action="'/empleados/'+deleteModal" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Eliminar</button>
                </form>
                <button @click="deleteModal = null" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#empleadosTable').DataTable({
            paging: true,
            searching: true,
            info: false,
        });
    });
</script>
@endpush
