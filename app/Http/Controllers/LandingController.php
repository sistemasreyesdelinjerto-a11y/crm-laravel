<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resultado;
use App\Models\encabezado;
use App\Models\blog;
use App\Models\servicios;

class LandingController extends Controller
{
    // Mostrar la landing completa
    public function index()
    {
        $resultados = Resultado::all();
        $encabezados = encabezado::all();
        $blogs = blog::all();
        $servicios = servicios::all();
        return view('landing.home', compact('resultados', 'encabezados', 'blogs', 'servicios'));
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
}
