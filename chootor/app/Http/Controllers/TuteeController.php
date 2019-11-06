<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserSchedule;
use App\Booking;

class TuteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function tuteeprofile()
    {
        return view('tutee.profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
