<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Comunidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    // Método para que los usuarios puedan ver los comentarios de una comunidad específica
    public function indexUser($comunidadId)
    {
        $comunidad = Comunidad::findOrFail($comunidadId);
        $comentarios = Comentario::where('comunidad_id', $comunidadId)->with('usuario')->latest()->get();
        
        return view('administracion.comentarios.index', compact('comentarios', 'comunidad'));
    }

    // Método para que el usuario guarde un nuevo comentario
    public function store(Request $request, $comunidadId)
    {
        $request->validate([
            'descripcion' => 'required|string|max:1000',
            'puntuacion' => 'required|integer|min:1|max:5',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('comentarios', 'public');
        }

        Comentario::create([
            'usuario_id' => Auth::id(),
            'comunidad_id' => $comunidadId,
            'descripcion' => $request->input('descripcion'),
            'puntuacion' => $request->input('puntuacion'),
            'imagen' => $path,
        ]);

        return redirect()->route('user.comentarios.index', $comunidadId)->with('success', 'Comentario publicado.');
    }

    // Método para que el administrador vea todos los comentarios
    public function indexAdmin()
    {
        $comentarios = Comentario::with(['usuario', 'comunidad'])->latest()->get();
        return view('administracion.comentarios.admin', compact('comentarios'));
    }

    // Método para que el administrador elimine un comentario
    public function destroy(Comentario $comentario)
    {
        $comentario->delete();
        return redirect()->route('admin.comentarios.index')->with('success', 'Comentario eliminado.');
    }
}
