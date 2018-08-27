<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class link extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'link'
    ];
}
