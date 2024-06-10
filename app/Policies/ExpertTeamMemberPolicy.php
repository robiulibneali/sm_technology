<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\AdditionalFeaturesManagement\ExpertTeamMember;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpertTeamMemberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the expertTeamMember can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the expertTeamMember can view the model.
     */
    public function view(User $user, ExpertTeamMember $model): bool
    {
        return true;
    }

    /**
     * Determine whether the expertTeamMember can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the expertTeamMember can update the model.
     */
    public function update(User $user, ExpertTeamMember $model): bool
    {
        return true;
    }

    /**
     * Determine whether the expertTeamMember can delete the model.
     */
    public function delete(User $user, ExpertTeamMember $model): bool
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
     * Determine whether the expertTeamMember can restore the model.
     */
    public function restore(User $user, ExpertTeamMember $model): bool
    {
        return false;
    }

    /**
     * Determine whether the expertTeamMember can permanently delete the model.
     */
    public function forceDelete(User $user, ExpertTeamMember $model): bool
    {
        return false;
    }
}
