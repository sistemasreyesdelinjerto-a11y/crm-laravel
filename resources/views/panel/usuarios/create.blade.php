@extends('panel.layouts.panel')

@section('title', 'Crear Usuario')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Crear Usuario</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('panel.usuarios.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Nombre:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2 rounded">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Correo electrónico:</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border p-2 rounded">
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Contraseña:</label>
            <input type="password" name="password" class="w-full border p-2 rounded">
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Rol:</label>
            <select name="role" class="w-full border p-2 rounded">
                <option value="">Selecciona un rol</option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                        {{ ucfirst($role->name) }}
                    </option>
                @endforeach
            </select>
            @error('role') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Crear Usuario</button>
    </form>
</div>
@endsection
