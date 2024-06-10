<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\ServiceManagement\OurService;
use Illuminate\Auth\Access\HandlesAuthorization;

class OurServicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the ourService can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the ourService can view the model.
     */
    public function view(User $user, OurService $model): bool
    {
        return true;
    }

    /**
     * Determine whether the ourService can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the ourService can update the model.
     */
    public function update(User $user, OurService $model): bool
    {
        return true;
    }

    /**
     * Determine whether the ourService can delete the model.
     */
    public function delete(User $user, OurService $model): bool
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
     * Determine whether the ourService can restore the model.
     */
    public function restore(User $user, OurService $model): bool
    {
        return false;
    }

    /**
     * Determine whether the ourService can permanently delete the model.
     */
    public function forceDelete(User $user, OurService $model): bool
    {
        return false;
    }
}
