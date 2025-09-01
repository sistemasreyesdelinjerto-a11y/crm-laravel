<header class="flex items-center justify-between p-4 bg-white dark:bg-gray-800 shadow-md">
    <div class="flex items-center space-x-2">
        <button class="lg:hidden" @click="sidebarOpen=true">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
        <h1 class="text-lg font-semibold">@yield('title', 'Dashboard')</h1>
    </div>
    <div class="flex items-center space-x-4">
        <button @click="darkMode=!darkMode" class="p-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
            <i data-lucide="moon" x-show="!darkMode" class="w-5 h-5"></i>
            <i data-lucide="sun" x-show="darkMode" class="w-5 h-5"></i>
        </button>
        <img src="https://i.pravatar.cc/40" class="rounded-full w-8 h-8" />
    </div>
</header>
