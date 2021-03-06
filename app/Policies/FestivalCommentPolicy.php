<?php

namespace App\Policies;

use App\Models\FestivalComment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FestivalCommentPolicy
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
     * @param  \App\Models\FestivalComment  $festivalComment
     * @return mixed
     */
    public function view(User $user, FestivalComment $festivalComment)
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
        return $user->checkIn->count() >= 5;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FestivalComment  $festivalComment
     * @return mixed
     */
    public function update(User $user, FestivalComment $festivalComment)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FestivalComment  $festivalComment
     * @return mixed
     */
    public function delete(User $user, FestivalComment $festivalComment)
    {
        return $user->id == $festivalComment->user_id || $user->admin();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FestivalComment  $festivalComment
     * @return mixed
     */
    public function restore(User $user, FestivalComment $festivalComment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FestivalComment  $festivalComment
     * @return mixed
     */
    public function forceDelete(User $user, FestivalComment $festivalComment)
    {
        //
    }
}
