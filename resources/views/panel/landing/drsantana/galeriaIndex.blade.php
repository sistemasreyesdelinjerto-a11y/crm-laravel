<!-- Sección de Galería con Carrusel -->
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

        @if ($galerias->isEmpty())
            <div class="text-center py-12 bg-white rounded-lg shadow">
                <div class="text-6xl mb-4">🖼️</div>
                <p class="text-gray-600 text-lg">No hay imágenes en la galería.</p>
                <p class="text-gray-500">Agrega la primera imagen para comenzar.</p>
            </div>
        @else
            <!-- Contenedor del carrusel -->
            <div class="relative">
                <!-- Botón Izquierda -->
                <button onclick="scrollLeftGaleria()"
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-4 bg-[#1C6C73] text-white p-3 rounded-full shadow hover:bg-[#14565c] z-10">
                    ‹
                </button>

                <!-- Scroll horizontal -->
                <div id="galeriaScrollContainer"
                    class="flex overflow-x-auto space-x-6 scrollbar-hide scroll-smooth py-4 select-none cursor-grab active:cursor-grabbing">
                    @foreach ($galerias as $galeria)
                        <div class="flex-shrink-0 w-72">
                            <div
                                class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow h-full">
                                <div class="relative group">
                                    @if ($galeria->tipo == 'video')
                                        <video class="w-full h-48 object-cover" controls>
                                            <source src="{{ asset($galeria->imagen) }}" type="video/mp4">
                                            Tu navegador no soporta videos.
                                        </video>
                                    @else
                                        <img src="{{ asset($galeria->imagen) }}" alt="Imagen de galería"
                                            class="w-full h-48 object-cover">
                                    @endif

                                    <!-- Overlay con botones -->
                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-opacity flex items-center justify-center opacity-0 group-hover:opacity-100">
                                        <button
                                            onclick="openEditGaleriaModal({{ $galeria->id }}, '{{ $galeria->titulo }}', '{{ $galeria->descripcion }}')"
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
                                    @if ($galeria->descripcion)
                                        <p class="text-gray-600 text-sm mt-1 line-clamp-2">{{ $galeria->descripcion }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Botón Derecha -->
                <button onclick="scrollRightGaleria()"
                    class="absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-4 bg-[#1C6C73] text-white p-3 rounded-full shadow hover:bg-[#14565c] z-10">
                    ›
                </button>
            </div>
        @endif
    </div>
</section>

<!-- Modal Crear -->
<div id="createGaleriaModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg w-96 p-6 relative">
        <button onclick="closeModal('createGaleriaModal')"
            class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>
        <h2 class="text-xl font-bold mb-4">Agregar Imagen a la Galería</h2>
        <form action="{{ route('panel.drsantana.galeria.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="block mb-2">Título</label>
            <input type="text" name="titulo" class="w-full border rounded p-2 mb-4" required>

            <label class="block mb-2">Descripción</label>
            <textarea name="descripcion" class="w-full border rounded p-2 mb-4"></textarea>

            <label class="block mb-2">Tipo de archivo</label>
            <select name="tipo" class="w-full border rounded p-2 mb-4" required>
                <option value="imagen">Imagen</option>
                <option value="video">Video</option>
            </select>

            <label class="block mb-2">Archivo</label>
            <input type="file" name="imagen" accept="image/*,video/*" required class="mb-4">

            <button type="submit"
                class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-tealOscuro">Agregar</button>
        </form>
    </div>
</div>

<!-- Modal Editar -->
<div id="editGaleriaModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg w-96 p-6 relative">
        <button onclick="closeModal('editGaleriaModal')"
            class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>
        <h2 class="text-xl font-bold mb-4">Editar Imagen</h2>
        <form id="editGaleriaForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" id="editGaleriaId" name="id">

            <label class="block mb-2">Título</label>
            <input type="text" id="editGaleriaTitulo" name="titulo" class="w-full border rounded p-2 mb-4" required>

            <label class="block mb-2">Descripción</label>
            <textarea id="editGaleriaDescripcion" name="descripcion" class="w-full border rounded p-2 mb-4"></textarea>

            <label class="block mb-2">Tipo de archivo</label>
            <select id="editGaleriaTipo" name="tipo" class="w-full border rounded p-2 mb-4">
                <option value="imagen">Imagen</option>
                <option value="video">Video</option>
            </select>

            <label class="block mb-2">Archivo</label>
            <input type="file" name="imagen" accept="image/*,video/*">


            <button type="submit" class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-tealOscuro mt-4">Guardar
                cambios</button>
        </form>
    </div>
</div>

<script>
    /* -------- Scroll -------- */
    function scrollLeftGaleria() {
        document.getElementById('galeriaScrollContainer')?.scrollBy({
            left: -300,
            behavior: 'smooth'
        });
    }

    function scrollRightGaleria() {
        document.getElementById('galeriaScrollContainer')?.scrollBy({
            left: 300,
            behavior: 'smooth'
        });
    }

    /* -------- Drag Scroll -------- */
    const galeriaContainer = document.getElementById('galeriaScrollContainer');
    let isDragging = false,
        startX, scrollLeft;

    if (galeriaContainer) {
        galeriaContainer.addEventListener('mousedown', (e) => {
            isDragging = true;
            startX = e.pageX - galeriaContainer.offsetLeft;
            scrollLeft = galeriaContainer.scrollLeft;
            galeriaContainer.style.cursor = 'grabbing';
        });
        galeriaContainer.addEventListener('mouseleave', () => {
            isDragging = false;
            galeriaContainer.style.cursor = 'grab';
        });
        galeriaContainer.addEventListener('mouseup', () => {
            isDragging = false;
            galeriaContainer.style.cursor = 'grab';
        });
        galeriaContainer.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            e.preventDefault();
            const x = e.pageX - galeriaContainer.offsetLeft;
            galeriaContainer.scrollLeft = scrollLeft - (x - startX) * 2;
        });
    }

    /* -------- Modales -------- */
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }

    /* -------- Edit Modal -------- */
    function openEditGaleriaModal(id, titulo, descripcion) {
        document.getElementById('editGaleriaId').value = id;
        document.getElementById('editGaleriaTitulo').value = titulo || '';
        document.getElementById('editGaleriaDescripcion').value = descripcion || '';
        document.getElementById("editGaleriaTipo").value = galeria.tipo;
        document.getElementById('editGaleriaForm').action = `/panel/doctor-santana/galeria/${id}`;

        openModal('editGaleriaModal');
    }

    /* -------- Delete -------- */
    function deleteGaleria(id) {
        if (!confirm('¿Seguro que deseas eliminar esta imagen?')) return;

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/panel/doctor-santana/galeria/${id}`;
        form.innerHTML = `
        @csrf
        @method('DELETE')
    `;
        document.body.appendChild(form);
        form.submit();
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
