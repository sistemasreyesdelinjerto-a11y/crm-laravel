<!-- Modal Crear -->
<div class="modal fade" id="createBlogModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-2xl">
      <div class="modal-header">
        <h5 class="modal-title">Crear Entrada de Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <form action="{{ route('panel.drsantana.blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Título *</label>
            <input type="text" name="titulo" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Fecha *</label>
            <input type="date" name="fecha" class="form-control" value="{{ now()->format('Y-m-d') }}" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="file" name="imagen" class="form-control" accept="image/*">
          </div>

          <div class="mb-3">
            <label class="form-label">Contenido *</label>
            <textarea name="contenido" rows="5" class="form-control" required></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Crear Entrada</button>
        </div>
      </form>
    </div>
  </div>
</div>
