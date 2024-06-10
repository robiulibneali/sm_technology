<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\ServiceManagement\OurServiceCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class OurServiceCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the ourServiceCategory can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the ourServiceCategory can view the model.
     */
    public function view(User $user, OurServiceCategory $model): bool
    {
        return true;
    }

    /**
     * Determine whether the ourServiceCategory can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the ourServiceCategory can update the model.
     */
    public function update(User $user, OurServiceCategory $model): bool
    {
        return true;
    }

    /**
     * Determine whether the ourServiceCategory can delete the model.
     */
    public function delete(User $user, OurServiceCategory $model): bool
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
     * Determine whether the ourServiceCategory can restore the model.
     */
    public function restore(User $user, OurServiceCategory $model): bool
    {
        return false;
    }

    /**
     * Determine whether the ourServiceCategory can permanently delete the model.
     */
    public function forceDelete(User $user, OurServiceCategory $model): bool
    {
        return false;
    }
}
