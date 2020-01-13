<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evaluation extends Model
{
    protected $fillable = [
       'booking_id, prof_name, rating',
    ];

    public function booking() {
        return $this->belongsTo('App\Booking', 'booking_id');
    }
}
