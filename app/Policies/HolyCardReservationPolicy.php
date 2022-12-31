<?php

namespace App\Policies;

use App\Models\HolyCardReservation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HolyCardReservationPolicy
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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HolyCardReservation  $holycardReservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, HolyCardReservation $holycardReservation)
    {
        if ($user->id === $holycardReservation->user_id) {
            return true;
        }
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role === 'user';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HolyCardReservation  $holycardReservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, HolyCardReservation $holycardReservation)
    {
        if ($user->id === $holycardReservation->user_id) {
            return true;
        }
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HolyCardReservation  $holycardReservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, HolyCardReservation $holycardReservation)
    {
        if ($user->id === $holycardReservation->user_id) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HolyCardReservation  $holycardReservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, HolyCardReservation $holycardReservation)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HolyCardReservation  $holycardReservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, HolyCardReservation $holycardReservation)
    {
        return false;
    }
}
