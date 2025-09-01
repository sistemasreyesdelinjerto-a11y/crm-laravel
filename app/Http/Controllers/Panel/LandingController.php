<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Resultado;
use App\Models\Movimiento;
use App\Models\QuienesSomos;
use Illuminate\Support\Facades\Storage;

class LandingController extends Controller
{
    public function index()
    {
        $resultados = Resultado::all();        $resultados = Resultado::all();
        $quienes_somos = QuienesSomos::all(); // Traemos info de 'Quiénes Somos'


        return view('panel.landing.index',compact('resultados', 'quienes_somos'));
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

}
