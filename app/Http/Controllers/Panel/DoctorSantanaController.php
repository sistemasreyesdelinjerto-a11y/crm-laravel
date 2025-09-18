<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Trayectoria;
use App\Models\Galeria;
use App\Models\Blog;
use App\Models\blogdr;
use App\Models\Contacto;
use App\Models\Movimiento; // <-- Importa tu modelo de movimientos
use Illuminate\Support\Facades\DB;

class DoctorSantanaController extends Controller
{

    //Funcion de registro de movimientos
    protected function registraMovimiento($tipo, $descripcion, $tabla, $registro_id = null)
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

    public function indexDrsantana()
    {
        //$trayectorias = Trayectoria::latest()->paginate(10);
        $galerias = Galeria::latest()->paginate(12);
        $blogs = blogdr::all();
        //$contactos = Contacto::latest()->paginate(10);

        return view('panel.landing.drsantana.index', compact('blogs', 'galerias'));
    }

    public function indexsBlog()
    {
        $blogs = blogdr::all();

        return view('panel.landing.drsantana.blogIndex', compact('blogs'));
    }

    public function storeBlogdr(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'fecha' => 'required|date',
            'imagen' => 'nullable',
        ]);

        $data = $request->only(['titulo', 'contenido', 'fecha']);

        // Procesar imagen si se subió
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreArchivo = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/blog'), $nombreArchivo);
            $data['imagen'] = 'images/blog/' . $nombreArchivo;
        }

        $blogdr = blogdr::create($data);

        $this->registraMovimiento(
            'Crear',
            "Se creó blog Dr.: {$blogdr->titulo}",
            'blogdrs',
            $blogdr->id
        );

        return response()->json([
            'success' => true,
            'message' => 'Blog Dr. creado correctamente.',
            'data' => $blogdr
        ]);
    }

  public function updateBlogdr(Request $request, $id)
{
    $blog = DB::table('blogdrs')->where('id', $id)->first();

    if (!$blog) {
        return redirect()->back()->with('error', 'Registro no encontrado.');
    }

    $data = [
        'titulo'     => $request->input('titulo', $blog->titulo),
        'contenido'  => $request->input('contenido', $blog->contenido),
        'fecha'      => $request->input('fecha', $blog->fecha),
        'updated_at' => now(),
    ];

    if ($request->hasFile('imagen')) {
        // Eliminar imagen anterior si existe
        if ($blog->imagen && file_exists(public_path($blog->imagen))) {
            unlink(public_path($blog->imagen));
        }

        $file = $request->file('imagen');
        $nombreArchivo = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/blog'), $nombreArchivo);

        $data['imagen'] = 'images/blog/' . $nombreArchivo;
    }

    DB::table('blogdrs')->where('id', $id)->update($data);

    $this->registraMovimiento(
        'Actualizar',
        "Se actualizó blog Dr.: {$data['titulo']}",
        'blogdrs',
        $id
    );

    return redirect()->back()->with('success', 'Blog Dr. actualizado correctamente.');
}

    // Función para eliminar
    public function destroyBlogdr($id)
    {
        $blogdr = blogdr::findOrFail($id);

        // Eliminar imagen si existe
        if ($blogdr->imagen) {
            Storage::disk('public')->delete('images/blog/' . $blogdr->imagen);
        }

        $titulo = $blogdr->titulo;
        $blogdr->delete();

        $this->registraMovimiento(
            'Eliminar',
            "Se eliminó blog Dr.: {$titulo}",
            'blogdrs',
            $id
        );

        return response()->json([
            'success' => true,
            'message' => 'Blog Dr. eliminado correctamente.'
        ]);
    }

    // Función para obtener todos los blogs
    public function getBlogsdr()
    {
        try {
            $blogs = blogdr::orderBy('fecha', 'desc')->get();

            return response()->json([
                'success' => true,
                'data' => $blogs,
                'count' => $blogs->count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al cargar artículos: ' . $e->getMessage()
            ], 500);
        }
    }

    // -----------------------------
    // GALERÍA
    // -----------------------------
    public function indexGaleria()
    {
        $galerias = Galeria::all();
        return view('panel.landing.drsantana.galeriaIndex', compact('galerias'));
    }

    public function storeGaleria(Request $request)
    {
        $request->validate([
            'archivo' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:10048',
            'titulo' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'tipo' => 'nullable|in:imagen,video'
        ]);


        $galeriaData = $request->only(['titulo', 'descripcion', 'tipo']);

        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $nombreArchivo = time() . '_' . $file->getClientOriginalName();

            // Mover a carpeta correspondiente
            $carpeta = $request->tipo == 'video' ? 'videos/galeria' : 'images/galeria';
            $file->move(public_path($carpeta), $nombreArchivo);

            $galeriaData['imagen'] = $carpeta . '/' . $nombreArchivo;
        }

        $galeria = Galeria::create($galeriaData);

        $this->registrarMovimiento('Crear', "Se agregó {$request->tipo} a la galería: {$galeria->titulo}", 'galerias', $galeria->id);
        return response()->json([
            'success' => true,
            'message' => 'Blog Dr. creado correctamente.',
            'data' => $galeria
        ]);
    }


public function updateGaleria(Request $request, $id)
{
    // Obtener registro
    $galeria = DB::table('galerias')->where('id', $id)->first();

    if (!$galeria) {
        return redirect()->back()->with('error', 'Registro no encontrado.');
    }

    // Preparar datos a actualizar
    $data = [
        'titulo' => $request->titulo ?? $galeria->titulo,
        'descripcion' => $request->descripcion ?? $galeria->descripcion,
        'updated_at' => now(),
    ];

    // Manejo de archivo
    if ($request->hasFile('archivo')) {
        // Eliminar archivo anterior si existe
        if ($galeria->imagen && file_exists(public_path($galeria->imagen))) {
            unlink(public_path($galeria->imagen));
        }

        $file = $request->file('archivo');
        $nombreArchivo = time() . '_' . $file->getClientOriginalName();

        // Determinar carpeta
        $tipo = $request->tipo ?? (in_array($file->getClientOriginalExtension(), ['mp4','mov','avi']) ? 'video' : 'imagen');
        $carpeta = $tipo == 'video' ? 'videos/galeria' : 'images/galeria';

        $file->move(public_path($carpeta), $nombreArchivo);

        $data['imagen'] = $carpeta . '/' . $nombreArchivo;
        $data['tipo'] = $tipo;
    }

    // Actualizar en DB
    DB::table('galerias')->where('id', $id)->update($data);

    // Registrar movimiento
    $this->registrarMovimiento(
        'ACTUALIZAR',
        "Se actualizó imagen de galería: {$data['titulo']}",
        'galerias',
        $id
    );

    // Redireccionar con mensaje
    return redirect()->back()->with('success', 'Galería actualizada correctamente.');
}

    public function destroyGaleria(Galeria $galeria)
    {
        $this->registrarMovimiento('ELIMINAR', "Se eliminó imagen de galería: {$galeria->titulo}", 'galerias', $galeria->id);

        $galeria->delete();
        return response()->json([
            'success' => true,
            'data' => $galeria,
            'count' => $galeria->count()
        ]);
    }
    //Todoo esto no funciona todavia xdxdxdcx
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
}
