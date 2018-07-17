<?php

namespace App\Model\user;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public $guarded = [];

    public function events()
    {
        return $this->belongsToMany(Event::class,'event_categories')->orderBy('created_at','DESC')->paginate(12);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class,'article_categories')->orderBy('created_at','DESC')->paginate(12);
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
                'source' => 'name',
                'separator' => '+'
            ]
        ];
    }
}
