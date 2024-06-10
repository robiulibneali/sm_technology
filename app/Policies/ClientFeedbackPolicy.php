<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\AdditionalFeaturesManagement\ClientFeedback;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientFeedbackPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the clientFeedback can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the clientFeedback can view the model.
     */
    public function view(User $user, ClientFeedback $model): bool
    {
        return true;
    }

    /**
     * Determine whether the clientFeedback can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the clientFeedback can update the model.
     */
    public function update(User $user, ClientFeedback $model): bool
    {
        return true;
    }

    /**
     * Determine whether the clientFeedback can delete the model.
     */
    public function delete(User $user, ClientFeedback $model): bool
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
     * Determine whether the clientFeedback can restore the model.
     */
    public function restore(User $user, ClientFeedback $model): bool
    {
        return false;
    }

    /**
     * Determine whether the clientFeedback can permanently delete the model.
     */
    public function forceDelete(User $user, ClientFeedback $model): bool
    {
        return false;
    }
}
