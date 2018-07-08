<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class invite extends Model
{
    protected $fillable = [
        'email', 'token'
    ];
}
