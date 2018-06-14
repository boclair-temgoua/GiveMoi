<?php

namespace App\Model\user;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic;

class about extends Model
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
                'source' => 'fullname',
                'separator' => '+'
            ]

        ];
    }
}
