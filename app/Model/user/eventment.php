<?php

namespace App\Model\user;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class eventment extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'eventment_date'];
    //public $dates = ['created_at','updated_at','deleted_at','eventment_date','created_at','updated_at'];


    /**
     * Set attribute to date format
     * @param $input
     */
   public function setEventmentDateAttribute($input)
   {
       if ($input != null && $input != '') {
           $this->attributes['event_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('d/m/Y');
       } else {
           $this->attributes['event_date'] = null;
       }
   }




   //public function setEventmentAttribute($value){

   //    $this->attributes['eventment_date'] = Carbon::createFromFormat('d-m-Y H:i:s', $value)->toDateTimeString();
   //}

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getEventDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function getSentAttribute()
    {
        return $this->invitations()->whereNotNull('sent_at')->count();
    }

    public function getAcceptedAttribute()
    {
        return $this->invitations()->whereNotNull('accepted_at')->count();
    }

    public function getRejectedAttribute()
    {
        return $this->invitations()->whereNotNull('rejected_at')->count();
    }
}
