<?php

namespace App\Model\admin;

use App\Notifications\AdminResetPasswordNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;



class admin extends Authenticatable
{

    use Notifiable,softDeletes, HasRoles;
    //Permission
    protected $guard_name = 'admin';

    protected $table = 'admins';
    protected $guarded = 'admin';



    public function __construct() {

        $this->admin = config('admin.name');
        //$this->email = config('admin.email');
    }

    protected $admin;

    protected $dates = ['created_at', 'updated_at', 'birthday','deleted_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'first_name',
        'body',
        'country',
        'address',
        'work',
        'birthday',
        'color_name',
        'email',
        'password',
        'gender',
        'phone',
        'avatar',
        'admin_id',
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

    public function isAdmin()
    {
        return false;
    }


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


    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function setBirthdayAttribute($birthday){
        $this->attributes['birthday'] = Carbon::createFromFormat('d/m/Y', $birthday);
    }


    public function getAgeAttribute(){
        return $this->birthday->diffInYears();
    }
}
