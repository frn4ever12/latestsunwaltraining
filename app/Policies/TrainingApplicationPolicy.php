<?php

namespace App\Policies;

use App\Models\TrainingApplication;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TrainingApplicationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TrainingApplication $trainingApplication): bool
    {
        return $user->id == $trainingApplication->user_id || $user->hasAnyRole(['super-admin', 'admin', 'shakha']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TrainingApplication $trainingApplication): bool
    {
        return $user->id == $trainingApplication->user_id || $user->hasAnyRole(['super-admin', 'admin', 'shakha']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TrainingApplication $trainingApplication): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TrainingApplication $trainingApplication): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TrainingApplication $trainingApplication): bool
    {
        return false;
    }
}
