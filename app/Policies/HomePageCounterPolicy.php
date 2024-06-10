<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\HomePageManagement\HomePageCounter;
use Illuminate\Auth\Access\HandlesAuthorization;

class HomePageCounterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the homePageCounter can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the homePageCounter can view the model.
     */
    public function view(User $user, HomePageCounter $model): bool
    {
        return true;
    }

    /**
     * Determine whether the homePageCounter can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the homePageCounter can update the model.
     */
    public function update(User $user, HomePageCounter $model): bool
    {
        return true;
    }

    /**
     * Determine whether the homePageCounter can delete the model.
     */
    public function delete(User $user, HomePageCounter $model): bool
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
     * Determine whether the homePageCounter can restore the model.
     */
    public function restore(User $user, HomePageCounter $model): bool
    {
        return false;
    }

    /**
     * Determine whether the homePageCounter can permanently delete the model.
     */
    public function forceDelete(User $user, HomePageCounter $model): bool
    {
        return false;
    }
}
