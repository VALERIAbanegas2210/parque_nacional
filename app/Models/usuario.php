<?php

namespace App\Models;

use Illuminate\Container\Attributes\Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable; // Cambiar Model a Authenticatable
use Illuminate\Contracts\Auth\MustVerifyEmail; // Importa esta interfaz
use Spatie\Permission\Models\Role;

class usuario extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, HasFactory;
    // Si tu tabla de usuarios no sigue el nombre predeterminado (usuarios), defínelo aquí
    protected $table = 'usuarios';
    protected $guard_name = 'usuarios'; // Asegúrate de que esto esté configurado
    // Si tu campo de clave primaria tiene un nombre distinto de 'id', especifica aquí
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'usuario',
        'correo',
        'contraseña',
        'ci',
        'edad',
        'sexo',
        'pasaporte',
        'nacionalidad',
        'profile_image',
    ];
}