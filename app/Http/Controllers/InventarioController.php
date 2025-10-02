<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\MovimientoInventario;
use App\Models\AdInventoryItem;
use App\Models\TreatmentProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventarios = AdInventoryItem::all();
        /*consulta para traer los movimientos con el nombre del producto
        con inner join porque Eloquent esta tonto
        */
       // $kit = TreatmentProducts::all();

        $movimientos = DB::table('movimientos_inventario as m')
            ->join('ad_inventory_items as i', 'm.idProducto', '=', 'i.id')
            ->select(
                'm.id',
                'm.idProducto',
                'i.name as nombreProducto', // traemos el nombre del producto
                'm.idBatch',
                'm.tipomovimiento',
                'm.cantidad',
                'm.expedidoPor',
                'm.entregadoA',
                'm.fechaMovimiento',
                'm.ubicacion'
            )
            ->orderBy('m.fechaMovimiento', 'desc')
            ->get();

        $medicamentos = DB::table('ad_inventory_items as m')
        ->select('m.id',
        'm.name',
        'm.stock',
        'm.expiry_date',)
        ->where('m.has_expiry', 1)
        ->get();

        $kits = DB::table('treatment_products as p')
        ->join('ad_inventory_items as n', 'p.product_id', '=', 'n.id')
        ->select(
            'p.id',
            'n.name as nombre',
            'p.treatment_type',
            'p.quantity',
            'p.clinic'
        )
        ->get();
    
    //dd($inventarios);
    return view('crm.inventario.inventario', compact('inventarios', 'movimientos', 'medicamentos', 'kits'));
    }

   public function movimientoInv(Request $request)
{
    if ($request->is_new_product) {
        // Crear producto nuevo
        $producto = AdInventoryItem::create([
            'name' => $request->item_name,
            'category' => $request->category,
            'stock' => $request->stock,
            'location' => $request->ubicacion ?? 'Bodega',
            'minimum_required' => $request->minimum_value ?? 0,
            'has_expiry' => $request->has_expiry ?? 0,
            'expiry_date' => $request->expirationDate ?? null,
            'manual_price' => $request->manualPrice ?? 0,
        ]);

        // Registrar movimiento
        MovimientoInventario::create([
            'idProducto' => $producto->id,
            'idBatch' => null,
            'tipoMovimiento' => 'entrada',
            'cantidad' => $request->stock,
            'expedidoPor' => auth()->user()->name ?? 'Sistema',
            'entregadoA' => null,
            'fechaMovimiento' => now(),
            'ubicacion' => $producto->ubicacion,
        ]);

    } else {
        // Actualizar stock y categoría de producto existente
        $producto = AdInventoryItem::findOrFail($request->item_name); // item_name = id del select
        $producto->stock += $request->stock; // Sumar la entrada
        $producto->category = $request->category; // Actualizar categoría
        $producto->save();

        // Registrar movimiento
        MovimientoInventario::create([
            'idProducto' => $producto->id,
            'idBatch' => null,
            'tipoMovimiento' => 'entrada',
            'cantidad' => $request->stock,
            'expedidoPor' => auth()->user()->name ?? 'Sistema',
            'entregadoA' => null,
            'fechaMovimiento' => now(),
            'ubicacion' => $producto->ubicacion,
        ]);
    }

    return redirect()->back()->with('success', 'Movimiento registrado correctamente.');
}


    //Funcion para mostrar el inventario general (En desuso)
    public function getProducts()
    {
        // Traer todos los productos existentes
        $products = Inventario::select('id', 'nombre', 'categoria')->get();

        return response()->json($products);
    }


    public function updateProd(Request $request)
    {
        $producto = AdInventoryItem::findOrFail($request->id);
        $producto->update($request->only(['nombre', 'categoria', 'stock', 'cantidad_minima']));
        return back()->with('success', 'Producto actualizado correctamente.');
    }


    public function destroyProd($id)
    {
        $inventario = AdInventoryItem::findOrFail($id);
        $inventario->delete();

        return back()->with('success', 'Producto eliminado correctamente.');
    }

   public function salidaProducto(Request $request)
{
   /* $request->validate([
        'product_id'      => 'required|exists:inventarios,id',
        'output_quantity' => 'required|integer|min:1',
        'received_by'     => 'required|string|max:255',
        'output_date'     => 'required|date',
    ]);*/

    // Buscar producto
    $producto = AdInventoryItem::findOrFail($request->product_id);

    // Verificar que haya stock suficiente
    if ($producto->stock < $request->output_quantity) {
        return back()->withErrors(['output_quantity' => 'No hay suficiente stock disponible para esta salida.']);
    }

    // Restar del stock
    $producto->stock -= $request->output_quantity;
    $producto->save();

    // Registrar movimiento en movimientos_inventario
    MovimientoInventario::create([
        'idProducto'     => $producto->id,
        'idBatch'        => null, // aún no se usa
        'tipoMovimiento' => 'salida',
        'cantidad'       => $request->output_quantity,
        'expedidoPor'    => auth()->user()->name ?? 'Sistema',
        'entregadoA'     => $request->received_by,
        'fechaMovimiento'=> $request->output_date,
        'ubicacion'      => $producto->ubicacion,
    ]);

    return back()->with('success', 'Salida registrada correctamente.');
}


    public function verKit(){

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
