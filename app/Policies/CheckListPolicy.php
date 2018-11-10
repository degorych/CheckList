<?php

namespace App\Policies;

use App\User;
use App\CheckList;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckListPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Update policy
     *
     * @param User|null $user
     * @param CheckList $checkList
     * @return bool
     */
    public function update(?User $user, CheckList $checkList)
    {
        if ($checkList->user_id === null) {
            return false;
        }

        return $user->id === $checkList->user_id;
    }

    public function show(?User $user, CheckList $checkList)
    {
        if ($checkList->user_id === null) {
            return true;
        } else {
            return $checkList->user_id === $user->id;
        }
    }
}
