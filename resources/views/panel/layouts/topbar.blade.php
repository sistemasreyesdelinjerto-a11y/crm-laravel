<header x-data="{ sidebarOpen: false, navOpen: false, darkMode: false }" class="bg-white dark:bg-gray-800 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16 items-center">
        <!-- Izquierda: hamburguesa y título -->
        <div class="flex items-center space-x-2">
            <button class="lg:hidden p-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700" @click="sidebarOpen = true">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <h1 class="text-lg font-semibold">@yield('title', 'Dashboard')</h1>
        </div>

        <!-- Derecha: dark mode y avatar -->
        <div class="flex items-center space-x-4">
            <button @click="darkMode = !darkMode" class="p-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                <i data-lucide="moon" x-show="!darkMode" class="w-5 h-5"></i>
                <i data-lucide="sun" x-show="darkMode" class="w-5 h-5"></i>
            </button>

            <!-- Dropdown usuario -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-2">
                    <img src="https://i.pravatar.cc/40" class="rounded-full w-8 h-8" />
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" @click.away="open=false" x-transition class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 shadow-lg rounded-md py-2">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">Log Out</button>
                    </form>
                </div>
            </div>

            <!-- Hamburger responsive nav (solo móviles) -->
            <div class="sm:hidden">
                <button @click="navOpen = !navOpen" class="p-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': navOpen, 'inline-flex': !navOpen}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !navOpen, 'inline-flex': navOpen}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div x-show="navOpen" @click.away="navOpen=false" x-transition class="sm:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Dashboard</a>
        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Log Out</button>
        </form>
    </div>
</header>
