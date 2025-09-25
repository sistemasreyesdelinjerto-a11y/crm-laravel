<header class="fixed top-0 left-0 w-full z-50">
    <nav class="bg-verdeOscuro/95 backdrop-blur-xl shadow-xl">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <!-- Logo -->
            <a href="/"
                class="flex items-center gap-3 font-extrabold text-2xl text-beigeClaro hover:scale-105 transform transition-all duration-300">
                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2c.7 3.4-1.2 5.8-2.7 7.8-1.7 2.3-2.3 3.8-1.3 5.6 1.3 2.5 5.5 2.6 7.5 0 1.5-1.9.5-4.4-1-6.2C13.2 7.8 11.9 6.2 12 4c.1-.8.4-1.4.8-2z" />
                </svg>
                Clínica Capilar Elite
            </a>

            <!-- Menú Desktop -->
            <ul class="hidden md:flex items-center gap-8 text-lg font-semibold text-beigeClaro">
                <li><a href="/"
                        class="hover:text-beigeCalido transition-all duration-300 hover:scale-105">Inicio</a></li>
                <li><a href="#conocenos"
                        class="hover:text-beigeCalido transition-all duration-300 hover:scale-105">Conócenos</a></li>
                <li><a href="#servicios"
                        class="hover:text-beigeCalido transition-all duration-300 hover:scale-105">Servicios</a></li>
                <li><a href="/dr-santana" class="hover:text-beigeCalido transition-all duration-300 hover:scale-105">Dr.
                        Santana</a></li>

                <!-- Dropdown Clínicas Desktop -->
                <li class="relative" id="desktopClinicas">
                    <button
                        class="flex items-center gap-1 hover:text-beigeCalido transition-all duration-300 hover:scale-105">
                        Clínicas ▼
                    </button>
                    <ul id="desktopClinicasList"
                        class="absolute left-1/2 -translate-x-1/2 mt-3 w-60 bg-beigeCalido text-verdeOscuro rounded-3xl shadow-2xl opacity-0 pointer-events-none transition-all duration-300 transform -translate-y-2">
                        <li><a href="{{ route('landing.santafe') }}"
                                class="block px-5 py-3 hover:bg-verdeClaro/20 rounded-xl transition-all duration-300">Santa
                                Fe</a></li>
                        <li><a href="{{ route('landing.pedregal') }}"
                                class="block px-5 py-3 hover:bg-verdeClaro/20 rounded-xl transition-all duration-300">Pedregal</a>
                        </li>
                        <li><a href="{{ route('landing.queretaro') }}"
                                class="block px-5 py-3 hover:bg-verdeClaro/20 rounded-xl transition-all duration-300">Querétaro</a>
                        </li>
                    </ul>
                </li>


                <li><a href="#contacto"
                        class="hover:text-beigeCalido transition-all duration-300 hover:scale-105">Contacto</a></li>
            </ul>

            <!-- Botón destacado -->
            <a href="#contacto"
                class="hidden md:inline-block bg-beigeCalido text-verdeOscuro px-6 py-3 rounded-3xl font-bold shadow-xl hover:bg-verdeClaro hover:text-beigeClaro transition-transform transform hover:-translate-y-1 hover:scale-105">
                Agenda tu Valoración
            </a>

            <!-- Botón menú móvil -->
            <button id="menuBtn"
                class="md:hidden text-3xl text-beigeClaro hover:scale-110 transition-transform">☰</button>
        </div>

        <!-- Menú móvil Overlay -->
        <div id="mobileMenu"
            class="fixed inset-0 bg-verdeOscuro/95 backdrop-blur-xl transition-transform transition-opacity duration-300 z-60 scale-0 opacity-0 overflow-auto">
            <div class="max-w-7xl mx-auto px-6 pt-32 flex flex-col items-center space-y-6 text-2xl text-beigeClaro">
                <a href="/" class="hover:text-beigeCalido transition-all duration-300 hover:scale-105">Inicio</a>
                <a href="#conocenos"
                    class="hover:text-beigeCalido transition-all duration-300 hover:scale-105">Conócenos</a>
                <a href="#servicios"
                    class="hover:text-beigeCalido transition-all duration-300 hover:scale-105">Servicios</a>
                <a href="/dr-santana" class="hover:text-beigeCalido transition-all duration-300 hover:scale-105">Dr.
                    Santana</a>

                <!-- Dropdown Clínicas Móvil -->
                <div class="relative w-full max-w-xs">
                    <button id="clinicasBtn"
                        class="w-full py-3 bg-beigeCalido text-verdeOscuro rounded-3xl font-bold shadow-lg hover:scale-105 transition-transform">
                        Clínicas ▼
                    </button>
                    <ul id="clinicasList"
                        class="mt-2 w-full bg-beigeCalido text-verdeOscuro rounded-3xl shadow-lg transition-all duration-300 hidden">
                        <li><a href="/santafe"
                                class="block px-5 py-3 hover:bg-verdeClaro/20 rounded-xl transition-all duration-300">Santa
                                Fe</a></li>
                        <li><a href="/pedregal"
                                class="block px-5 py-3 hover:bg-verdeClaro/20 rounded-xl transition-all duration-300">Pedregal</a>
                        </li>
                        <li><a href="/queretaro"
                                class="block px-5 py-3 hover:bg-verdeClaro/20 rounded-xl transition-all duration-300">Querétaro</a>
                        </li>
                    </ul>
                </div>

                <a href="#contacto"
                    class="hover:text-beigeCalido transition-all duration-300 hover:scale-105">Contacto</a>
            </div>

            <!-- Botón cerrar -->
            <button id="closeMobileMenu"
                class="absolute top-6 right-6 text-5xl text-beigeClaro hover:scale-110 transition-transform">×</button>
        </div>
    </nav>
