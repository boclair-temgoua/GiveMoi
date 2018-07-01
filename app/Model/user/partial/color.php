<?php

namespace App\Model\user\partial;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class color extends Model
{

    public function events()
    {
        return $this->belongsToMany('App\Model\user\event','event_colors')->withTimestamps();
    }
    public function presentations()
    {
        return $this->belongsToMany('App\Model\user\presentation','presentation_colors')->withTimestamps();
    }



    public function getRouteKeyName()
    {
        return 'slug';
    }

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
                'source' => 'name',
                'separator' => '+'
            ]

        ];
    }
}
