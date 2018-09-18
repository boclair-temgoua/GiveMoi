<?php

namespace App\Model\user\partial;

use App\Model\user\article;
use App\Model\user\event;
use App\Model\user\presentation;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    protected $table = 'colors';
    protected $fillable = ['color_name', 'is_published'];
    public function events()
    {
        return $this->belongsToMany(Event::class,'event_colors')->withTimestamps();
    }
    public function articles()
    {
        return $this->belongsToMany(Article::class,'article_colors')->withTimestamps();
    }
    public function presentations()
    {
        return $this->belongsToMany(Presentation::class,'presentation_colors');
    }



    public function getRouteKeyName()
    {
        return 'slug';
    }

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
                'source' => 'color_name',
                'separator' => '+'
            ],
        'color_slug' => [
                'source' => 'color_name',
                'separator' => '+'
            ]

        ];
    }
}
