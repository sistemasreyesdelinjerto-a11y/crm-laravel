<div id="blogModal" class="modal fixed inset-0 z-50 items-center justify-center hidden">
    <div class="modal-overlay absolute inset-0 bg-black opacity-50" onclick="closeModal('blogModal')"></div>
    
    <div class="modal-container bg-white w-full max-w-4xl rounded-2xl shadow-lg z-50 overflow-hidden mx-4 max-h-[90vh] overflow-y-auto relative">
        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b bg-[#CDAF95]">
            <h2 class="text-lg font-semibold text-white">📝 Gestión de Blog - Dr. Santana</h2>
            <button onclick="closeModal('blogModal')" class="text-white hover:text-[#1c6c73] text-xl">✕</button>
        </div>

        <!-- Body -->
        <div class="p-6">
            <!-- Botón para nuevo artículo -->
            <div class="mb-6">
                <button onclick="toggleBlogForm()" class="bg-[#1c6c73] text-white px-4 py-2 rounded-lg hover:text-[#4298a7] flex items-center">
                    <span class="mr-2">➕</span> Nuevo Artículo
                </button>
            </div>

            <!-- Formulario para agregar/editar -->
            <div id="blogForm" class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-6 hidden">
                <h3 class="text-lg font-semibold text-gray-800 mb-3" id="blogFormTitle">Nuevo Artículo</h3>
                
                <form id="articleForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="articleId" value="">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block font-medium text-gray-700 mb-2">Título del Artículo *</label>
                            <input type="text" id="articleTitle" name="titulo" class="w-full border border-gray-300 rounded-lg px-3 py-2" 
                                   placeholder="Ej: 5 Consejos para el Cuidado Capilar" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700 mb-2">Fecha de Publicación *</label>
                            <input type="date" id="articleDate" name="fecha" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 mb-2">Contenido *</label>
                        <textarea id="articleContent" name="contenido" class="w-full border border-gray-300 rounded-lg px-3 py-2 h-32" 
                                  placeholder="Escribe el contenido del artículo aquí..." required></textarea>
                    </div>

                                   <!-- Campo de imagen -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 mb-2">Imagen del Artículo</label>
                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <input type="file" id="articleImage" name="imagen" accept="image/*" 
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                <p class="text-sm text-gray-500 mt-1">Formatos: JPG, PNG, GIF (Máx. 2MB)</p>
                            </div>
                            <div id="imagePreview" class="hidden">
                                <img id="previewImage" class="w-20 h-20 object-cover rounded-lg border">
                            </div>
                        </div>
                    </div>

                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 mb-4">
                        <p class="text-sm text-blue-700">
                            <strong>Usuario:</strong> {{ Auth::user()->name }}<br>
                            <strong>Email:</strong> {{ Auth::user()->email }}
                        </p>
                    </div>

                    <div class="flex justify-end gap-3">
                        <button type="button" onclick="cancelBlogForm()" 
                                class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400">
                            Cancelar
                        </button>
                        <button type="submit" id="saveArticleBtn" 
                                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 disabled:bg-gray-400">
                            💾 Guardar Artículo
                        </button>
                    </div>
                </form>
            </div>

            <!-- Loading y mensajes -->
            <div id="blogLoading" class="hidden text-center py-4">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                <p class="text-gray-600 mt-2">Cargando...</p>
            </div>

            <div id="blogMessage" class="hidden"></div>

            <!-- Lista de artículos -->
            <div class="bg-white rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Artículos Existentes</h3>
                <div class="space-y-3" id="articlesList">
                    <div class="text-center py-8 text-gray-500">
                        <p>Cargando artículos...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="flex justify-end gap-3 px-6 py-4 border-t bg-gray-50">
            <button onclick="closeModal('blogModal')" 
                    class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-400">
                Cerrar
            </button>
        </div>
    </div>
</div>

<script>
// URLs de la API

// URLs de la API CORREGIDAS
const BLOG_API = {
    store: '{{ route("panel.drsantana.blog.store") }}',
    update: (id) => `{{ url('panel/doctor-santana/blog') }}/${id}`,
    destroy: (id) => `{{ url('panel/doctor-santana/blog') }}/${id}`,
    index: '{{ route("panel.drsantana.blog.list") }}'
};

// Función para cargar artículos
async function loadArticles() {
    showLoading(true);
    try {
        const response = await fetch(BLOG_API.index);
        const result = await response.json();
        
        if (result.success) {
            renderArticles(result.data);
        } else {
            showMessage('Error al cargar artículos', 'error');
        }
    } catch (error) {
        showMessage('Error de conexión', 'error');
    } finally {
        showLoading(false);
    }
}

// funcion para mostrar y ocultar formulario xd
function toggleBlogForm(article = null) {
    const form = document.getElementById('blogForm');
    const formTitle = document.getElementById('blogFormTitle');
    
    if (article) {
        // Modo edición
        document.getElementById('articleId').value = article.id;
        document.getElementById('articleTitle').value = article.titulo;
        document.getElementById('articleContent').value = article.contenido;
        document.getElementById('articleDate').value = article.fecha;
        
        // Mostrar imagen actual si existe
        if (article.imagen) {
            document.getElementById('previewImage').src = `{{ asset('public/images/blog') }}/${article.imagen}`;
            document.getElementById('imagePreview').classList.remove('hidden');
        } else {
            document.getElementById('imagePreview').classList.add('hidden');
        }
        
        formTitle.textContent = 'Editar Artículo';
    } else {
        // Modo nuevo
        document.getElementById('articleForm').reset();
        document.getElementById('articleId').value = '';
        document.getElementById('articleDate').value = new Date().toISOString().split('T')[0];
        document.getElementById('imagePreview').classList.add('hidden');
        formTitle.textContent = 'Nuevo Artículo';
    }
    
    form.classList.remove('hidden');
    form.scrollIntoView({ behavior: 'smooth' });
}


// Función para guardar artículo CON FormData (MÁS SIMPLE)
async function saveArticle(e) {
    e.preventDefault();
    
    const articleId = document.getElementById('articleId').value;
    const isEdit = !!articleId;
    
    const formData = new FormData();
    formData.append('titulo', document.getElementById('articleTitle').value);
    formData.append('contenido', document.getElementById('articleContent').value);
    formData.append('fecha', document.getElementById('articleDate').value);
    formData.append('_token', '{{ csrf_token() }}');
    
    // Agregar imagen si se seleccionó
    const imageFile = document.getElementById('articleImage').files[0];
    if (imageFile) {
        formData.append('imagen', imageFile);
    }
    
    // Para métodos PUT, Laravel necesita _method
    if (isEdit) {
        formData.append('_method', 'PUT');
    }
    
    const saveBtn = document.getElementById('saveArticleBtn');
    saveBtn.disabled = true;
    saveBtn.textContent = 'Guardando...';
    
    try {
        const url = isEdit ? BLOG_API.update(articleId) : BLOG_API.store;
        const method = isEdit ? 'POST' : 'POST';
        
        const response = await fetch(url, {
            method: method,
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            showMessage(result.message, 'success');
            cancelBlogForm();
            await loadArticles();
        } else {
            throw new Error(result.message || 'Error al guardar');
        }
    } catch (error) {
        console.error('Error saving article:', error);
        showMessage('Error: ' + error.message, 'error');
    } finally {
        saveBtn.disabled = false;
        saveBtn.textContent = '💾 Guardar Artículo';
    }
}

// Función para eliminar artículo
async function deleteArticle(id) {
    if (!confirm('¿Estás seguro de que quieres eliminar este artículo?')) return;
    
    try {
        const response = await fetch(BLOG_API.destroy(id), {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        const result = await response.json();
        
        if (result.success) {
            showMessage(result.message, 'success');
            await loadArticles(); // Recargar lista
        } else {
            throw new Error(result.message || 'Error al eliminar');
        }
    } catch (error) {
        showMessage(error.message, 'error');
    }
}

// Preview de imagen
document.getElementById('articleImage').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('previewImage');
    const previewContainer = document.getElementById('imagePreview');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    } else {
        previewContainer.classList.add('hidden');
    }
});

// Función para renderizar artículos con imágenes
function renderArticles(articles) {
    const articlesList = document.getElementById('articlesList');
    
    if (!articles || articles.length === 0) {
        articlesList.innerHTML = `
            <div class="text-center py-8 text-gray-500">
                <p>No hay artículos aún. ¡Crea el primero!</p>
            </div>
        `;
        return;
    }
    
    articlesList.innerHTML = articles.map(article => `
        <div class="border border-gray-200 rounded-lg p-4">
            <div class="flex items-start space-x-4">
                <!-- Imagen -->
                <div class="flex-shrink-0">
                    ${article.imagen ? 
                        `<img src="{{ asset('/images/blog') }}/${article.imagen}" 
                              alt="${article.titulo}" 
                              class="w-20 h-20 object-cover rounded-lg">` :
                        `<div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                            <span class="text-gray-400">📷</span>
                         </div>`
                    }
                </div>
                
                <!-- Contenido -->
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-800">${article.titulo}</h4>
                    <p class="text-sm text-gray-600">
                        Publicado: ${new Date(article.fecha).toLocaleDateString()}
                    </p>
                    <p class="text-sm text-gray-700 mt-2 line-clamp-2">${article.contenido}</p>
                </div>
                
                <!-- Acciones -->
                <div class="flex space-x-2">
                    <button onclick="toggleBlogForm(${JSON.stringify(article).replace(/"/g, '&quot;')})" 
                            class="text-blue-600 hover:text-blue-800 px-3 py-1 border border-blue-200 rounded-lg bg-blue-50">
                        ✏️ Editar
                    </button>
                    <button onclick="deleteArticle(${article.id})" 
                            class="text-red-600 hover:text-red-800 px-3 py-1 border border-red-200 rounded-lg bg-red-50">
                        🗑️ Eliminar
                    </button>
                </div>
            </div>
        </div>
    `).join('');
}

// Funciones auxiliares
function showLoading(show) {
    document.getElementById('blogLoading').classList.toggle('hidden', !show);
}

function showMessage(message, type = 'success') {
    const messageDiv = document.getElementById('blogMessage');
    messageDiv.className = type === 'success' ? 
        'bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4' :
        'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4';
    messageDiv.innerHTML = message;
    messageDiv.classList.remove('hidden');
    
    setTimeout(() => messageDiv.classList.add('hidden'), 5000);
}

function cancelBlogForm() {
    document.getElementById('blogForm').classList.add('hidden');
}

// Event listeners
document.getElementById('articleForm').addEventListener('submit', saveArticle);
document.getElementById('blogModal').addEventListener('click', loadArticles);

// Inicializar fecha actual
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('articleDate').value = new Date().toISOString().split('T')[0];
});

// Función para cargar artículos CON DEBUG

</script>