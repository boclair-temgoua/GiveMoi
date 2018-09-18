<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Invitation
 *
 * @package App
 * @property string $event
 * @property string $email
 * @property string $sent_at
 * @property string $accepted_at
 * @property string $rejected_at
 */
class invitation extends Model
{
    use SoftDeletes;

    protected $fillable = ['email', 'sent_at', 'accepted_at', 'rejected_at', 'event_id'];


    /**
     * Set to null if empty
     * @param $input
     */
    public function setEventIdAttribute($input)
    {
        $this->attributes['eventment_id'] = $input ? $input : null;
    }

    public function eventment()
    {
        return $this->belongsTo(Eventment::class, 'eventment_id')->withTrashed();
    }
}
