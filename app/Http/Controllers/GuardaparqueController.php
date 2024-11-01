<?php

namespace App\Http\Controllers;

use App\Models\comunidad;
use App\Models\Dia;
use App\Models\Guardaparque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GuardaparqueController extends Controller
{
    /**
     * Mostrar una lista de los guardaparques.
     */
    public function index()
    {
        $guardaparques = Guardaparque::all();
        return view('administracion.guardaparques.indexGuarda', compact('guardaparques'));
    }

     /**
     * Mostrar el formulario para crear un nuevo guardaparque.
     */
    public function create()
    {
        return view('administracion.guardaparques.crearGuardaparque');
    }

    /**
     * Almacenar un nuevo guardaparque en la base de datos.
     */
    public function store(Request $request)
    {   
        //dd($request->all());
        //validacion
        $request->validate([
            'CI' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'edad' => 'required|integer|min:3',
            'sexo' => 'nullable|string|max:10',
            'correo' => 'required|email|unique:guardaparques',
            'nroCelular' => 'required|string|max:15',
            'contraseña' => 'required|string|min:4',
        ]);
        
        Guardaparque::create([
            'CI' => $request->CI,
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'sexo' => $request->sexo,
            'correo' => $request->correo,
            'nroCelular' => $request->nroCelular,
            'contraseña' => Hash::make($request->contraseña),
        ]);
        return redirect()->back()->with('success', 'Guardaparque creado con éxito.');
    }

    /**
     * Mostrar los detalles de un guardaparque específico.
     */
    public function show(Guardaparque $guardaparque)
    {
        return view('guardaparques.show', compact('guardaparque'));
    }

     /**
     * Mostrar el formulario para editar un guardaparque específico.
     */
    public function edit($id)
    {
        $guardaparque=Guardaparque::findOrFail($id);
        /*$queryListaSupervisa="SELECT SUPERVISAS.ID AS SUPERVISA_ID,COMUNIDADS.NOMBRE,COMUNIDADS.ZONA,HORARIOS.ID AS HORARIO_ID,DIAS.NOMBRE,HORA_INICIO,HORA_FIN
    FROM GUARDAPARQUES,SUPERVISAS,HORARIOS,DIAS,COMUNIDADS
    WHERE GUARDAPARQUES.ID=SUPERVISAS.GUARDAPARQUE_ID AND SUPERVISAS.ID=SUPERVISA_ID AND DIA_ID=DIAS.ID
    AND COMUNIDADS.ID=COMUNIDAD_ID
    AND GUARDAPARQUES.ID=$id;"*/
        $lugaresHorariosAsignadosAGuardaparque=DB::select('CALL OBTENER_COMUNIDADES_Y_HORARIO_DE_GUARDAPARQUES(?)',[$id]);
         // Convertir horas de 'H:i:s' a 'H:i'
        foreach ($lugaresHorariosAsignadosAGuardaparque as $asignacion) {
            $asignacion->HORA_INICIO = substr($asignacion->HORA_INICIO, 0, 5); // Extraer 'H:i'
            $asignacion->HORA_FIN = substr($asignacion->HORA_FIN, 0, 5);       // Extraer 'H:i'
        }
        $comunidades = comunidad::all();
        $dias = Dia::all();

        $comunidadesAsignadas = DB::select("
        SELECT supervisas.id AS supervisa_id, comunidads.nombre AS comunidad_nombre 
        FROM guardaparques
        JOIN supervisas ON guardaparques.id = supervisas.guardaparque_id
        JOIN comunidads ON supervisas.comunidad_id = comunidads.id
        WHERE guardaparques.id = ?", [$id]);
    
        return view('administracion.guardaparques.editarGuardaparque', compact(
            'guardaparque', 'lugaresHorariosAsignadosAGuardaparque',
             'comunidades', 'dias','comunidadesAsignadas'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $guardaparque = Guardaparque::findOrFail($id);
        $request->validate([
            'CI' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'edad' => 'required|integer|min:18',
            'sexo' => 'nullable|string|max:10',
            'correo' => 'required|email|unique:guardaparques,correo,' . $guardaparque->id,
            'nroCelular' => 'required|string|max:15',
            'contraseña' => 'nullable|string|min:8',
        ]);
    
        $data = $request->except(['contraseña']);
        if ($request->filled('contraseña')) {
            $data['contraseña'] = Hash::make($request->contraseña);
        }
    
        $guardaparque->fill($data);
        $guardaparque->save();
    
        return redirect()->back()->with('success', 'Guardaparque actualizado con éxito.');
    

    }

    /**
     * Eliminar un guardaparque de la base de datos.
     */

    public function destroy($id)
    {
        $guardaparque = Guardaparque::findOrFail($id);
        try {
            $guardaparque->delete();
            //return redirect()->back()->with('success', 'Guardaparque eliminado con éxito.');
            return redirect()->route('admin.guardaparque.index')->with('success', 'Guardaparque eliminado con éxito.');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo eliminar el guardaparque. Puede estar relacionado con otros datos.');
        }
    }
}
