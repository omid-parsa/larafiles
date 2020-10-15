<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected  $primaryKey='payment_id';

    protected $guarded =['payment_id'];

    const ONLINE = 1;
    const WALLET = 2;

    const COMPLETE = 1;
    const INCOMPLETE = 2;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * this function is used for relation between two table with one to many relation
     *a user could have many payments
     *a payment only belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'payment_user_id');
    }

    public function payment_method_return()
    {
        switch ($this->attributes['payment_method']){
            case self::ONLINE:
                return 'Online';
                break;
            case self::WALLET:
                return 'Wallet';
                break;
        }
    }

    public function payment_status_return()
    {
        switch ($this->attributes['status']){
            case self::COMPLETE:
                return 'Complete';
                break;
            case self::INCOMPLETE:
                return 'Incomplete';
                break;
        }
    }
}
