<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_entrada extends Model
{
    use HasFactory;
    protected $table = 'tipo_entradas';
    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
    ];
}