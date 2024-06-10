<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\RoleManagement\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the permission can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the permission can view the model.
     */
    public function view(User $user, Permission $model): bool
    {
        return true;
    }

    /**
     * Determine whether the permission can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the permission can update the model.
     */
    public function update(User $user, Permission $model): bool
    {
        return true;
    }

    /**
     * Determine whether the permission can delete the model.
     */
    public function delete(User $user, Permission $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the permission can restore the model.
     */
    public function restore(User $user, Permission $model): bool
    {
        return false;
    }

    /**
     * Determine whether the permission can permanently delete the model.
     */
    public function forceDelete(User $user, Permission $model): bool
    {
        return false;
    }
}
