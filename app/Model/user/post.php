<?php

namespace App\Model\user;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{

    protected $fillable = [
        'title',
        'image',
        'category',
        'tag',
        'slug',
        'color_category',
        'status',
        'body',
        'user_id'
    ];

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
                'source' => 'title'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    // Table Name
    protected $table = 'posts';

    // Primary Key

    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;
}
