<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Resultado;
use App\Models\Movimiento;
use App\Models\QuienesSomos;
use App\Models\encabezado;
use App\Models\blog;
use App\Models\servicios;
use Illuminate\Support\Facades\Storage;

class LandingController extends Controller
{
    public function index()
    {
        $resultados = Resultado::all();        $resultados = Resultado::all();
        $quienes_somos = QuienesSomos::all(); // Traemos info de 'Quiénes Somos'
        $encabezados = encabezado::all(); // Traemos info de 'Encabezado'
        $blogs = blog::all(); // Traemos info de 'Blog'
        $servicios = servicios::all(); // Traemos info de 'Servicios'

        return view('panel.landing.index',compact('resultados', 'encabezados', 'blogs', 'servicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'numero' => 'required|numeric',
            'color' => 'required|string',
            'icono_svg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['titulo', 'numero', 'color']);
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();
        // Guardar imagen si se sube
        if ($request->hasFile('icono_svg')) {
            $file = $request->file('icono_svg');
            $nombreArchivo = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/resultados'), $nombreArchivo);
            $data['icono_svg'] = $nombreArchivo;
        }

        $resultado = Resultado::create($data);

        $this->registrarMovimiento(
            'Crear',
            'Se creó un resultado: ' . $resultado->titulo,
            'resultados',
            $resultado->id
        );

        return redirect()->route('panel.landing.index')->with('success', 'Resultado creado correctamente');
    }

   public function update(Request $request, Resultado $resultado)
{
    $request->validate([
        'titulo' => 'required|string',
        'numero' => 'required|numeric',
        'color' => 'required|string',
        'icono_svg' => 'nullable|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
    ]);

    $resultado->titulo = $request->titulo;
    $resultado->numero = $request->numero;
    $resultado->color = $request->color;
    $resultado->updated_by = auth()->id();

    if ($request->hasFile('icono_svg')) {
        $file = $request->file('icono_svg');
        $nombreArchivo = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('images/resultados'), $nombreArchivo);
        $resultado->icono_svg = 'images/resultados/'.$nombreArchivo;
    }

    $resultado->save();

    Movimiento::create([
        'usuario_id' => auth()->id(),
        'tipo_movimiento' => 'Actualizar',
        'descripcion' => 'Se actualizó el resultado: '.$resultado->titulo,
        'tabla_afectada' => 'resultados',
        'registro_id' => $resultado->id,
        'ip' => request()->ip(),
        'user_agent' => request()->userAgent(),
    ]);

    return redirect()->route('panel.landing.index')->with('success', 'Resultado actualizado correctamente');
}


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
    // Guardar información de 'Quiénes Somos'
    public function storeQuienesSomos(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['titulo', 'descripcion']);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreArchivo = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/quienes_somos'), $nombreArchivo);
            $data['imagen'] = 'images/quienes_somos/'.$nombreArchivo;
        }

        $quienes_somos = QuienesSomos::create($data);

        $this->registrarMovimiento(
            'Crear',
            'Se creó información de Quiénes Somos: '.$quienes_somos->titulo,
            'quienes_somos',
            $quienes_somos->id
        );

