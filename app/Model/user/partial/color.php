<?php

namespace App\Model\user\partial;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class color extends Model
{




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
