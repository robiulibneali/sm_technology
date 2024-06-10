<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\HomePageManagement\HomePageQualityServiceRating;
use Illuminate\Auth\Access\HandlesAuthorization;

class HomePageQualityServiceRatingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the homePageQualityServiceRating can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the homePageQualityServiceRating can view the model.
     */
    public function view(User $user, HomePageQualityServiceRating $model): bool
    {
        return true;
    }

    /**
     * Determine whether the homePageQualityServiceRating can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the homePageQualityServiceRating can update the model.
     */
    public function update(
        User $user,
        HomePageQualityServiceRating $model
    ): bool {
        return true;
    }

    /**
     * Determine whether the homePageQualityServiceRating can delete the model.
     */
    public function delete(
        User $user,
        HomePageQualityServiceRating $model
    ): bool {
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
     * Determine whether the homePageQualityServiceRating can restore the model.
     */
    public function restore(
        User $user,
        HomePageQualityServiceRating $model
    ): bool {
        return false;
    }

    /**
     * Determine whether the homePageQualityServiceRating can permanently delete the model.
     */
    public function forceDelete(
        User $user,
        HomePageQualityServiceRating $model
    ): bool {
        return false;
    }
}
