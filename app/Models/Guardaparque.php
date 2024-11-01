<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardaparque extends Model
{
    use HasFactory;

    protected $table = 'guardaparques';
    /*     $table->string('CI');
            $table->string('nombre');
            $table->integer('edad')->unsigned();
            $table->string('sexo')->nullable();
            $table->string('correo')->unique();
            $table->string('contraseña'); */
    protected $fillable = ['CI','nombre', 'edad', 'sexo', 'correo','nroCelular','contraseña'];
    //relacion de 1 a muchos con supervisa
    public function supervisas()
    {
        return $this->hasMany(Supervisa::class, 'guardaparque_id');
    }
    
}
