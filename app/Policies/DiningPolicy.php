<?php

namespace App\Policies;

use App\Models\Auth\User;
use App\Models\Hotel\Dining;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiningPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Auth\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Models\Hotel\Dining  $dining
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Dining $dining)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Auth\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Models\Hotel\Dining  $dining
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Dining $dining)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Models\Hotel\Dining  $dining
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Dining $dining)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Models\Hotel\Dining  $dining
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Dining $dining)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Models\Hotel\Dining  $dining
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Dining $dining)
    {
        //
    }
}
