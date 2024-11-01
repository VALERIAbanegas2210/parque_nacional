<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comunidad extends Model
{
    use HasFactory;
    protected $table = 'comunidads';
    protected $fillable = [
        'nombre',
        'descripcion',
        'zona',
    ];
    //relacion de 1 a muchos con supervisa
    public function supervisas()
    {
        return $this->hasMany(Supervisa::class,'comunidad_id');
    }
    public function rutas() {
        return $this->hasMany(Ruta::class);
    }

    public function showCommunity($id)
    {
    $comunidad = Comunidad::with('rutas')->findOrFail($id);
    return view('ruta.show', compact('comunidad'));
    }

}