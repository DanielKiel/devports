<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

abstract class AbstractPolicyOfGod
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->is_god === true) {
            return true;
        }
    }
}
