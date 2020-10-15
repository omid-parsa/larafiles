<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $primaryKey='plan_id';

    protected $guarded = ['plan_id'];

//    public $timestamps = false; // if our table does not have created at updated at, we add this to our model
}
