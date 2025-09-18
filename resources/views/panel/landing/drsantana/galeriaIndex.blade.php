<!-- Sección de Galería con Carrusel Simplificado -->
<section id="galeria" class="py-10 px-6 bg-gradient-to-r from-gray-100 via-white to-gray-100 mt-8">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Título y botón Crear -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-[#1C6C73]">Galería</h1>
            <button onclick="openModal('createGaleriaModal')"
                class="bg-[#1C6C73] text-white px-4 py-2 rounded-lg hover:bg-[#14565c] transition">
                📸 Agregar Imagen
            </button>
        </div>

        @if($galerias->isEmpty())
            <div class="text-center py-12 bg-white rounded-lg shadow">
                <div class="text-6xl mb-4">🖼️</div>
                <p class="text-gray-600 text-lg">No hay imágenes en la galería.</p>
                <p class="text-gray-500">Agrega la primera imagen para comenzar.</p>
            </div>
        @else
            <!-- Contenedor del carrusel -->
            <div class="relative">
                <!-- Botón Izquierda - Siempre visible -->
                <button onclick="scrollLeftGaleria()"
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-4 bg-[#1C6C73] text-white p-3 rounded-full shadow hover:bg-[#14565c] z-10">
                    ‹
                </button>

                <!-- Scroll horizontal -->
                <div id="galeriaScrollContainer"
                    class="flex overflow-x-auto space-x-6 scrollbar-hide scroll-smooth py-4 select-none cursor-grab active:cursor-grabbing">
                    @foreach ($galerias as $galeria)
                        <div class="flex-shrink-0 w-72">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow h-full">
                                <div class="relative group">
                                 @if($galeria->tipo == 'video')
                                    <video class="w-full h-48 object-cover" controls>
                                        <source src="{{ asset($galeria->imagen) }}" type="video/mp4">
                                        Tu navegador no soporta videos.
                                    </video>
                                @else
                                    <img src="{{ asset($galeria->imagen) }}"
                                        alt="Imagen de galería"
                                        class="w-full h-48 object-cover">
                                @endif

                                    <!-- Overlay con botones -->
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-opacity flex items-center justify-center opacity-0 group-hover:opacity-100">
                                        <button onclick="openEditGaleriaModal({{ $galeria->id }}, '{{ $galeria->titulo }}', '{{ $galeria->descripcion }}', '{{ $galeria->imagen }}')"
                                                class="bg-blue-500 text-white p-2 rounded-full mx-1 hover:bg-blue-600">
                                            ✏️
                                        </button>
                                        <button onclick="deleteGaleria({{ $galeria->id }})"
                                                class="bg-red-500 text-white p-2 rounded-full mx-1 hover:bg-red-600">
                                            🗑️
                                        </button>
                                    </div>
                                </div>

                                <div class="p-4">
                                    <h3 class="font-semibold text-[#1C6C73]">{{ $galeria->titulo }}</h3>
                                    @if($galeria->descripcion)
                                        <p class="text-gray-600 text-sm mt-1 line-clamp-2">{{ $galeria->descripcion }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Botón Derecha - Siempre visible -->
                <button onclick="scrollRightGaleria()"
                    class="absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-4 bg-[#1C6C73] text-white p-3 rounded-full shadow hover:bg-[#14565c] z-10">
                    ›
                </button>
            </div>
        @endif
    </div>
</section>

<!-- Incluir modales de galería -->
@include('panel.landing.drsantana.modales.galeria-create')
@include('panel.landing.drsantana.modales.galeria-edit')
<script>
// ======== Funciones de modal ========
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) modal.classList.remove('hidden');
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) modal.classList.add('hidden');
}

// ======== Carrusel Galería ========
let isDraggingGaleria = false;
let startXGaleria = 0;
let scrollLeftGaleria = 0;

const galeriaContainer = document.getElementById('galeriaScrollContainer');

if (galeriaContainer) {
    // Botones
    window.scrollLeftGaleria = () => galeriaContainer.scrollBy({ left: -300, behavior: 'smooth' });
    window.scrollRightGaleria = () => galeriaContainer.scrollBy({ left: 300, behavior: 'smooth' });

    // Mouse
    galeriaContainer.addEventListener('mousedown', (e) => {
        isDraggingGaleria = true;
        startXGaleria = e.pageX - galeriaContainer.offsetLeft;
        scrollLeftGaleria = galeriaContainer.scrollLeft;
        galeriaContainer.style.cursor = 'grabbing';
    });
    galeriaContainer.addEventListener('mouseleave', () => {
        isDraggingGaleria = false;
        galeriaContainer.style.cursor = 'grab';
    });
    galeriaContainer.addEventListener('mouseup', () => {
        isDraggingGaleria = false;
        galeriaContainer.style.cursor = 'grab';
    });
    galeriaContainer.addEventListener('mousemove', (e) => {
        if (!isDraggingGaleria) return;
        e.preventDefault();
        const x = e.pageX - galeriaContainer.offsetLeft;
        const walk = (x - startXGaleria) * 2;
        galeriaContainer.scrollLeft = scrollLeftGaleria - walk;
    });

    // Touch
    galeriaContainer.addEventListener('touchstart', (e) => {
        startXGaleria = e.touches[0].pageX - galeriaContainer.offsetLeft;
        scrollLeftGaleria = galeriaContainer.scrollLeft;
    });
    galeriaContainer.addEventListener('touchmove', (e) => {
        if (e.touches.length !== 1) return;
        const x = e.touches[0].pageX - galeriaContainer.offsetLeft;
        const walk = (x - startXGaleria) * 1.5;
        galeriaContainer.scrollLeft = scrollLeftGaleria - walk;
    });
}

// ======== Editar Galería ========
let currentGaleriaId = null;

function openEditGaleriaModal(id, titulo, descripcion, imagen) {
    currentGaleriaId = id;
    document.getElementById('editGaleriaId').value = id;
    document.getElementById('editGaleriaTitulo').value = titulo || '';
    document.getElementById('editGaleriaDescripcion').value = descripcion || '';
    openModal('editGaleriaModal');
}

// ======== Eliminar Galería ========
function deleteGaleria(id) {
    if (!confirm('¿Estás seguro de que deseas eliminar esta imagen?')) return false;

    const formData = new FormData();
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('_method', 'DELETE');

    fetch(`/panel/doctor-santana/galeria/${id}`, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            showNotification('Imagen eliminada correctamente', 'success');
            setTimeout(() => window.location.reload(), 1000);
        } else {
            throw new Error(result.message || 'Error al eliminar');
        }
    })
    .catch(error => {
        showNotification('Error: ' + error.message, 'error');
    });
}
</script>


<style>
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
