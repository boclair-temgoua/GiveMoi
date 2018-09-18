<?php

namespace App\Model\user;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class presentation extends Model
{

    //public function getRouteKeyName()
    //{
    //    return 'slug';
    //}

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
                'source' => 'title',
                'separator' => '+'
            ]

        ];
    }



    public function colors()
    {
        return $this->belongsTo('App\Model\user\partial\color');
    }
}
