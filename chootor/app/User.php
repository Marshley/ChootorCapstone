<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'middleinitial', 'email', 'password', 'school_id', 'user_type', 'status', 'rate', 'location_id', 'image', 'course_id' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public function schedules() {
        return $this->hasMany('App\UserSchedule', 'tutor_id');
    }

    public function bookings() {
        return $this->hasMany('App\Booking', 'tutee_id');
    }

    public function location() {
        return $this->belongsTo('App\Location', 'location_id');
    }

    public function course() {
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function getScheduleCount($day) {
        // return Booking::where([["tutor_id",$this->id], ["day",$day]])->count();
        return Booking::join('user_schedules', 'user_schedules.id', 'bookings.schedule_id')
                        ->where([
                            ['user_schedules.tutor_id', $this->id], 
                            ['user_schedules.day', $day],
                            ['bookings.status', 'approved']
                        ])->count();
    } 
    
}
