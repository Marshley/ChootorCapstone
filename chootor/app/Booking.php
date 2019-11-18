<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'schedule_id', 'tutee_id', 'status', 'subtopic', 'rate', 'comment',
    ];

    public function schedule() {
        return $this->belongsTo('App\UserSchedule', 'schedule_id');
    }

    public function tutee() {
        return $this->belongsTo('App\User', 'tutee_id');
    }
}
