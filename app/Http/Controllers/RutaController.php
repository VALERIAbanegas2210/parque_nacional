<?php

namespace App\Http\Controllers;

use App\Models\Ruta;
use App\Models\comunidad;
use Illuminate\Http\Request;

class RutaController extends Controller
{
    // Método para mostrar las rutas y el formulario de creación al administrador
    public function adminIndex()
    {
        $rutas = Ruta::with('comunidad')->get(); // Obtiene todas las rutas con sus comunidades
        $comunidades = Comunidad::all(); // Obtiene todas las comunidades para el formulario
        return view('administracion.rutas.admin', compact('rutas', 'comunidades'));
    }

    // Método para almacenar una nueva ruta en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'comunidad_id' => 'required|exists:comunidads,id', // Cambiado a "comunidads" en la validación
        ]);

        Ruta::create([
            'nombre' => $request->nombre,
            'comunidad_id' => $request->comunidad_id,
        ]);

        return redirect()->route('admin.rutas.index')->with('success', 'Ruta creada exitosamente.');
    }

    // Método para mostrar las rutas al usuario sin opciones de edición
    public function userIndex()
    {
        $rutas = Ruta::with('comunidad')->get();
        return view('administracion.rutas.user', compact('rutas'));
    }

    // Método para mostrar una ruta específica con su comunidad
    public function show($id)
    {
        // Encuentra una ruta específica y carga la comunidad asociada
        $ruta = Ruta::with('comunidad')->findOrFail($id); // Usar "with" para cargar la relación

        // Retorna la vista 'ruta.show' con los datos de la ruta y su comunidad
        return view('ruta.show', compact('ruta'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'comunidad_id' => 'required|exists:comunidads,id',
        ]);

        $ruta = Ruta::findOrFail($id);
        $ruta->update([
            'nombre' => $request->nombre,
            'comunidad_id' => $request->comunidad_id,
        ]);

        return redirect()->route('admin.rutas.index')->with('success', 'Ruta actualizada exitosamente.');
    }

    // Método para eliminar una ruta
    public function destroy($id)
    {
        $ruta = Ruta::findOrFail($id);
        $ruta->delete();

        return redirect()->route('admin.rutas.index')->with('success', 'Ruta eliminada exitosamente.');
    }
}

