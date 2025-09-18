
<section id="encabezado" class="py-10 px-6 bg-gradient-to-r from-gray-100 via-white to-gray-100">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Título y botón Crear -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-[#1C6C73]">Blog Dr. Santana</h1>
            <button onclick="openModal('createBlogModal')"
                class="bg-[#1C6C73] text-white px-4 py-2 rounded-lg hover:bg-[#14565c] transition">
                ✨ Crear Entrada
            </button>
        </div>

        @if($blogs->isEmpty())
            <div class="text-center py-12 bg-white rounded-lg shadow">
                <div class="text-6xl mb-4">📝</div>
                <p class="text-gray-600 text-lg">No hay entradas de blog disponibles.</p>
                <p class="text-gray-500">Crea la primera entrada para comenzar.</p>
            </div>
        @else
            <!-- Contenedor del carrusel -->
            <div class="relative">
                <!-- Botón Izquierda -->
                <button onclick="scrollLeftBlog()"
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-4 bg-[#1C6C73] text-white p-3 rounded-full shadow hover:bg-[#14565c] z-10">
                    ‹
                </button>

                <!-- Scroll horizontal -->
                <div id="blogScrollContainer"
                    class="flex overflow-x-auto space-x-6 scrollbar-hide scroll-smooth cursor-grab active:cursor-grabbing select-none py-4">
                    @foreach ($blogs as $blog)
                        <div class="min-w-[350px] bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow border border-gray-100">
                            <!-- Imagen del blog -->
                           @if($blog->imagen)
                                    <img src="{{ asset($blog->imagen) }}" alt="imagen" class="w-12 h-12 object-contain">
                                @else
                                    <span class="text-gray-400">Sin imagen</span>
                                @endif
                            
                            <h2 class="text-xl font-bold text-[#1C6C73]">{{ $blog->titulo }}</h2>
                            <p class="text-gray-600 text-sm mt-2">
                                📅 {{ $blog->fecha }}
                            </p>
                            <p class="text-gray-700 text-justify mt-3 line-clamp-4">
                                {{ strip_tags($blog->contenido) }}
                            </p>
                            <div class="text-right mt-4">
                                <button onclick="openEditModal({{ $blog->id }}, '{{ $blog->titulo }}', '{{ $blog->fecha }}', `{{ $blog->contenido }}`, '{{ $blog->imagen }}')"
                                    class="bg-[#1C6C73] text-white px-4 py-2 rounded-lg hover:bg-[#14565c] text-sm">
                                    ✏️ Editar
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Botón Derecha -->
                <button onclick="scrollRightBlog()"
                    class="absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-4 bg-[#1C6C73] text-white p-3 rounded-full shadow hover:bg-[#14565c] z-10">
                    ›
                </button>
            </div>
        @endif
    </div>
</section>

<!-- Incluir modales -->
@include('panel.landing.drsantana.modales.blog_create')
@include('panel.landing.drsantana.modales.blog_edit')

<script>
    const blogContainer = document.getElementById('blogScrollContainer');

function scrollLeftBlog() {
    if (blogContainer) {
        blogContainer.scrollBy({ left: -350, behavior: 'smooth' });
    }
}

function scrollRightBlog() {
    if (blogContainer) {
        blogContainer.scrollBy({ left: 350, behavior: 'smooth' });
    }
}

// Arrastre con mouse/touch
let isDownBlog = false;
let startXBlog;
let scrollLeftStartBlog;

if (blogContainer) {
    blogContainer.addEventListener('mousedown', (e) => {
        isDownBlog = true;
        startXBlog = e.pageX - blogContainer.offsetLeft;
        scrollLeftStartBlog = blogContainer.scrollLeft;
        blogContainer.style.cursor = 'grabbing';
    });

    blogContainer.addEventListener('mouseleave', () => {
        isDownBlog = false;
        blogContainer.style.cursor = 'grab';
    });

    blogContainer.addEventListener('mouseup', () => {
        isDownBlog = false;
        blogContainer.style.cursor = 'grab';
    });

    blogContainer.addEventListener('mousemove', (e) => {
        if (!isDownBlog) return;
        e.preventDefault();
        const x = e.pageX - blogContainer.offsetLeft;
        const walk = (x - startXBlog) * 2;
        blogContainer.scrollLeft = scrollLeftStartBlog - walk;
    });

    // Soporte para pantallas táctiles
    blogContainer.addEventListener('touchstart', (e) => {
        startTouchXBlog = e.touches[0].pageX;
        scrollLeftStartBlog = blogContainer.scrollLeft;
    });

    blogContainer.addEventListener('touchmove', (e) => {
        const x = e.touches[0].pageX;
        const walk = (x - startTouchXBlog) * 2;
        blogContainer.scrollLeft = scrollLeftStartBlog - walk;
    });
}

// Variable global para el blog actual
let currentBlogId = null;

// Función para abrir el modal de edición
function openEditModal(id, titulo, fecha, contenido, imagen) {
    currentBlogId = id;
    
    // Llenar el formulario con los datos
    document.getElementById('editBlogId').value = id;
    document.getElementById('editBlogTitulo').value = titulo;
    document.getElementById('editBlogFecha').value = fecha;
    document.getElementById('editBlogContenido').value = contenido;
    
    // Manejar la imagen
    const imagenContainer = document.getElementById('editBlogImagenContainer');
    const imagenElement = document.getElementById('editBlogImagen');
    
    if (imagen) {
        imagenElement.src = '/storage/' + imagen;
        imagenContainer.classList.remove('hidden');
    } else {
        imagenContainer.classList.add('hidden');
    }
    
    // Abrir el modal
    openModal('editBlogModal');
}

// Editar blog
document.getElementById('editBlogForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    
    submitBtn.disabled = true;
    submitBtn.textContent = 'Guardando...';
    
    try {
        const response = await fetch(`/panel/doctor-santana/blog/${currentBlogId}`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            showNotification('Entrada actualizada correctamente', 'success');
            closeModal('editBlogModal');
            setTimeout(() => window.location.reload(), 1000);
        } else {
            throw new Error(result.message || 'Error al actualizar');
        }
    } catch (error) {
        showNotification('Error: ' + error.message, 'error');
    } finally {
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;
    }
});

// Eliminar blog
document.getElementById('deleteBlogBtn').addEventListener('click', function() {
    if (!confirm('¿Estás seguro de que deseas eliminar esta entrada?')) {
        return false;
    }
    
    const formData = new FormData();
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('_method', 'DELETE');
    
    fetch(`/panel/doctor-santana/blog/${currentBlogId}`, {
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
            showNotification('Entrada eliminada correctamente', 'success');
            closeModal('editBlogModal');
            setTimeout(() => window.location.reload(), 1000);
        } else {
            throw new Error(result.message || 'Error al eliminar');
        }
    })
    .catch(error => {
        showNotification('Error: ' + error.message, 'error');
    });
});

// Funciones básicas de modal (asegúrate de que estén definidas)
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
}

function showNotification(message, type = 'success') {
    alert(message); // Puedes reemplazar con un toast bonito
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
.line-clamp-4 {
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
