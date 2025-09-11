<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Trayectoria;
use App\Models\Galeria;
use App\Models\Blog;
use App\Models\Contacto;
use App\Models\Movimiento; // <-- Importa tu modelo de movimientos

class DoctorSantanaController extends Controller
{
    // -----------------------------
    // TRAYECTORIA
    // -----------------------------
    public function index()
{
    $trayectorias = Trayectoria::latest()->paginate(10);
    $galerias = Galeria::latest()->paginate(12);
    $blogs = Blog::latest()->paginate(10);
    $contactos = Contacto::latest()->paginate(10);

    return view('panel.landing.drsantana.index', compact('trayectorias', 'galerias', 'blogs', 'contactos'));
}

    public function indexTrayectoria()
    {
        $trayectorias = Trayectoria::latest()->paginate(10);
        return view('panel.landing.drsantana.trayectoria', compact('trayectorias'));
    }

    public function storeTrayectoria(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $trayectoria = Trayectoria::create($request->all());

        $this->registrarMovimiento('Crear', "Se creó trayectoria: {$trayectoria->titulo}", 'trayectorias', $trayectoria->id);

        return back()->with('success', 'Trayectoria creada correctamente.');
    }

    public function updateTrayectoria(Request $request, Trayectoria $trayectoria)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $trayectoria->update($request->all());

        $this->registrarMovimiento('ACTUALIZAR', "Se actualizó trayectoria: {$trayectoria->titulo}", 'trayectorias', $trayectoria->id);

        return back()->with('success', 'Trayectoria actualizada correctamente.');
    }

    public function destroyTrayectoria(Trayectoria $trayectoria)
    {
        $this->registrarMovimiento('ELIMINAR', "Se eliminó trayectoria: {$trayectoria->titulo}", 'trayectorias', $trayectoria->id);

        $trayectoria->delete();
        return back()->with('success', 'Trayectoria eliminada.');
    }

    // -----------------------------
    // GALERÍA
    // -----------------------------
    public function indexGaleria()
    {
        $galerias = Galeria::latest()->paginate(12);
        return view('panel.landing.drsantana.galeria', compact('galerias'));
    }

    public function storeGaleria(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'titulo' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $path = $request->file('imagen')->store('galeria', 'public');

        $galeria = Galeria::create([
            'imagen' => $path,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
        ]);

        $this->registrarMovimiento('Crear', "Se agregó imagen a la galería: {$galeria->titulo}", 'galerias', $galeria->id);

        return back()->with('success', 'Imagen agregada a la galería.');
    }

    public function updateGaleria(Request $request, Galeria $galeria)
    {
        $request->validate([
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'titulo' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('galeria', 'public');
            $galeria->imagen = $path;
        }

        $galeria->titulo = $request->titulo ?? $galeria->titulo;
        $galeria->descripcion = $request->descripcion ?? $galeria->descripcion;
        $galeria->save();

        $this->registrarMovimiento('ACTUALIZAR', "Se actualizó imagen de galería: {$galeria->titulo}", 'galerias', $galeria->id);

        return back()->with('success', 'Galería actualizada correctamente.');
    }

    public function destroyGaleria(Galeria $galeria)
    {
        $this->registrarMovimiento('ELIMINAR', "Se eliminó imagen de galería: {$galeria->titulo}", 'galerias', $galeria->id);

        $galeria->delete();
        return back()->with('success', 'Imagen eliminada.');
    }

    // -----------------------------
    // BLOG
    // -----------------------------
    public function indexBlog()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('panel.landing.drsantana.blog', compact('blogs'));
    }

    public function storeBlog(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->hasFile('imagen') ? $request->file('imagen')->store('blogs', 'public') : null;

        $blog = Blog::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $path,
        ]);

        $this->registrarMovimiento('Crear', "Se creó blog: {$blog->titulo}", 'blogs', $blog->id);

        return back()->with('success', 'Blog creado correctamente.');
    }

    public function updateBlog(Request $request, Blog $blog)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('blogs', 'public');
            $blog->imagen = $path;
        }

        $blog->titulo = $request->titulo;
        $blog->descripcion = $request->descripcion;
        $blog->save();

        $this->registrarMovimiento('ACTUALIZAR', "Se actualizó blog: {$blog->titulo}", 'blogs', $blog->id);

        return back()->with('success', 'Blog actualizado correctamente.');
    }

    public function destroyBlog(Blog $blog)
    {
        $this->registrarMovimiento('ELIMINAR', "Se eliminó blog: {$blog->titulo}", 'blogs', $blog->id);

        $blog->delete();
        return back()->with('success', 'Blog eliminado.');
    }

    // -----------------------------
    // CONTACTO
    // -----------------------------
    public function indexContacto()
    {
        $contactos = Contacto::latest()->paginate(10);
        return view('panel.drsantana.contacto.index', compact('contactos'));
    }

    public function showContacto(Contacto $contacto)
    {
        return view('panel.drsantana.contacto.show', compact('contacto'));
    }

    public function destroyContacto(Contacto $contacto)
    {
        $this->registrarMovimiento('ELIMINAR', "Se eliminó mensaje de contacto: {$contacto->nombre}", 'contactos', $contacto->id);

        $contacto->delete();
        return back()->with('success', 'Mensaje eliminado.');
    }

    // -----------------------------
    // REGISTRO DE MOVIMIENTOS
    // -----------------------------
    protected function registrarMovimiento($tipo, $descripcion, $tabla, $registro_id = null)
    {
        Movimiento::create([
            'usuario_id' => Auth::id(),
            'tipo_movimiento' => $tipo,
            'descripcion' => $descripcion,
            'tabla_afectada' => $tabla,
            'registro_id' => $registro_id,
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
