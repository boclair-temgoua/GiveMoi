<?php

namespace App;

use App\Model\user\article;
use App\Model\user\comment;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic;
use Laratrust\Traits\LaratrustUserTrait;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanLike;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, CanFollow,CanBeFollowed,CanLike;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    public $dates = ['created_at', 'updated_at', 'birthday'];

    protected $fillable = [
        'name',
        'last_name',
        'country',
        'first_name',
        'full_name',
        'color_name',
        'username',
        'slug',
        'email',
        'password',
        'facebook_id',
        'confirmation_token',
        'avatar',
        'avatarcover',
        'twlink',
        'fblink',
        'instalink',
        'birthday',
        'sex',
        'work',
        'telephone',
        'cellphone',
        'body',
        'image',
        'avatar',
        'google_id',
        'provider',
        'provider_id'
    ];



   public function setDateOfBirthAttribute($birthday)
   {
       return Carbon::parse($this->attributes['birthday'])->age;

       //$this->attributes['birthday'] = Carbon::createFromFormat('d/m/Y',$birthday);
   }



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function events()
    {
        return $this->hasMany('App\Model\user\event','user_id');
    }
    public function articles()
    {
        return $this->hasMany(Article::class,'user_id');
    }

    /**
     * @return int
     * EventsCont()
     */
    public function getEventsCountAttribute(){
        return $this->events()->count();
    }
    public function getArticlesCountAttribute(){
        return $this->articles()->count();
    }






    public function profile()
    {
        return $this->hasOne('App\Model\user\myaccount');
    }




    //Like init

    public function likedEvents()
    {
        return $this->morphedByMany('App\Model\user\event', 'likeable')->whereDeletedAt(null);
    }

    //like end

    /* Comment init */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    /* End comment */
    /**
     * @param $avatar_cover
     * @return string
     */
    public function getAvatarCoverAttribute($avatarcover)
    {
        if ($avatarcover)
        {
            return "/assets/img/cover/{$this->id}.jpg";
        }
        return "/assets/img/cover/cover.jpg";
    }

    public function setAvatarCoverAttribute($avatarcover)
    {
        if (is_object($avatarcover) && $avatarcover->isValid())
        {
            Image::make($avatarcover)->save(public_path()."/assets/img/cover/{$this->id}.jpg");
            $this->attributes['avatarcover'] = true;
        }

    }


    /**
     * @param $avatar
     * @return string
     */
    public function getAvatarAttribute($avatar)
    {
        if ($avatar)
        {
            return "/assets/img/avatars/{$this->id}.jpg";
        }
        //return "http://via.placeholder.com/150x150";
        return "assets/img/avatars/face.jpg";
    }
    public function setAvatarAttribute($avatar)
    {
        if (is_object($avatar) && $avatar->isValid())
        {
            Image::make($avatar)->fit(300,300)->save(public_path()."/assets/img/avatars/{$this->id}.jpg");
            $this->attributes['avatar'] = true;
        }
    }

    public function setBirthdayAttribute($birthday){
        $this->attributes['birthday'] = Carbon::createFromFormat('d/m/Y', $birthday);
    }

    public function getAgeAttribute(){
        return $this->birthday->diffInYears();
    }


    public function addNew($input)
    {
        $check = static::where('facebook_id',$input['facebook_id'])->first();

        $check = static::where('google_id',$input['google_id'])->first();


        if(is_null($check)){
            return static::create($input);
        }



        return $check;
    }

}
