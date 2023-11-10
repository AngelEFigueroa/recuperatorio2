<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    
    use HandlesAuthorization;

    public function viewList(User $user): Response
    {
        if ($user->hasRole('vendedor')) {
            return Response::allow();
        } else {
            // Agrega un mensaje de depuración
            info('Permiso denegado para vendedor');
            return Response::deny('No tienes permiso para ver este producto.');
        }
    }
    public function view(User $user): Response
    {
        return $user->hasRole('vendedor') ? Response::allow() : Response::deny('No tienes permiso para ver este producto.');
    }
    
    public function create(User $user): Response
    {
        return $user->hasRole('vendedor') ? Response::allow() : Response::deny('No tienes permiso para crear productos.');
    }
    
    public function update(User $user): Response
    {
        return $user->hasRole('vendedor') ? Response::allow() : Response::deny('No tienes permiso para actualizar este producto.');
    }
    
    public function delete(User $user): Response
    {
        return $user->hasRole('vendedor') ? Response::allow() : Response::deny('No tienes permiso para eliminar este producto.');
    }
    
    public function restore(User $user): Response
    {
        return $user->hasRole('vendedor') ? Response::allow() : Response::deny('No tienes permiso para restaurar este producto.');
    }
    
    public function forceDelete(User $user): Response
    {
        return $user->hasRole('vendedor') ? Response::allow() : Response::deny('No tienes permiso para eliminar permanentemente este producto.');
    }
}  