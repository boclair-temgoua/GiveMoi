<?php

namespace App\Model\user;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function events()
    {
        return $this->belongsToMany('App\Model\user\event','category_events')->orderBy('created_at','DESC')->paginate(10);
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
