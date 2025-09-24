@extends('panel.layouts.panel')

@section('title', 'Gestión de Inventario')


@section('content')
    <section class="py-10 px-6 bg-white">
    <h1 class="text-2xl font-bold mb-4">Vista general de inventario</h1>
    <p>Aquí puedes gestionar el inventario de productos.</p>
        <br><br>
    <!-- Encabezado de pagina Dropdown -->
        <div class="w-full flex justify-end mb-6">
            <div x-data="{ open: false }" class="relative">
                <!-- Botón -->
                <button @click="open = !open"
                class="bg-[#1C6C73] text-white px-4 py-2 rounded-lg shadow hover:bg-[#14565c] flex items-center space-x-2">
                <span>Clínica</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                </button>

                <!-- Dropdown -->
                <ul x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-lg py-1 z-50">
                <li>
                    <a href="#" data-clinic="Santa Fe"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition item_clinic" selected>
                    Santa Fe
                    </a>
                </li>
                <li>
                    <a href="#" data-clinic="Queretaro"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition item_clinic">
                    Querétaro
                    </a>
                </li>
                </ul>
            </div>
        </div>
    <!-- Termina encabezado de pagina Dropdown -->

    <!-- Inicia el apartado de acciones del inventario -->
        <div class="flex space-x-3 items-center justify-end">
        <!-- Botón Add -->
        <button  onclick="openModal('productMovementModal')" 
            class="bg-[#1C6C73] hover:bg-[#14565c] text-white p-2 rounded-full shadow-md transition">
            <svg xmlns="http://www.w3.org/2000/svg"
                width="24" height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="white"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="block">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
        </button>

        <!-- Botón Procedimientos -->
        <button 
            onclick="openModal('quickExitModal')" 
            class="border border-green-600 text-green-600 px-4 py-2 rounded-lg hover:bg-green-50 transition-colors font-medium"
        >
            Procedimientos medicos
        </button>

        <!-- Botón Editar Kit -->
        <button 
            onclick="openModal('kitModal')" 
            class="bg-[#1C6C73] text-white px-3 py-2 rounded-lg hover:bg-[#14565c]"
        >
            Editar Kit
        </button>
        </div>

        <!-- Termina el apartado de acciones del inventario -->

        <!-- Inicia modal de kit -->
        @include('crm.inventario.kitModal')
        <!-- Termina modal de kit -->

        <!-- Inicia modal de Procedimientos medicos-->
            @include('crm.inventario.proceModal')
        <!-- Termina modal de Procedimientos medicos-->

        <!-- Inicia modal de movimiento de productos -->
        @include('crm.inventario.moviModal')
        <!-- Termina modal de movimiento de productos -->

        <!-- Tabla de inventario -->

            <div class="mt-6">
            <!-- Navegación de Tabs -->
            <div class="border-b border-gray-200">
                <nav class="flex space-x-8" aria-label="Tabs">
                    <button
                        id="tab-1"
                        class="tab-button py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 transition-colors"
                        onclick="switchTab(1)"
                    >
                        Vista general
                    </button>
                    <button
                        id="tab-2"
                        class="tab-button py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 transition-colors"
                        onclick="switchTab(2)"
                    >
                        Movimientos Detallados
                    </button>
                    <button
                        id="tab-3"
                        class="tab-button py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 transition-colors"
                        onclick="switchTab(3)"
                    >
                        Medicamentos
                    </button>
                </nav>
            </div>

            <!-- Contenido de los Tabs -->
            <div class="mt-4">
                <!-- Tab 1: Productos en Stock -->
                <div id="tab-content-1" class="tab-content">
                    @include('crm.inventario.tablageneral')
                </div>

                <!-- Tab 2: Stock Bajo -->
                <div id="tab-content-2" class="tab-content hidden">
                    @include('crm.inventario.tablaDetallados')
                </div>

                <!-- Tab 3: Todos los Productos -->
                <div id="tab-content-3" class="tab-content hidden">
                    @include('crm.inventario.tablaMedicamentos')
                </div>
            </div>
        </div>

        <script>
        function switchTab(tabNumber) {
            // Ocultar todos los contenidos de tabs
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.add('hidden');
            });
            
            // Mostrar el tab seleccionado
            document.getElementById(`tab-content-${tabNumber}`).classList.remove('hidden');
            
            // Actualizar estilos de los botones
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active', 'border-[#1C6C73]', 'text-[#1C6C73]');
                button.classList.add('border-transparent', 'text-gray-500');
            });
            
            // Aplicar estilos al botón activo
            const activeButton = document.getElementById(`tab-${tabNumber}`);
            activeButton.classList.add('active', 'border-[#1C6C73]', 'text-[#1C6C73]');
            activeButton.classList.remove('border-transparent', 'text-gray-500');
        }

        // Inicializar el primer tab al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            switchTab(1);
        });
        </script>


    </section>
   
 @endsection   