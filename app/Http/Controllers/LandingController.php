<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resultado;

class LandingController extends Controller
{
    // Mostrar la landing completa
    public function index()
    {
        $resultados = Resultado::all();
        return view('landing.home', compact('resultados'));
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
}
