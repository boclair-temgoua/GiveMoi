<?php

namespace App\Model\user;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{

    protected $fillable = [
        'name'
    ];

    public $guarded = [];
    public $timestamps = false;

    public function events()
    {
        return $this->belongsToMany(Event::class,'event_tag')->orderBy('created_at','DESC')->paginate(10);
    }


    public function articles()
    {
        return $this->belongsToMany(Article::class,'article_tag')->orderBy('created_at','DESC')->paginate(10);
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
                'source' => 'name'
            ]
        ];
    }

}
