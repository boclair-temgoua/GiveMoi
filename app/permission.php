<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Laratrust\Models\LaratrustPermission;

class permission extends LaratrustPermission
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
            'name' => [
                'source' => 'display_name',
                'separator' => '-'
            ]

        ];
    }
}
