<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\AdditionalFeaturesManagement\SiteSettings;
use Illuminate\Auth\Access\HandlesAuthorization;

class SiteSettingsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the siteSettings can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the siteSettings can view the model.
     */
    public function view(User $user, SiteSettings $model): bool
    {
        return true;
    }

    /**
     * Determine whether the siteSettings can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the siteSettings can update the model.
     */
    public function update(User $user, SiteSettings $model): bool
    {
        return true;
    }

    /**
     * Determine whether the siteSettings can delete the model.
     */
    public function delete(User $user, SiteSettings $model): bool
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
     * Determine whether the siteSettings can restore the model.
     */
    public function restore(User $user, SiteSettings $model): bool
    {
        return false;
    }

    /**
     * Determine whether the siteSettings can permanently delete the model.
     */
    public function forceDelete(User $user, SiteSettings $model): bool
    {
        return false;
    }
}
