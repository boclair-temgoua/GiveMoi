<?php

namespace App\Model\user\partial\slides;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class slidesabout extends Model
{


    // Table
    protected $table = 'slidesabouts';
    // Timestamps
    public $timestamps = true;


    protected $fillable = [ 'slide_about','status'];



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
                'source' => 'slide_about',
                'separator' => '-'
            ]

        ];
    }
}
