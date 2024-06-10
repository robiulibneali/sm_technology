<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\HomePageManagement\HomePageSlider;
use Illuminate\Auth\Access\HandlesAuthorization;

class HomePageSliderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the homePageSlider can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the homePageSlider can view the model.
     */
    public function view(User $user, HomePageSlider $model): bool
    {
        return true;
    }

    /**
     * Determine whether the homePageSlider can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the homePageSlider can update the model.
     */
    public function update(User $user, HomePageSlider $model): bool
    {
        return true;
    }

    /**
     * Determine whether the homePageSlider can delete the model.
     */
    public function delete(User $user, HomePageSlider $model): bool
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
     * Determine whether the homePageSlider can restore the model.
     */
    public function restore(User $user, HomePageSlider $model): bool
    {
        return false;
    }

    /**
     * Determine whether the homePageSlider can permanently delete the model.
     */
    public function forceDelete(User $user, HomePageSlider $model): bool
    {
        return false;
    }
}
