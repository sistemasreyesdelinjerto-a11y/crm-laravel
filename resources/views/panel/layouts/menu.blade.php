   <aside
            class="w-64 bg-[#1C6C73] text-white flex flex-col fixed inset-y-0 left-0 transform transition-transform duration-300 ease-in-out z-40 lg:translate-x-0 lg:static lg:inset-0"
            :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }">
            

    <!-- Header -->
    <div class="flex items-center justify-between p-6 border-b border-[#4298A7]">
        <span class="text-xl font-bold text-[#CDAF95]">Clínica Capilar Elite</span>
        <button class="lg:hidden" @click="sidebarOpen=false">
            <i data-lucide="x" class="w-6 h-6"></i>
        </button>
    </div>

    <!-- Navegación -->
    <nav class="p-4 space-y-2 overflow-y-auto h-[calc(100%-4rem)]">

        <!-- Inicio -->
        <a href="{{ route('panel.panel.index') }}"
           class="flex items-center p-2 rounded-lg hover:bg-[#C8BAAF]">
            <i data-lucide="home" class="w-5 h-5 mr-2"></i> Inicio
        </a>

        <!-- Administrativo -->
        <a href="administracion.html"
           class="flex items-center p-2 rounded-lg hover:bg-[#C8BAAF]">
            <i data-lucide="file-text" class="w-5 h-5 mr-2"></i> Administrativo
        </a>

        <!-- Agenda -->
        <div x-data="{ open: false }">
            <button @click="open=!open"
                class="flex items-center w-full p-2 rounded-lg hover:bg-[#C8BAAF]">
                <i data-lucide="calendar" class="w-5 h-5 mr-2"></i> Agenda
                <i :class="open ? 'rotate-180' : ''" data-lucide="chevron-down"
                   class="ml-auto w-4 h-4 transition-transform"></i>
            </button>
            <div x-show="open" class="ml-6 mt-1 space-y-1">
                <a href="agenda_santafe.html" class="block p-2 rounded hover:bg-[#CDAF95]">Santa Fe</a>
                <a href="agenda_pedregal.html" class="block p-2 rounded hover:bg-[#CDAF95]">Pedregal</a>
                <a href="agenda_queretaro.html" class="block p-2 rounded hover:bg-[#CDAF95]">Querétaro</a>
            </div>
        </div>

        <!-- Inventario -->
        <a href="inventario.html"
           class="flex items-center p-2 rounded-lg hover:bg-[#C8BAAF]">
            <i data-lucide="package" class="w-5 h-5 mr-2"></i> Inventario
        </a>

        <!-- Procedimientos -->
        <div x-data="{ open: false }">
            <button @click="open=!open"
                class="flex items-center w-full p-2 rounded-lg hover:bg-[#C8BAAF]">
                <i data-lucide="scissors" class="w-5 h-5 mr-2"></i> Procedimientos
                <i :class="open ? 'rotate-180' : ''" data-lucide="chevron-down"
                   class="ml-auto w-4 h-4 transition-transform"></i>
            </button>
            <div x-show="open" class="ml-6 mt-1 space-y-1">
                <a href="procedimientos.html" class="block p-2 rounded hover:bg-[#CDAF95]">Procedimientos</a>
                <a href="tratamientos.html" class="block p-2 rounded hover:bg-[#CDAF95]">Tratamientos</a>
            </div>
        </div>

        <!-- Ventas -->
        <div x-data="{ open: false }">
            <button @click="open=!open"
                class="flex items-center w-full p-2 rounded-lg hover:bg-[#C8BAAF]">
                <i data-lucide="shopping-cart" class="w-5 h-5 mr-2"></i> Ventas
                <i :class="open ? 'rotate-180' : ''" data-lucide="chevron-down"
                   class="ml-auto w-4 h-4 transition-transform"></i>
            </button>
            <div x-show="open" class="ml-6 mt-1 space-y-1">
                <a href="crear_led.html" class="block p-2 rounded hover:bg-[#CDAF95]">Generar Lead</a>
                <a href="ver_led.html" class="block p-2 rounded hover:bg-[#CDAF95]">Ver Leads</a>
            </div>
        </div>

        <!-- Finanzas -->
        <div x-data="{ open: false }">
            <button @click="open=!open"
                class="flex items-center w-full p-2 rounded-lg hover:bg-[#C8BAAF]">
                <i data-lucide="wallet" class="w-5 h-5 mr-2"></i> Finanzas
                <i :class="open ? 'rotate-180' : ''" data-lucide="chevron-down"
                   class="ml-auto w-4 h-4 transition-transform"></i>
            </button>
            <div x-show="open" class="ml-6 mt-1 space-y-1">
                <a href="gastos.html" class="block p-2 rounded hover:bg-[#CDAF95]">Gastos</a>
                <a href="cortes.html" class="block p-2 rounded hover:bg-[#CDAF95]">Cortes diarios</a>
                <a href="ingresos.html" class="block p-2 rounded hover:bg-[#CDAF95]">Reporte de clínica</a>
                <a href="presupuestos.html" class="block p-2 rounded hover:bg-[#CDAF95]">Presupuestos</a>
                <a href="cortes_caja.html" class="block p-2 rounded hover:bg-[#CDAF95]">Cortes de caja</a>
                <a href="layout.bbva.html" class="block p-2 rounded hover:bg-[#CDAF95]">Layout de BBVA</a>
                <a href="reportes.html" class="block p-2 rounded hover:bg-[#CDAF95]">Reportes</a>
            </div>
        </div>

        <!-- Clientes -->
        <a href="clientes.html" class="flex items-center p-2 rounded-lg hover:bg-[#C8BAAF]">
            <i data-lucide="users" class="w-5 h-5 mr-2"></i> Clientes
        </a>

        <!-- Eventos -->
        <a href="eventos.html" class="flex items-center p-2 rounded-lg hover:bg-[#C8BAAF]">
            <i data-lucide="calendar-days" class="w-5 h-5 mr-2"></i> Eventos
        </a>

        <!-- Marketing -->
        <div x-data="{ open: false }">
            <button @click="open=!open"
                class="flex items-center w-full p-2 rounded-lg hover:bg-[#C8BAAF]">
                <i data-lucide="megaphone" class="w-5 h-5 mr-2"></i> Marketing
                <i :class="open ? 'rotate-180' : ''" data-lucide="chevron-down"
                   class="ml-auto w-4 h-4 transition-transform"></i>
            </button>
            <div x-show="open" class="ml-6 mt-1 space-y-1">
                <a href="#" class="block p-2 rounded hover:bg-[#CDAF95]">Campañas</a>
                <a href="#" class="block p-2 rounded hover:bg-[#CDAF95]">Redes Sociales</a>
                <a href="#" class="block p-2 rounded hover:bg-[#CDAF95]">Email Marketing</a>
            </div>
        </div>

        <!-- Usuarios -->
        <div x-data="{ open: false }">
            <button @click="open=!open"
                class="flex items-center w-full p-2 rounded-lg hover:bg-[#C8BAAF]">
                <i data-lucide="user-cog" class="w-5 h-5 mr-2"></i> Usuarios
                <i :class="open ? 'rotate-180' : ''" data-lucide="chevron-down"
                   class="ml-auto w-4 h-4 transition-transform"></i>
            </button>
            <div x-show="open" class="ml-6 mt-1 space-y-1">
                <a href="roles.html" class="block p-2 rounded hover:bg-[#CDAF95]">Roles</a>
                <a href="crear_usuarios.html" class="block p-2 rounded hover:bg-[#CDAF95]">Nuevo Usuario</a>
                <a href="usuarios.html" class="block p-2 rounded hover:bg-[#CDAF95]">Usuarios</a>
            </div>
        </div>

        <!-- Monitoreo -->
        <div x-data="{ open: false }">
            <button @click="open=!open"
                class="flex items-center w-full p-2 rounded-lg hover:bg-[#C8BAAF]">
                <i data-lucide="activity" class="w-5 h-5 mr-2"></i> Monitoreo
                <i :class="open ? 'rotate-180' : ''" data-lucide="chevron-down"
                   class="ml-auto w-4 h-4 transition-transform"></i>
            </button>
            <div x-show="open" class="ml-6 mt-1 space-y-1">
                <a href="logeos.html" class="block p-2 rounded hover:bg-[#CDAF95]">Logs</a>
                <a href="alertas.html" class="block p-2 rounded hover:bg-[#CDAF95]">Alertas</a>
            </div>
        </div>

        <!-- Sitio Web -->
        <a href="{{ route('panel.landing.index') }}"
           class="flex items-center p-2 rounded-lg hover:bg-[#C8BAAF]">
            <i data-lucide="globe" class="w-5 h-5 mr-2"></i> Sitio Web
        </a>

    </nav>
</aside>
