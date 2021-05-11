<?php

namespace App\Policies;

use App\Models\Prayer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PrayerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prayer  $prayer
     * @return mixed
     */
    public function view(?User $user, Prayer $prayer)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
//        return $user->role === User::ROLE_SUPPER_ADMIN;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prayer  $prayer
     * @return mixed
     */
    public function update(User $user, Prayer $prayer)
    {
        return true;
//        return $user->role === User::ROLE_SUPPER_ADMIN ||
//            $user->id === $prayer->owner->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prayer  $prayer
     * @return mixed
     */
    public function delete(User $user, Prayer $prayer)
    {
        return true;
//        return $user->role === User::ROLE_SUPPER_ADMIN ||
//            $user->id === $prayer->owner->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prayer  $prayer
     * @return mixed
     */
    public function restore(User $user, Prayer $prayer)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prayer  $prayer
     * @return mixed
     */
    public function forceDelete(User $user, Prayer $prayer)
    {
        return false;
    }
}
