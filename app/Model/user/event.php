<?php

namespace App\Model\user;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{


    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    // Table Name
    protected $table = 'events';

    // Primary Key

    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    //Fillable
    protected $fillable = array('title, image, text, user_id');

    public function user()
    {
        return $this->belongsTo('App\User','User_id');
    }
}
