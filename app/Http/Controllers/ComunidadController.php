<?php

namespace App\Http\Controllers;

use App\Models\comunidad;
use App\Http\Requests\StorecomunidadRequest;
use App\Http\Requests\UpdatecomunidadRequest;
use Illuminate\Http\Request;

class ComunidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comunidades = comunidad::all();
        return view('administracion.comunidades.index', compact('comunidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|text',
            'zona' => 'required|string|max:500',
        ]);

        // Crear nueva entrada
        comunidad::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'zona' => $request->zona,
        ]);

        return redirect()->route('admin.comunidades.index')->with('success', 'Entrada creada exitosamente');
    }

    /**
     * Display the specified resource.
     */

    public function show_villa_amoboro($id)
    {
        // Busca la comunidad por ID
        $comunidad = comunidad::findOrFail($id); // Obtener la comunidad por ID

        // Carga la vista correcta
        return view('usuarios.comunidad.villa_amboro', compact('comunidad'));
    }

    public function show_jardin_de_las_delicias($id)
    {
        // Busca la comunidad por ID
        $comunidad = comunidad::findOrFail($id); // Obtener la comunidad por ID

        // Carga la vista correcta
        return view('usuarios.comunidad.jardin_de_las_delicias', compact('comunidad'));
    }

    public function show_la_chonta($id)
    {
        // Busca la comunidad por ID
        $comunidad = comunidad::findOrFail($id); // Obtener la comunidad por ID

        // Carga la vista correcta
        return view('usuarios.comunidad.la_chonta', compact('comunidad'));
    }

    public function show_mataracu($id)
    {
        // Busca la comunidad por ID
        $comunidad = comunidad::findOrFail($id); // Obtener la comunidad por ID

        // Carga la vista correcta
        return view('usuarios.comunidad.mataracu', compact('comunidad'));
    }

    public function show_oriente($id)
    {
        // Busca la comunidad por ID
        $comunidad = comunidad::findOrFail($id); // Obtener la comunidad por ID

        // Carga la vista correcta
        return view('usuarios.comunidad.oriente', compact('comunidad'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comunidad $comunidad)
    {
        return view('admin.comunidades.edit', compact('comunidad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comunidad $comunidad)
    {
        // Validar los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string', // Cambiado a 'string' y puedes ajustar el max según tus necesidades
            'zona' => 'required|string|max:500',
        ]);

        // Actualizar la comunidad
        $comunidad->update($request->all());

        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.comunidades.index')->with('success', 'Entrada actualizada correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comunidad $comunidad)
    {
        //
    }
}