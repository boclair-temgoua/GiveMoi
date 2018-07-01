<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class myaccount extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function getRouteKeyName()
    {
        return 'username';
    }
}
