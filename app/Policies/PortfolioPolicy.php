<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\PortfolioManagement\Portfolio;
use Illuminate\Auth\Access\HandlesAuthorization;

class PortfolioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the portfolio can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the portfolio can view the model.
     */
    public function view(User $user, Portfolio $model): bool
    {
        return true;
    }

    /**
     * Determine whether the portfolio can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the portfolio can update the model.
     */
    public function update(User $user, Portfolio $model): bool
    {
        return true;
    }

    /**
     * Determine whether the portfolio can delete the model.
     */
    public function delete(User $user, Portfolio $model): bool
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
     * Determine whether the portfolio can restore the model.
     */
    public function restore(User $user, Portfolio $model): bool
    {
        return false;
    }

    /**
     * Determine whether the portfolio can permanently delete the model.
     */
    public function forceDelete(User $user, Portfolio $model): bool
    {
        return false;
    }
}
