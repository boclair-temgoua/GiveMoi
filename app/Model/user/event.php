<?php

namespace App\Model\user;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelFollow\Traits\CanBeFavorited;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Overtrue\LaravelFollow\Traits\CanBeVoted;

class event extends Model
{
    use CanBeLiked, CanBeFavorited, CanBeVoted;


    use SoftDeletes;

    protected $dates = ['deleted_at'];

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

    //Likeable


    public function likes()
    {
        return $this->morphToMany('App\User', 'likeable')->whereDeletedAt(null);
    }

    public function getIsLikedAttribute()
    {
        $like = $this->likes()->whereUserId(Auth::id())->first();
        return (! is_null($like)) ? true : false;
    }

    //



    public function comments()
    {
        return $this->hasMany('App\Model\user\comment');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Model\user\tag','event_tags')->withTimestamps();
    }
    public function colors()
    {
        return $this->belongsToMany('App\Model\user\partial\color','event_colors')->withTimestamps();
    }


    public function categories()
    {
        return $this->belongsToMany('App\Model\user\category','event_categories')->withTimestamps();
    }

}
