<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table= 'subscribes';
    protected $primaryKey='subscribe_id';
    protected $guarded=['subscribe_id'];

    protected $dates=[
        'subscribe_expired_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'subscribe_user_id');
    }
}
