<?php

namespace App\Policies;

use App\Models\LoadOrder;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LoadOrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LoadOrder  $loadOrder
     * @return mixed
     */
    public function view(User $user, LoadOrder $loadOrder)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LoadOrder  $loadOrder
     * @return mixed
     */
    public function update(User $user, LoadOrder $loadOrder)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LoadOrder  $loadOrder
     * @return mixed
     */
    public function delete(User $user, LoadOrder $loadOrder)
    {
		return $user->id === $loadOrder->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LoadOrder  $loadOrder
     * @return mixed
     */
    public function restore(User $user, LoadOrder $loadOrder)
    {
        return $user->id === $loadOrder->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LoadOrder  $loadOrder
     * @return mixed
     */
    public function forceDelete(User $user, LoadOrder $loadOrder)
    {
		return $user->id === $loadOrder->user_id;
    }
}
