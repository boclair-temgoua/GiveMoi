<?php

namespace App\Model\user\partial\slides;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class slidescontact extends Model
{
    // Table
    protected $table = 'slidescontacts';
    // Timestamps
    public $timestamps = true;


    protected $fillable = [ 'slide_contact','status'];



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
                'source' => 'slide_contact',
                'separator' => '-'
            ]

        ];
    }
}