        return redirect()->route('panel.landing.index')->with('success', 'Información creada correctamente');
    }

    // Actualizar información de 'Quiénes Somos'
    public function updateQuienesSomos(Request $request, QuienesSomos $quienes_somos)
    {
        $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $quienes_somos->titulo = $request->titulo;
        $quienes_somos->descripcion = $request->descripcion;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreArchivo = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/quienes_somos'), $nombreArchivo);
            $quienes_somos->imagen = 'images/quienes_somos/'.$nombreArchivo;
        }

        $quienes_somos->save();

        $this->registrarMovimiento(
            'Actualizar',
            'Se actualizó información de Quiénes Somos: '.$quienes_somos->titulo,
            'quienes_somos',
            $quienes_somos->id
        );

        return redirect()->route('panel.landing.index')->with('success', 'Información actualizada correctamente');
    }

    public function storeEncabezado(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'required|string|max:255',
            'imagen' => 'required',
        ]);        
        
        
        $encabezado = $request->only(['titulo', 'subtitulo']);
        $encabezado['created_by'] = Auth::id();
        $encabezado['updated_by'] = Auth::id();

         // Guardar imagen si se sube

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreArchivo = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/encabezados'), $nombreArchivo);
            $encabezado['imagen'] = 'images/encabezados/'.$nombreArchivo;
        }

        $encabezado = encabezado::create($encabezado);

         $this->registrarMovimiento(
            'Crear',
            'Se creó un encabezado: ' . $encabezado['titulo'],
            'encabezados',
            $encabezado->id,
        );


        return redirect()->route('panel.landing.index')->with('success', 'Encabezado creado correctamente');
    }

    public function updateEncabezado(Request $request,encabezado $encabezado)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'required|string|max:255',
            'imagen' => 'required',
        ]);

        $encabezado->titulo = $request->titulo;
        $encabezado->subtitulo = $request->subtitulo;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreArchivo = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/encabezados'), $nombreArchivo);
            $encabezado->imagen = 'images/encabezados/'.$nombreArchivo;
        }
        $encabezado->save();


        $this->registrarMovimiento(
            'Actualizar',
            'Se actualizó un encabezado: ' . $encabezado->titulo,
            'encabezados',
            $encabezado->id,
        );

        return redirect()->route('panel.landing.index')->with('success', 'Encabezado actualizado correctamente');
    }

    public function destroyEncabezado(encabezado $encabezado)
    {
        $encabezado->delete();
    
        $this->registrarMovimiento(
            'Eliminar',
            'Se eliminó un encabezado: ' . $encabezado->titulo,
            'encabezados',
            $encabezado->id,
        );

        return redirect()->route('panel.landing.index')->with('success', 'Encabezado eliminado correctamente');
    }

    // Metodos para el blog

    public function createBlog(Request $request)
    {
       $request->validate([
           'titulo' => 'required|string|max:255',
           'contenido' => 'required|string',
       ]);

       $blog = $request->only(['titulo', 'contenido']);
       $blog['created_by'] = Auth::id();
       $blog['updated_by'] = Auth::id();
    $blog = blog::create($blog);

       $this->registrarMovimiento(
           'Crear',
           'Se creó una entrada de blog: ' . $blog['titulo'],
           'blogs',
           $blog->id,
       );

         return redirect()->route('panel.landing.index')->with('success', 'Entrada de blog creada correctamente');

    }

    public function editBlog(Request $request, blog $blog)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
        ]);

        $blog->titulo = $request->titulo;
        $blog->contenido = $request->contenido;
        //$blog->updated_by = Auth::id();
        $blog->save();
        
        
        $this->registrarMovimiento(
            'Actualizar',
            'Se actualizó una entrada de blog: ' . $blog->titulo,
            'blogs',
            $blog->id,
        );

        return redirect()->route('panel.landing.index')->with('success', 'Entrada de blog actualizada correctamente');
    }

    public function destroyBlog(blog $blog)
    {
        $blog->delete();

        $this->registrarMovimiento(
            'Eliminar',
            'Se eliminó una entrada de blog: ' . $blog->titulo,
            'blogs',
            $blog->id,
        );

        return redirect()->route('panel.landing.index')->with('success', 'Entrada de blog eliminada correctamente');
    }

    // Metodos para servicios

    public function createServicios(Request $request)
    {
       $request->validate([
           'titulo' => 'required|string|max:255',
           'detalle' => 'required|string|max:255',
           'descripcion' => 'required|string',
           'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

       $servicios = $request->only(['titulo', 'detalle', 'descripcion']);


       $servicios['created_by'] = Auth::id();
       $servicios['updated_by'] = Auth::id();

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreArchivo = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/servicios'), $nombreArchivo);
            $servicios['imagen'] = 'images/servicios/'.$nombreArchivo;
        }

       $servicios = servicios::create($servicios);

         $this->registrarMovimiento(
              'Crear',
              'Se creó un servicio: ' . $servicios['titulo'],
              'servicios',
              $servicios->id,
         );
    
            return redirect()->route('panel.landing.index')->with('success', 'Servicio creado correctamente');

}

    public function editServicios(Request $request, servicios $servicios)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'detalle' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $servicios->titulo = $request->titulo;
        $servicios->detalle = $request->detalle;
        $servicios->descripcion = $request->descripcion;
        //$servicios->updated_by = Auth::id();

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreArchivo = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/servicios'), $nombreArchivo);
            $servicios->imagen = 'images/servicios/'.$nombreArchivo;
        }

        $servicios->save();
        
        
        $this->registrarMovimiento(
            'Actualizar',
            'Se actualizó un servicio: ' . $servicios->titulo,
            'servicios',
            $servicios->id,
        );

        return redirect()->route('panel.landing.index')->with('success', 'Servicio actualizado correctamente');
    }

    public function destroyServicios(servicios $servicios)
    {
        $servicios->delete();

        $this->registrarMovimiento(
            'Eliminar',
            'Se eliminó un servicio: ' . $servicios->titulo,
            'servicios',
            $servicios->id,
        );

        return redirect()->route('panel.landing.index')->with('success', 'Servicio eliminado correctamente');
    }

}
