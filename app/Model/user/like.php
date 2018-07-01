<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class like extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'likeables';

    // Primary Key

    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;


    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type',
    ];

    public function comments()
    {
        return $this->belongsTo('App\Model\user\comment');
    }
    public function events()
    {
        return $this->morphedByMany('App\Model\user\event','likeable');
    }






    public function posts()
    {
        return $this->morphedByMany('App\Model\user\Post', 'likeable');
    }


    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
