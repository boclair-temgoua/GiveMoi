<?php

namespace App\Model\user;

use App\Model\user\partial\color;
use App\User;
use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Overtrue\LaravelFollow\Traits\CanBeFavorited;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Overtrue\LaravelFollow\Traits\CanBeVoted;

class article extends Model
{
    use CanBeLiked, CanBeFavorited, CanBeVoted;


    use SoftDeletes;
    use Concern\Taggable;

    protected $dates = ['deleted_at'];

    protected $fillable = [

        'title',
        'body',
        'summary',
        'color',
        'slug',
        'status',
        'user_id',
        'event_tags',
        'article_category',
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
    protected $table = 'articles';

    // Primary Key

    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function colors()
    {
        return $this->belongsToMany(Color::class,'article_colors')->withTimestamps();
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class,'article_categories')->withTimestamps();
    }


    //comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }



    public function tags()
    {
        return $this->belongsToMany(tag::class,'article_tag')->withTimestamps();
    }



    
}
