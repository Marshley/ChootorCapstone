<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function schedules() {
        return $this->hasMany('App\UserSchedule', 'location_id');
    }

    public function users() {
        return $this->hasMany('App\User', 'location_id');
    }
}