</header>

<script>
    // Menú móvil
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMenu = document.getElementById('closeMobileMenu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('scale-0');
        mobileMenu.classList.toggle('scale-100');
        mobileMenu.classList.toggle('opacity-0');
        mobileMenu.classList.toggle('opacity-100');
        document.body.classList.toggle('overflow-hidden');
    });
    closeMenu.addEventListener('click', () => {
        mobileMenu.classList.add('scale-0', 'opacity-0');
        mobileMenu.classList.remove('scale-100', 'opacity-100');
        document.body.classList.remove('overflow-hidden');
    });

    // Dropdown Clínicas móvil
    const clinicasBtn = document.getElementById('clinicasBtn');
    const clinicasList = document.getElementById('clinicasList');

    clinicasBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        clinicasList.classList.toggle('hidden');
    });

    document.addEventListener('click', (e) => {
        if (!clinicasBtn.contains(e.target) && !clinicasList.contains(e.target)) {
            clinicasList.classList.add('hidden');
        }
    });

    // Scroll suave para enlaces internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
            if (mobileMenu.classList.contains('scale-100')) {
                mobileMenu.classList.remove('scale-100');
                mobileMenu.classList.remove('opacity-100');
                mobileMenu.classList.add('scale-0', 'opacity-0');
                document.body.classList.remove('overflow-hidden');
            }
        });
    });

    const desktopClinicas = document.getElementById('desktopClinicas');
    const desktopClinicasList = document.getElementById('desktopClinicasList');

    let dropdownTimeout;

    function openDesktopDropdown() {
        clearTimeout(dropdownTimeout);
        desktopClinicasList.style.opacity = '1';
        desktopClinicasList.style.pointerEvents = 'auto';
        desktopClinicasList.style.transform = 'translateY(0)';
    }

    function closeDesktopDropdown() {
        dropdownTimeout = setTimeout(() => {
            desktopClinicasList.style.opacity = '0';
            desktopClinicasList.style.pointerEvents = 'none';
            desktopClinicasList.style.transform = 'translateY(-0.5rem)';
        }, 200); // espera 200ms antes de cerrar, para que no se cierre al mover rápido
    }

    // Mantener abierto mientras el mouse esté en el <li> o en el <ul>
    desktopClinicas.addEventListener('mouseenter', openDesktopDropdown);
    desktopClinicas.addEventListener('mouseleave', closeDesktopDropdown);
    desktopClinicasList.addEventListener('mouseenter', openDesktopDropdown);
    desktopClinicasList.addEventListener('mouseleave', closeDesktopDropdown);
</script>
