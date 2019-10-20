<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
    ];

    public function schedules() {
        return $this->hasMany('App\UserSchedule', 'subject_id');
    }
}
