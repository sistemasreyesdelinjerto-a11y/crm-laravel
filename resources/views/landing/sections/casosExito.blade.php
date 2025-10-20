<!-- Sección: Casos de éxito -->
<section class="py-20 bg-gradient-to-b from-gray-100 via-white to-gray-100">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-verdeOscuro mb-6">
           ¡Estos son algunos de nuestros miles de casos de exíto!
        </h2>

        <!-- Carrusel -->
        @if ($casos->isEmpty())
            <p>No hay casos de éxito disponibles.</p>
        @else
            <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($casos as $cas)
                    <div class="swiper-slide bg-white rounded-xl shadow-lg p-6">
                        <img src="{{ asset($cas->imagen) }}" alt="{{ $cas->titulo }}"
                            class="w-full h-72 md:h-80 object-cover rounded-xl shadow-md">

                        <p class="mt-3 font-semibold text-verdeOscuro text-lg">{{ $cas->titulo }}</p>

                        <!-- Descripción (colapsada por defecto) -->
                        <p class="text-gray-600 mt-2 description preserve-lines">
                            {{ $cas->descripcion }}
                        </p>

                        <button class="text-[#1C6C73] font-semibold mt-2 ver-mas hover:underline">
                            Ver más
                        </button>
                    </div>
                @endforeach
            </div>

            <!-- Botones de navegación -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- Paginación -->
            <div class="swiper-pagination"></div>
        </div>
        @endif

    </div>
</section>

<!-- Importar Swiper -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Estilos personalizados -->
<style>
/* descripción colapsada / expandida */
.description {
    max-height: 4.5rem; /* altura aproximada para ~3 líneas */
    overflow: hidden;
    transition: max-height 0.35s ease-in-out, opacity 0.25s ease-in-out;
    opacity: 1;
}

/* cuando esté expandida */
.description.expanded {
    max-height: 1000px; /* suficientemente grande */
}

/* conservar saltos de línea */
.preserve-lines {
    white-space: pre-line;
}

/* Paginación (bullets) */
.swiper-pagination {
    bottom: -30px !important; /* bajarlos */
}

.swiper-pagination-bullet {
    width: 14px !important;
    height: 14px !important;
    background: #1C6C73 !important;
    opacity: 0.4 !important;
    transition: all 0.25s ease;
}

.swiper-pagination-bullet-active {
    width: 18px !important;
    height: 18px !important;
    background: #9d7e4f !important;
    opacity: 1 !important;
}

/* Flechas personalizadas */
.swiper-button-next,
.swiper-button-prev {
    color: #1C6C73 !important;
    background: rgba(28,108,115,0.06);
    width: 40px;
    height: 40px;
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
}

/* Ajustes responsivos si quieres slides más altos en desktop */
.swiper-slide img {
    transition: transform .3s ease;
}
</style>

<!-- Script: inicializar Swiper + Ver más/más abajo -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Inicializar Swiper con autoHeight para que el contenedor ajuste cuando el contenido cambie
    const swiper = new Swiper(".mySwiper", {
        loop: true,
        autoHeight: true, // <-- muy importante
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        }
    });

    // Delegación: manejar clicks en botones "Ver más"
    document.querySelectorAll('.mySwiper').forEach(container => {
        container.addEventListener('click', function (e) {
            const btn = e.target.closest('.ver-mas');
            if (!btn) return;

            // Buscar el slide actual (el botón está dentro de una .swiper-slide)
            const slide = btn.closest('.swiper-slide');
            if (!slide) return;

            const desc = slide.querySelector('.description');
            if (!desc) return;

            // Alternar clase expandida
            desc.classList.toggle('expanded');

            // Cambiar texto del botón
            if (desc.classList.contains('expanded')) {
                btn.textContent = 'Ver menos';
            } else {
                btn.textContent = 'Ver más';
            }

            // Esperar la transición y luego actualizar la altura del Swiper
            // Usamos setTimeout con un pequeño retraso para que la transición comience
            setTimeout(() => {
                // Preferimos updateAutoHeight si existe, si no, fallback a update()
                if (typeof swiper.updateAutoHeight === 'function') {
                    try {
                        swiper.updateAutoHeight(300); // opcional: duración del cálculo
                    } catch (err) {
                        swiper.update();
                    }
                } else {
                    swiper.update();
                }
            }, 10);
        });
    });

    // Cuando Swiper cambia de slide, podemos asegurarnos que botones reflejen el estado
    swiper.on('slideChange', function () {
        // quitar estado expanded de clones/otras slides para evitar inconsistencias visuales
        document.querySelectorAll('.description.expanded').forEach(el => {
            // si la slide no está activa, colapsarla
            const slide = el.closest('.swiper-slide');
            if (!slide.classList.contains('swiper-slide-active')) {
                el.classList.remove('expanded');
                const btn = slide.querySelector('.ver-mas');
                if (btn) btn.textContent = 'Ver más';
            }
        });
        // actualizar altura por si cambió contenido
        if (typeof swiper.updateAutoHeight === 'function') {
            try { swiper.updateAutoHeight(); } catch(e){ swiper.update(); }
        } else { swiper.update(); }
    });
});
</script>
