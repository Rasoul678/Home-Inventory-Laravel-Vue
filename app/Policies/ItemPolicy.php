<?php

namespace App\Policies;

use App\Item;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any Items.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the Item.
     *
     * @param  User  $user
     * @param  Item  $item
     * @return mixed
     */
    public function view(User $user, Item $item)
    {
        //
    }

    /**
     * Determine whether the user can create Items.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role !== 'user';
    }

    /**
     * Determine whether the user can update the Item.
     *
     * @param  User  $user
     * @param  Item  $item
     * @return mixed
     */
    public function update(User $user, Item $item)
    {
        //
    }

    /**
     * Determine whether the user can delete the Item.
     *
     * @param  User  $user
     * @param  Item  $item
     * @return mixed
     */
    public function delete(User $user, Item $item)
    {
        //
    }

    /**
     * Determine whether the user can restore the Item.
     *
     * @param  User  $user
     * @param  Item  $item
     * @return mixed
     */
    public function restore(User $user, Item $item)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the Item.
     *
     * @param  User  $user
     * @param  Item  $item
     * @return mixed
     */
    public function forceDelete(User $user, Item $item)
    {
        //
    }
}
