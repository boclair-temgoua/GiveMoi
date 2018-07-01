<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class comment extends Model
{


    protected $fillable = [
        'comment',
        'name',
        'email',
        'user_id',
        'event_id',
        'post_id',
        'reply_id'
    ];
    protected $table = 'comments';

    /* like config */

    public function likes()
    {
        return $this->hasMany('App\Model\user\like');
    }


    /* End Like */





    public function events()
    {
        return $this->belongsTo('App\Model\user\event');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }




    public function replies()
    {
        return $this->hasMany('App\Model\user\comment', 'parent_id');
    }
}
