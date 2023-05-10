<?php

namespace App\Policies;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OwnerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return Owner::where('agent_id', $user->id)->get();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Owner $owner): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Owner $owner): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Owner $owner)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Owner $owner)
    {
        //
    }
    public function viewCars(User $user, Owner $owner)
    {
        if ($user->id === $owner->agent_id) {
            return $owner->cars()->get();
        }
        return false;
    }

}
