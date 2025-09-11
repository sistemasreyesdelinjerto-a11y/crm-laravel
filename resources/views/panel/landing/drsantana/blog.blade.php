{{-- =================== BLOG =================== --}}
    <section id="blog">
        <h1 class="text-2xl font-bold mb-4">Blog</h1>

        <button class="bg-green-500 text-white px-4 py-2 rounded mb-4" data-modal-toggle="createBlogModal">
            + Nuevo Artículo
        </button>

        <div class="space-y-4">
            @foreach($blogs as $b)
            <div class="bg-white p-4 rounded shadow flex justify-between items-center">
                <div>
                    <h3 class="font-bold">{{ $b->titulo }}</h3>
                    <p class="text-gray-600">{{ $b->descripcion }}</p>
                </div>
                <div class="flex gap-2">
                    <button data-modal-toggle="editBlogModal{{ $b->id }}" class="bg-blue-500 text-white px-2 py-1 rounded">Editar</button>
                    <form action="{{ route('panel.drsantana.blog.destroy', $b) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                    </form>
                </div>

                {{-- Modal Editar Blog --}}
                <div id="editBlogModal{{ $b->id }}" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
                    <div class="bg-white p-6 rounded-xl w-1/2">
                        <h2 class="text-xl font-bold mb-4">Editar Artículo</h2>
                        <form action="{{ route('panel.drsantana.blog.update', $b) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="text" name="titulo" value="{{ $b->titulo }}" class="w-full mb-2 p-2 border rounded">
                            <textarea name="descripcion" class="w-full mb-2 p-2 border rounded">{{ $b->descripcion }}</textarea>
                            <input type="file" name="imagen" class="w-full mb-2 p-2 border rounded">
                            <div class="flex justify-end gap-2">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
                                <button type="button" data-modal-toggle="editBlogModal{{ $b->id }}" class="bg-gray-300 px-4 py-2 rounded">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

        {{-- Modal Crear Blog --}}
        <div id="createBlogModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-xl w-1/2">
                <h2 class="text-xl font-bold mb-4">Nuevo Artículo</h2>
                <form action="{{ route('panel.drsantana.blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="titulo" placeholder="Título" class="w-full mb-2 p-2 border rounded" required>
                    <textarea name="descripcion" placeholder="Descripción" class="w-full mb-2 p-2 border rounded" required></textarea>
                    <input type="file" name="imagen" class="w-full mb-2 p-2 border rounded">
                    <div class="flex justify-end gap-2">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
                        <button type="button" data-modal-toggle="createBlogModal" class="bg-gray-300 px-4 py-2 rounded">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-4">{{ $blogs->links() }}</div>
    </section>
