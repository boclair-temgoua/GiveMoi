<?php

namespace App\Model\user\partial;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class speciality extends Model
{
    protected $table = 'specialities';
    protected $fillable = ['speciality_name'];



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
                'source' => 'speciality_name',
                'separator' => '+'
            ],

        ];
    }
}
