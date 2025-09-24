<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resultado;
use App\Models\encabezado;
use App\Models\blog;
use App\Models\blogdr;
use App\Models\Galeria;
use App\Models\servicios;
use App\Models\certificaciones;
use App\Models\CasoExito;

class LandingController extends Controller
{
    // Mostrar la landing completa
    public function index()
    {
        $resultados = Resultado::all();
        $encabezados = encabezado::all();
        $blogs = blog::all();
        $servicios = servicios::all();
        $casos = CasoExito::all();
        return view('landing.home', 
        compact('resultados', 
        'encabezados', 
        'blogs', 
        'servicios',
        'casos'));
    }



    // Guardar resultado
    public function storeResultado(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'color' => 'required|string',
            'numero' => 'required|numeric',
            'icono_svg' => 'nullable|string',
        ]);

        Resultado::create($request->all());

        return redirect()->route('landing.index')->with('success', 'Resultado creado correctamente');
    }

    // Mandar las vistas de las clinicas de la pagina principal

    public function clinicaSantafe()
    {
        return view('landing.santafe');
    }

    public function clinicaPedregal()
    {
        return view('landing.pedregal');
    }

    public function clinicaQueretaro()
    {
        return view('landing.queretaro');
    }

    //Seccion de Dr. Santana de la pagina principal
/*
public function drSantana()
{
    // Obtenemos todos los posts hasta la fecha actual, ordenados por fecha y creación
    $blogdrs = blogdr::orderBy('fecha', 'desc')
                     ->orderBy('created_at', 'desc')
                     ->where('fecha', '<=', now())
                     ->get();
$galerias = Galeria::all();
    return view('landing.dr_santana', compact('blogdrs','galerias'));
}
*/
    public function drSantana()
    {
        $blogdrs = blogdr::orderBy('fecha', 'desc')
            ->orderBy('created_at', 'desc')
            ->where('fecha', '<=', now())
            ->get(); // Obtenemos todos para el carrusel

        $galerias = galeria::all();
        $certificaciones = certificaciones::all();

        return view('landing.dr_santana', compact('blogdrs', 'galerias', 'certificaciones'));
    }
}
