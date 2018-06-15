<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'username',
        'email',
        'password',
        'confirmation_token',
        'avatar',
        'avatarcover',
        'twlink',
        'fblink',
        'instalink',
        'gender',
        'work',
        'telephone',
        'cellphone',
        'body',
        'image',
        'avatar',
        'provider',
        'provider_id'
    ];

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
        return $this->hasMany('App\Model\user\event');
    }
    public function posts()
    {
        return $this->hasMany('App\Model\user\post');
    }




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
            ImageManagerStatic::make($avatarcover)->fit(1600,600)->save(public_path()."/assets/img/cover/{$this->id}.jpg");
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

}
