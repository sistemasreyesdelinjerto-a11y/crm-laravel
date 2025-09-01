<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'CRM Clínica Capilar Elite')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-[#DED5CE] text-gray-800" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen overflow-hidden">


        {{-- Sidebar --}}
        @include('panel.layouts.menu')

        {{-- Contenedor Principal --}}
        <div class="flex flex-col flex-1 overflow-hidden">

            {{-- Topbar --}}
            @include('panel.layouts.topbar')

            {{-- Contenido dinámico --}}
            <main class="flex-1 overflow-y-auto p-6 bg-[#DED5CE]">
                @yield('content')
            </main>

            {{-- Footer --}}
            <footer class="p-4 bg-[#1C6C73] text-white shadow text-center text-sm">
                © 2025 Clínica Capilar Elite - CRM
            </footer>
        </div>
    </div>

    <script>lucide.createIcons();</script>
</body>
</html>
