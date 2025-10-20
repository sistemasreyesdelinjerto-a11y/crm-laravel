<!-- Modal Editar -->
<div class="modal fade" id="editBlogModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-2xl">
      <div class="modal-header">
        <h5 class="modal-title">Editar Entrada de Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <!-- Importante: el action lo llenas dinámicamente con JS al abrir el modal -->
      <form id="editBlogForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <input type="hidden" id="editBlogId" name="id">

          <div class="mb-3">
            <label class="form-label">Título *</label>
            <input type="text" id="editBlogTitulo" name="titulo" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Fecha *</label>
            <input type="date" id="editBlogFecha" name="fecha" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="file" name="imagen" class="form-control" accept="image/*">
            <div id="editBlogImagenContainer" class="mt-2 d-none">
              <img id="editBlogImagen" src="" alt="Imagen actual" class="img-thumbnail" width="100">
              <p class="small text-muted">Imagen actual</p>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Contenido *</label>
            <textarea id="editBlogContenido" name="contenido" rows="5" class="form-control" required></textarea>
          </div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <form id="deleteBlogForm" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">🗑️ Eliminar</button>
          </form>

          <div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">💾 Guardar Cambios</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
    function openEditModal(blog) {
    // Llenar datos
    document.getElementById('editBlogId').value = blog.id;
    document.getElementById('editBlogTitulo').value = blog.titulo;
    document.getElementById('editBlogFecha').value = blog.fecha;
    document.getElementById('editBlogContenido').value = blog.contenido;

    // Mostrar imagen si existe
    if (blog.imagen) {
        document.getElementById('editBlogImagen').src = '/' + blog.imagen;
        document.getElementById('editBlogImagenContainer').classList.remove('d-none');
    } else {
        document.getElementById('editBlogImagenContainer').classList.add('d-none');
    }

    // Configurar action dinámico para editar
    document.getElementById('editBlogForm').action = `/panel/doctor-santana/blog/${blog.id}`;

    // Configurar action dinámico para eliminar
    document.getElementById('deleteBlogForm').action = `/panel/doctor-santana/blog/${blog.id}`;

    // Abrir modal (Bootstrap 5)
    const modal = new bootstrap.Modal(document.getElementById('editBlogModal'));
    modal.show();
}

</script>