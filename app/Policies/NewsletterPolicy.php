<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\AdditionalFeaturesManagement\Newsletter;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsletterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the newsletter can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the newsletter can view the model.
     */
    public function view(User $user, Newsletter $model): bool
    {
        return true;
    }

    /**
     * Determine whether the newsletter can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the newsletter can update the model.
     */
    public function update(User $user, Newsletter $model): bool
    {
        return true;
    }

    /**
     * Determine whether the newsletter can delete the model.
     */
    public function delete(User $user, Newsletter $model): bool
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
     * Determine whether the newsletter can restore the model.
     */
    public function restore(User $user, Newsletter $model): bool
    {
        return false;
    }

    /**
     * Determine whether the newsletter can permanently delete the model.
     */
    public function forceDelete(User $user, Newsletter $model): bool
    {
        return false;
    }
}
