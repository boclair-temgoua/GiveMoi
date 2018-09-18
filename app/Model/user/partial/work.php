<?php

namespace App\Model\user\partial;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class work extends Model
{
    protected $table = 'works';
    protected $fillable = ['name', 'email','speciality_id'];




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
            ],

        ];
    }
}
