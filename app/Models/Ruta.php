<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\comunidad; // Comunidad con mayúscula

class Ruta extends Model {

    use HasFactory;

    protected $table = 'ruta';

    // Permitir asignación masiva en los campos nombre y comunidad_id
    protected $fillable = ['nombre', 'comunidad_id'];

    // Definir la relación con el modelo Comunidad
    public function comunidad() {
        return $this->belongsTo(comunidad::class); // Comunidad debe comenzar con mayúscula
    }
}

