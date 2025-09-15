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

    {{-- Contenido principal --}}
    <div class="flex-1 overflow-auto">
        @yield('content')
    </div>

</div>

        <script>lucide.createIcons();</script>
    </body>
    </html>
