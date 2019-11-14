<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_name',
    ];

    public function users() {
        return $this->hasMany('App\User', 'course_id');
    }
}
