<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserSchedule;
use App\Booking;

class TuteeController extends Controller
{
    public function index(Request $request)
    {
        $week_start = date("Y-m-d",strtotime("monday this week"))." 00:00:00";
        $week_end = date("Y-m-d",strtotime("saturday this week"))." 23:59:59";
        $tutor_list = User::where('user_type','tutor')->where('status', 'approved')->get();
        $tutors = [];
        foreach ($tutor_list as $tutor){
            $schedules = UserSchedule::whereBetween('created_at',[$week_start,$week_end])->get();
            $schedule_list = [];
            foreach ($schedules as $sched){
                $isBooked = Booking::where('schedule_id',$sched->id)->exists();
                $isDisapproved = Booking::where('schedule_id',$sched->id )->where('status', 'disapproved')->first();

                if(!$isBooked or $isDisapproved){
                    $schedule_list[] = $sched;
                }
            }

            $tutors[] = [
                'user' => $tutor,
                'schedules' => $schedule_list,
            ];
        }
        return view('tutee.dashboard')->with('tutors', $tutors );
    }
    
    // START OF TUTEE PROFILE UPDATE
    public function tuteeprofile()
    {
        $user = User::find(auth()->user()->id); 
        return view('tutee.profile')->with('user', $user);
    }

    public function updateprofile(Request $request, User $user)
    {
        // $this->validate(request(),[
        //     'password' => 'required',
        //     'password' => 'required|confirmed',
        // ]);
        
        $user = User::find(auth()->user()->id);
        $user->update($request->toArray());
        return redirect('/tuteeprofile');
    }
    // END OF TUTEE PROFILE UPDATE

    public function store(Request $request)
    {
        $user = $request->user()->id;
        $schedules = $request->schedules_list;
        foreach ($schedules as $schedule){
            $booking = Booking::create(['tutee_id' => $user, 'schedule_id' => $schedule]);

            $userschedule = UserSchedule::find($schedule);
            $tutor = $userschedule->tutor;
            $tutor->notify(new \App\Notifications\BookingRequestNotification('A tutee '. $userschedule->booking->tutee->firstname . ' ' . $userschedule->booking->tutee->lastname .' has booked your schedule'));
        } 

        // NOTIFY TUTOR IF SCHED IS BOOKED BY TUTEE
        // $notification = User::where($user->schedules)->get();
        // $tutor = $userschedules->tutor;
        // $tutor->notify( new \App\Notifications\BookingRequestNotification('Tutor has been '.$booking->status));

        return redirect('/tuteedashboard');
    }

}
