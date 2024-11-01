<?php

namespace App\Policies;

use App\Models\Comentario;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ComentarioPolicy
    {
        use HandlesAuthorization;
    
        // Solo el administrador puede ver todos los comentarios
        public function admin(User $user)
        {
            return $user->role === 'admin';
        }
    
        // Un usuario puede eliminar su propio comentario, o un administrador puede eliminar cualquiera
        public function delete(User $user, Comentario $comentario)
        {
            return $user->role === 'admin' || $user->id === $comentario->usuario_id;
        }
    }
}