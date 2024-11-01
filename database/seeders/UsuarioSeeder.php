<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::create([
            'nombre' => 'Admin User', // Make sure to provide a name
            'usuario' => 'DIEGOADMIN1',
            'correo' => 'diegohonor43@gmail.com',
            'contraseña' => Hash::make('123456789'),
            'ci' => '123456789',
            'edad' => 18,
            'sexo' => 'MASCULINO',
            'pasaporte' => '',
            'nacionalidad' => 'Bolivia',
            'profile_image' => '',
        ])->syncRoles('admin'); // Esto asigna el rol admin al usuario, asegurándote que el guard sea 'usuarios'

        Usuario::create([
            'nombre' => 'John Doe Guarda', // Provide the required 'nombre' field
            'usuario' => 'DIEGO2GUARDIAN1',
            'correo' => 'chambidiego45@gmail.com',
            'contraseña' => Hash::make('123456789'),
            'ci' => '1234123123',
            'edad' => 22,
            'sexo' => 'MASCULINO',
            'pasaporte' => '',
            'nacionalidad' => 'Bolivia',
            'profile_image' => '',
        ])->syncRoles('guardaparque');

        Usuario::create([
            'nombre' => 'fernando', // Provide the required 'nombre' field
            'usuario' => 'muerte',
            'correo' => 'fernando201469@gmail.com',
            'contraseña' => Hash::make('12345678'),
            'ci' => '12345678',
            'edad' => 22,
            'sexo' => 'MASCULINO',
            'pasaporte' => '',
            'nacionalidad' => 'Bolivia',
            'profile_image' => '',
        ])->syncRoles('usuario');

        Usuario::create([
            'nombre' => 'muerte', // Provide the required 'nombre' field
            'usuario' => 'muerte',
            'correo' => 'muerte201469@gmail.com',
            'contraseña' => Hash::make('12345678'),
            'ci' => '12345678',
            'edad' => 22,
            'sexo' => 'MASCULINO',
            'pasaporte' => '',
            'nacionalidad' => 'Bolivia',
            'profile_image' => '',
        ])->syncRoles('usuario');
    }
}