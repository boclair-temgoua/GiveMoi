<?php

namespace App\Model\user;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function events()
    {
        return $this->belongsToMany('App\Model\user\event','event_categories')->orderBy('created_at','DESC')->paginate(12);
    }
    public $timestamps = true;
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
