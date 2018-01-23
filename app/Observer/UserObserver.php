<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 22.01.18
 * Time: 20:12
 */

namespace App\Observer;


use App\User;
use Carbon\Carbon;

class UserObserver
{
    public function creating(User $user)
    {
        $user->confirmation_code = hash('sha256', (string) Carbon::now() . $user->email);
    }
}