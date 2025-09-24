<?php

namespace App\Http\Controllers;

use App\Models\Inventario; 
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventarios = Inventario::all();
        return view('crm.inventario.inventario', compact('inventarios'));
    }

        public function movimiento(Request $request)
        {
            if ($request->is_new_product) {
                // Crear producto nuevo
                $producto = Inventario::create([
                    'nombre' => $request->nombre,
                    'categoría' => $request->categoria,
                    'stock' => $request->stock,
                    'ubicación' => $request->ubicacion ?? 'Bodega',
                    'cantidad_minima' => $request->cantidad_minima ?? 0,
                    'fecha_vencimiento' => $request->caduca,
                    'caduca' => $request->expirationDate ? $request->expirationDate : null,
                    'precio_unitario' => $request->precio_unitario ?? 0,
                ]);
            } else {
                // Actualizar stock de producto existente
                $producto = Inventario::findOrFail($request->product_id);
                if ($request->movement_type == 'entrada') {
                    $producto->stock += $request->stock;
                } elseif ($request->movement_type == 'salida') {
                    $producto->stock -= $request->output_quantity;
                }
                $producto->save();
            }

              return back()->with('success', 'Movimiento registrado correctamente.');
        }


        //Funcion para mostrar el inventario general
        public function getProducts()
            {
                // Traer todos los productos existentes
                $products = Inventario::select('id', 'nombre', 'categoria')->get();

                return response()->json($products);
            }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventario $inventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventario $inventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventario $inventario)
    {
        //
    }
}
