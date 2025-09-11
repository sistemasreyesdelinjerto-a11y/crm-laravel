@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Crear Usuario</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <!-- Nombre -->
        <div class="mb-3">
            <label class="block mb-1">Nombre</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="block mb-1">Email</label>
            <input type="email" name="email" class="w-full border rounded p-2" required>
        </div>

        <!-- Contraseña -->
        <div class="mb-3">
            <label class="block mb-1">Contraseña</label>
            <input type="password" name="password" class="w-full border rounded p-2" required>
        </div>

        <!-- Rol -->
        <div class="mb-3">
            <label class="block mb-1">Rol</label>
            <select name="role" class="w-full border rounded p-2" required>
                <option value="">Selecciona un rol</option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Crear Usuario
        </button>
    </form>
</div>
@endsection
