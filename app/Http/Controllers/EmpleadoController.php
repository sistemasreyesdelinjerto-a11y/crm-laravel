<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use App\Models\Movimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        $users = User::all(); // <-- Esto obtiene todos los usuarios del CRM

        return view('panel.usuarios.empleados', compact('empleados', 'users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'puesto' => 'required|string',
            'departamento' => 'nullable|string',
            'fecha_ingreso' => 'nullable|date',
            'estatus' => 'required|in:Activo,Inactivo',
            'telefono' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'direccion' => 'nullable|string',
            'identificacion' => 'nullable|string',
            'emergencia_nombre' => 'nullable|string',
            'emergencia_telefono' => 'nullable|string',
            'notas' => 'nullable|string',
            'foto' => 'nullable|image|max:2048', // tamaño max 2MB
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('empleados', 'public');
        }

        $empleado = Empleado::create($data);

        $this->registrarMovimiento('Crear', "Se creó el empleado {$empleado->nombre} {$empleado->apellido}", 'empleados', $empleado->id);

        return redirect()->route('panel.empleados.index')->with('success', 'Empleado creado correctamente.');
    }

    public function update(Request $request, Empleado $empleado)
    {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'puesto' => 'required|string',
            'departamento' => 'nullable|string',
            'fecha_ingreso' => 'nullable|date',
            'estatus' => 'required|in:Activo,Inactivo',
            'telefono' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'direccion' => 'nullable|string',
            'identificacion' => 'nullable|string',
            'emergencia_nombre' => 'nullable|string',
            'emergencia_telefono' => 'nullable|string',
            'notas' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($empleado->foto) {
                Storage::disk('public')->delete($empleado->foto);
            }
            $data['foto'] = $request->file('foto')->store('empleados', 'public');
        }

        $empleado->update($data);

        $this->registrarMovimiento('Editar', "Se actualizó el empleado {$empleado->nombre} {$empleado->apellido}", 'empleados', $empleado->id);

        return redirect()->route('panel.empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        if ($empleado->foto) {
            Storage::disk('public')->delete($empleado->foto);
        }

        $empleado->delete();

        $this->registrarMovimiento('Eliminar', "Se eliminó el empleado {$empleado->nombre} {$empleado->apellido}", 'empleados', $empleado->id);

        return redirect()->route('panel.empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }

    // Método para registrar movimientos
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
