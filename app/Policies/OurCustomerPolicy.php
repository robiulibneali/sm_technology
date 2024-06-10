<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\AdditionalFeaturesManagement\OurCustomer;
use Illuminate\Auth\Access\HandlesAuthorization;

class OurCustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the ourCustomer can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the ourCustomer can view the model.
     */
    public function view(User $user, OurCustomer $model): bool
    {
        return true;
    }

    /**
     * Determine whether the ourCustomer can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the ourCustomer can update the model.
     */
    public function update(User $user, OurCustomer $model): bool
    {
        return true;
    }

    /**
     * Determine whether the ourCustomer can delete the model.
     */
    public function delete(User $user, OurCustomer $model): bool
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
     * Determine whether the ourCustomer can restore the model.
     */
    public function restore(User $user, OurCustomer $model): bool
    {
        return false;
    }

    /**
     * Determine whether the ourCustomer can permanently delete the model.
     */
    public function forceDelete(User $user, OurCustomer $model): bool
    {
        return false;
    }
}
