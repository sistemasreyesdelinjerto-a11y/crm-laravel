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
            @include('panel.layouts.footer')

        </div>
    </div>

    <script>lucide.createIcons();</script>
</body>
</html>
