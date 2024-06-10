<?php

namespace App\Policies;

use App\Models\Admin\BlogManagement\Blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the blog can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the blog can view the model.
     */
    public function view(User $user, Blog $model): bool
    {
        return true;
    }

    /**
     * Determine whether the blog can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the blog can update the model.
     */
    public function update(User $user, Blog $model): bool
    {
        return true;
    }

    /**
     * Determine whether the blog can delete the model.
     */
    public function delete(User $user, Blog $model): bool
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
     * Determine whether the blog can restore the model.
     */
    public function restore(User $user, Blog $model): bool
    {
        return false;
    }

    /**
     * Determine whether the blog can permanently delete the model.
     */
    public function forceDelete(User $user, Blog $model): bool
    {
        return false;
    }
}
