<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\RoleManagement\PermissionCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the permissionCategory can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the permissionCategory can view the model.
     */
    public function view(User $user, PermissionCategory $model): bool
    {
        return true;
    }

    /**
     * Determine whether the permissionCategory can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the permissionCategory can update the model.
     */
    public function update(User $user, PermissionCategory $model): bool
    {
        return true;
    }

    /**
     * Determine whether the permissionCategory can delete the model.
     */
    public function delete(User $user, PermissionCategory $model): bool
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
     * Determine whether the permissionCategory can restore the model.
     */
    public function restore(User $user, PermissionCategory $model): bool
    {
        return false;
    }

    /**
     * Determine whether the permissionCategory can permanently delete the model.
     */
    public function forceDelete(User $user, PermissionCategory $model): bool
    {
        return false;
    }
}
