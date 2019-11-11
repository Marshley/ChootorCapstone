<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserSchedule;
use App\Subject;
use App\Location;
use App\Booking;

class TutorController extends Controller
{
    // TUTOR PROFILE UPDATE
    public function index()
    {
        // PROFILE VIEW
        $user = User::find(auth()->user()->id); 
        return view('tutor.profile')->with('user', $user);
    }

    public function updateprofile(Request $request, User $user)
    {
        $this->validate(request(),[
            'password' => 'required',
            'password' => 'required|confirmed',
        ]);
        
        $user = User::find(auth()->user()->id);
        $user->update($request->toArray());
        return redirect('/tutorprofile');
    }
    // END OF TUTOR PROFILE UPDATE

    public function tutordashboard(Request $request)
    {
        // Tutor approved request | done tutor session VIEW
        $user = User::find(auth()->user()->id);
        return view('tutor.dashboard')->with('user', $user);
    }

    public function workhistory(Request $request)
    {
        // Done tutor session
        $user = User::find(auth()->user()->id); 
        return view('tutor.workhistory')->with('user', $user);
    }

    public function create(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $location = Location::all();
        $subject = Subject::all();
        return view('tutor.tutorsched',compact('user','location','subject'));
    }

    public function bookingrequest(Request $request)
    {
        // Tutor booking request DISPLAY| approved or disapproved
        $user = User::find(auth()->user()->id); 
        $schedules = $user->schedules;
        return view('tutor.request',compact('user', 'schedules'));
    }

    public function store(Request $request, User $user)
    {
        // return [$user, $request->toArray()];
        // $user = User::find(auth()->user()->id);
        Userschedule::create(array_merge($request->toArray(), ['tutor_id' => $user->id, 'location_id' => $user->location_id]));  
        return redirect('/tutorschedule');
    }

    public function store1(Request $request, User $user)
    {
        // Update user rate and location
        $user = User::find(auth()->user()->id);
        $user->update($request->toArray());
        return redirect('/tutorschedule');
    }

    public function update(Request $request, Booking $booking)
    {
        //Update of booking status || APPROVED || DISAPPROVED
        $booking->update($request->toArray());

        // $tuteebooking = Booking::find($booking);
            $b_tutee = $booking->tutee;
            $b_tutee->notify(new \App\Notifications\BookingReplyNotification('A Tutor has '. $booking->status. ' your booking request'));

        return redirect('/request');
    }

    public function sessionstatus(Request $request, Booking $booking)
    {
        //Update of tutor session status
        $booking->update($request->toArray());
        return redirect('/tutordashboard');
    }

    public function destroy($id)
    {
        //
    }
}
