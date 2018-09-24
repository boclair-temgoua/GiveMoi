<?php

namespace App\Model\user\partial\slides;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class slidestestimonial extends Model
{

    protected $table = 'slidestestimonials';
    // Timestamps
    public $timestamps = true;


    protected $fillable = [ 'slide_testimonial','status'];



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
                'source' => 'slide_testimonial',
                'separator' => '-'
            ]

        ];
    }   //
}
