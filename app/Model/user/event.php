<?php

namespace App\Model\user;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{


    protected $fillable = [

        'title',
        'country',
        'body',
        'city',
        'category',
        'summary',
        'name',
        'color',
        'tag',
        'slug',
        'status',
        'image',
        'user_id',
        'event_tags',
        'event_categories',
        'category_id',

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
                'source' => 'title',
                'separator' => '+'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    // Table Name
    protected $table = 'events';

    // Primary Key

    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;


    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }


    public function tags()
    {
        return $this->belongsToMany('App\Model\user\tag','event_tags')->withTimestamps();
    }


    public function categories()
    {
        return $this->belongsToMany('App\Model\user\category','event_categories')->withTimestamps();
    }

}
