<?php


namespace App\Utility;


class File
{
    public static function user_can_download($user_id)
    {
        $user_subscribe=User::is_user_subscibed($user_id);

        if (!$user_subscribe){
            return false;
        }else{
            if ($user_subscribe->subscribe_download_limit>$user_subscribe->subscribe_download_count){
                return true;
            }else{
                return false;
            }
        }
    }
}