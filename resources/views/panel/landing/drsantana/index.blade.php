@extends('panel.layouts.panel')

@section('title', 'Panel Dr. Santana')


@section('content')
<section class="py-10 px-6 bg-white">
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Gestión de Landing Page del Dr. Santana</h1>

    <!-- Grid de botones para abrir modales -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Botón Blog -->
        <button 
            onclick="openModal('blogModal')" 
            class="bg-[#1C6C73] text-white p-6 rounded-lg shadow-md hover:bg-[#4298A7] transition-colors flex flex-col items-center justify-center"
        >
            <span class="text-4xl mb-3">📝</span>
            <h2 class="text-xl font-semibold">Gestión de Blog</h2>
            <p class="text-blue-100 mt-2">Administrar artículos del blog</p>
        </button>

        <!-- Botón Trayectoria -->
        <button 
            onclick="openModal('trayectoriaModal')" 
            class="bg-[#1C6C73] text-white p-6 rounded-lg shadow-md hover:bg-[#4298A7] transition-colors flex flex-col items-center justify-center"
        >
            <span class="text-4xl mb-3">🎓</span>
            <h2 class="text-xl font-semibold">Trayectoria</h2>
            <p class="text-green-100 mt-2">Editar información profesional</p>
        </button>

        <!-- Botón Galería -->
        <button 
            onclick="openModal('galeriaModal')" 
            class="bg-[#1C6C73] text-white p-6 rounded-lg shadow-md hover:bg-[#4298A7] transition-colors flex flex-col items-center justify-center"
        >
            <span class="text-4xl mb-3">📸</span>
            <h2 class="text-xl font-semibold">Galería</h2>
            <p class="text-purple-100 mt-2">Gestionar imágenes</p>
        </button>
    </div>

    <!-- Resumen de contenido existente -->
    <div class="mt-8 bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Resumen del Contenido</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="text-center p-4 bg-[#DED5CE] rounded-lg">
                <span class="text-2xl">📝</span>
                <p class="font-semibold">5 Artículos</p>
                <p class="text-sm text-gray-600">en el blog</p>
            </div>
            <div class="text-center p-4 bg-[#DED5CE] rounded-lg">
                <span class="text-2xl">🎓</span>
                <p class="font-semibold">Información</p>
                <p class="text-sm text-gray-600">de trayectoria</p>
            </div>
            <div class="text-center p-4 bg-[#DED5CE] rounded-lg">
                <span class="text-2xl">📸</span>
                <p class="font-semibold">12 Imágenes</p>
                <p class="text-sm text-gray-600">en galería</p>
            </div>
        </div>
    </div>
</div>

<!-- Incluir los modales -->
    @include('panel.landing.drsantana.blog')
    @include('panel.landing.drsantana.trayectoria')
    @include('panel.landing.drsantana.galeria')
</section>

@endsection
