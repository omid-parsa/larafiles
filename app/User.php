<?php

namespace App;

use App\Models\Package;
use App\Models\Payment;
use App\Models\Subscribe;
use App\Models\UserPackage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // we use these constants in AdminMiddleware
    const ADMIN= 3;
    const USER= 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];
    /**
     * @var array that should not be assignable
     */
    protected $guarded=[
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public $timestamps= false; // in this case laravel do not control time including (created at and updated at)
//if we have different names in table for these fields we do like the following
//const CREATED_AT = 'a column in table';
//const UPDATED_AT = 'a column in table';

    /**
     * @param $value
     * this function is defined to encrypt the password value automatically!
     * with setSthAttribute functions we could make change to data before saving on the database
     * this function is a mutant in laravel
     * getPasswordAttribute or getSthAttribute is a function that we can make change to the data that received from database and display it
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password']=bcrypt($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * this function is used for relation between two table with one to many relation
     * a user could have many payments
     * a payment only belongs to a user
     */
    public function payment()
    {
        return $this->hasMany(Payment::class, 'payment_user_id');
    }

    public function subscribes()
    {
        return $this->hasMany(Subscribe::class, 'subscribe_user_id');
    }

    public function packages()
    {
        // in this relation we used withpivot method and defined additional columns inside it.
        //in other many to many relations we do not have additional columns we only had two columns for foreign keys
        //but in this relation our table has two more columns named amount and created at
        // we call it like the following
        //$user=User::find(id);
        //$user->packages()->sync ([1 => ['amount'=> 12000, 'created_at'=> date('Y-m-d H:i:s')]]);
        // we assign package with id = 1 for user and set the amount and date at the same time.
        return $this->belongsToMany(Package::class, 'user_packages', 'user_id', 'package_id')->withPivot(['amount', 'created_at']);
    }
}
