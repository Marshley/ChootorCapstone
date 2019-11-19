<?php

namespace App\Http\Controllers;

use JD\Cloudder\Facades\Cloudder;

use Illuminate\Http\Request;
use App\User;
use App\UserSchedule;
use App\Subject;
use App\Location;
use App\Booking;
use App\Course;

class TutorController extends Controller
{
    // TUTOR PROFILE UPDATE
    public function index()
    {
        // PROFILE VIEW
        $user = User::find(auth()->user()->id); 
        $courses = Course::all();
        return view('tutor.profile',compact('user', 'courses'));
    }

    public function updateprofile(Request $request, User $user)
    {
        // $this->validate(request(),[
        //     'password' => 'required',
        //     'password' => 'required|confirmed',
        // ]);
        
        $user = User::find(auth()->user()->id);
        if($request->image){
            $image = $request->file('image');
            $file_path = $image->getRealPath();
            Cloudder::upload($file_path,null);
            $user->update(array_merge($request->toArray(), ['image' => Cloudder::show(Cloudder::getPublicId())]));
        }
        else{
            $user->update($request->toArray());
        }
        
        // $user->update(array_merge($request->toArray(), ['image' => Cloudder::show(Cloudder::getPublicId())]));
        
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
        // DISPLAY FOR TUTORSCHED        
        $user = User::find(auth()->user()->id);
        $location = Location::all();
        $subject = Subject::all();

        $week_start = date("Y-m-d",strtotime("monday this week"))." 00:00:00";
        $week_end = date("Y-m-d",strtotime("saturday this week"))." 23:59:59";
        
        $schedules = UserSchedule::where('tutor_id', $user->id)->whereBetween('created_at',[$week_start,$week_end])->orderBy('day','desc')->orderBy('start_time', 'asc')->get();
        return view('tutor.tutorsched',compact('user','location','subject','schedules'));
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
        // CREATE TUTOR SCHEDULE

        $subject = Subject::where('name', $request->subject)->first();

        Userschedule::create(array_merge($request->toArray(), ['tutor_id' => $user->id, 'location_id' => $user->location_id, 'subject_id' => $subject->id]));  
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

        $b_tutee = $booking->tutee;
        $b_tutee->notify(new \App\Notifications\BookingReplyNotification('A Tutor has '. $booking->status. ' your booking request'));
        if($booking->status == 'disapproved')
        {
            $booking->delete();
        }

        return redirect('/request');
    }

    public function sessionstatus(Request $request, Booking $booking)
    {
        //Update of tutor session status
        $booking->update($request->toArray());
        return redirect('/tutordashboard');
    }

    
    public function autocomplete(Request $request)
    {
        $data = Subject::select("name")
                ->where("name","LIKE","%{$request->input('query')}%")
                ->get();
   
        return response()->json($data);
    }
}
