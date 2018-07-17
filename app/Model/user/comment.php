<?php

namespace App\Model\user;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\Types\Null_;

class comment extends Model
{

   protected $guarded = [];
   protected static $commentable_for = ['Article'];
   protected  $hidden = ['email','ip'];
   protected $appends = ['email_md5','ip_md5'];



    protected $fillable = [
        'comment',
        'name',
        'email',
        'ip',
        'commentable_id',
        'commentable_type',
        'user_id',
        'event_id',
        'post_id',
        'reply'
    ];
    protected $table = 'comments';





    public function getIpMd5Attribute(){
        return md5($this->attributes['ip']);
    }
    public static function allFor($model, $model_id)
    {
        $records = self::where(['commentable_id' => $model_id, 'commentable_type' =>$model])->orderBy('created_at','ASC')->get();
        $comments = [];
        $by_id = [];
        foreach($records as $record){
            if ($record->reply){

                $by_id[$record->reply]->attributes['replies'][] = $record;

            }else{
                $records->attributes['replies'] = [];
                $by_id[$record->id] = $record;
                $comments[] = $record;
            }
        }

        return array_reverse($comments);
    }

    public static function isCommentable($model, $model_id)
    {
        if (!in_array($model, self::$commentable_for)){
            return false;
        }else{
            "\\App\\Model\\user\\$model";

            return $model::where(['id' =>$model_id])->exists();
        }
    }






    /* like config */

    public function likes()
    {
        return $this->hasMany('App\Model\user\like');
    }


    /* End Like */





    public function events()
    {
        return $this->belongsTo('App\Model\user\event');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }




    public function replies()
    {
        return $this->hasMany('App\Model\user\comment', 'parent_id');
    }



}
