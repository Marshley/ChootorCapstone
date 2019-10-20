<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSchedule extends Model
{
    protected $fillable = [
        'tutor_id', 'subject_id', 'location_id', 'day', 'start_time', 'end_time', 
    ];

    public function booking() {
        return $this->hasOne('App\Booking', 'schedule_id');
    }

    public function tutor() {
        return $this->belongsTo('App\User', 'tutor_id');
    }

    public function subject() {
        return $this->belongsTo('App\Subject', 'subject_id');
    }

    public function location() {
        return $this->belongsTo('App\Location', 'location_id');
    }
}
