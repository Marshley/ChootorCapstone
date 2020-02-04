<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'booking_id', 'description',
    ];

    public function booked() {
        return $this->belongsTo('App\Booking', 'booking_id');
    }
}
