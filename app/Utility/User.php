<?php


namespace App\Utility;


use App\Models\Subscribe;
use Carbon\Carbon;

class User
{
    public static function is_user_subscibed($user_id)
    {


        $user = \App\User::find($user_id);
        $user_subscibe = $user->subscribes()->where('subscribe_expired_at', '>=', Carbon::now())->first();

//        return !empty($user_subscibe) && ($user_subscibe instanceof Subscribe);
        return $user_subscibe;
    }
}