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
        $week_start = strtotime("monday this week");
        $week_end = strtotime("sunday this week");
        $tutor_list = User::where('user_type','tutor')->where('status', 'approved')->get();
        // $tutors = [];
        // foreach ($tutor_list as $tutor){
        //     $schedules = UserSchedule::whereBetween('created_at',[$week_start,$week_end])->get();
            // $tutor[] = [
            //     'schedules' => $schedules,
            // ];
            // $tutors[] = [
            //     'user' => $tutor,
            //     'schedules' => $schedules,
            // ];
    //         echo $schedules;
    //     }
    //    return $tutor_list; 
        return view('tutee.dashboard')->with('tutor_list', $tutor_list );
    }
    
    // START OF TUTEE PROFILE UPDATE
    public function tuteeprofile()
    {
        $user = User::find(auth()->user()->id); 
        return view('tutee.profile')->with('user', $user);
    }

    public function updateprofile(Request $request, User $user)
    {
        $user = User::find(auth()->user()->id);
        $user->update($request->toArray());
        return redirect('/tuteeprofile');
    }
    // END OF TUTEE PROFILE UPDATE

    public function store(Request $request, UserSchedule $userschedule)
    {
        $user = $request->user()->id;
        $schedules = $request->schedules;
        foreach ($schedules as $schedule){
            Booking::create(array_merge($request->toArray(), ['tutee_id' => $user, 
            'schedule_id' => $schedule]));
        } 
        // $users = User::where($request->user()->id)->first();
        // $users = User::where($user->bookings)->first();
        // $users->notify( new \App\Notifications\BookingRequestNotification('Tutor has been '.$users->status));

        return redirect('/tuteedashboard');
    }

}
