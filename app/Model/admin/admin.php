<?php

namespace App\Model\admin;

use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Intervention\Image\Facades\Image;


class admin extends Authenticatable
{
    use Notifiable;

    protected $guarded = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'confirmation_token',
        'avatar',
        'avatarcover',
        'gender',
        'telephone',
        'cellphone',
        'image',
        'avatar',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }



    /**
     * @param $avatar
     * @return string
     */
    public function getAvatarAttribute($avatar)
    {
        if ($avatar)
        {
            return "/assets/img/admin/profile/{$this->id}.jpg";
        }
        return "assets/img/admin/profile/face.jpg";
    }
    public function setAvatarAttribute($avatar)
    {
        if (is_object($avatar) && $avatar->isValid())
        {
            Image::make($avatar)->fit(300,300)->save(public_path()."/assets/img/admin/profile/{$this->id}.jpg");
            $this->attributes['avatar'] = true;
        }
    }
}
