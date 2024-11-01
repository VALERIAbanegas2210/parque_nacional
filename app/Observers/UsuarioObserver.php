<?php

namespace App\Observers;

use App\Models\usuario;

class UsuarioObserver
{
    /**
     * Handle the Usuario "created" event.
     */
    public function created(usuario $usuario)
    {
        // Asigna el rol 'usuario' al nuevo usuario
        $usuario->assignRole('usuario');
    }

    /**
     * Handle the Usuario "updated" event.
     */
    public function updated(usuario $usuario): void
    {
        //
    }

    /**
     * Handle the Usuario "deleted" event.
     */
    public function deleted(Usuario $usuario): void
    {
        //
    }

    /**
     * Handle the Usuario "restored" event.
     */
    public function restored(Usuario $usuario): void
    {
        //
    }

    /**
     * Handle the Usuario "force deleted" event.
     */
    public function forceDeleted(Usuario $usuario): void
    {
        //
    }
}