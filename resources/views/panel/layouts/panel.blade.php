<!DOCTYPE html>
<html lang="es" x-data="{ darkMode: false, sidebarOpen: false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'CRM Clínica Capilar Elite')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Importar fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <!-- Scripts de datatables (Son muchos xd) -->
    <!-- jQuery (requerido por DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables principal -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Botones de exportación (Excel / PDF) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    <!-- DateTime picker para filtros de fecha -->
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>

    <!-- estilos de los botones de pdf y excel -->
    <style>
        .dt-button.bg-green-600 {
            background-color: #16a34a !important; /* tailwind green-600 */
            color: #fff !important;
        }
        .dt-button.bg-red-600 {
            background-color: #dc2626 !important; /* tailwind red-600 */
            color: #fff !important;
        }
    </style>
    <!-- Datatables moment date time picker -->
    <style>
    /* ocultar modales hasta que el tonto de alpine los carge bien */
    [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#DED5CE] ">
    <div class="flex h-screen overflow-hidden">

        {{-- Sidebar --}}
        @include('panel.layouts.menu')

        {{-- Contenido principal --}}
        <div class="flex flex-col flex-1 overflow-hidden">

            {{-- Topbar --}}
            @include('panel.layouts.topbar')

            {{-- Contenido principal --}}
            <main class="flex-1 overflow-y-auto p-6 z-index-0">
                {{-- Contenido de cada página --}}
                @yield('content')
            </main>

            {{-- Footer --}}

        </div>
    </div>
    <!-- Mas Scripts de datatables ajajs-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">

    <script>lucide.createIcons();</script>
</body>
</html>
