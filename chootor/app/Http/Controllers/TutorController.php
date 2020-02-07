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
use App\Report;

class TutorController extends Controller
{
    // START OF REPORT

    public function report(Request $request, Booking $booking)
    {
        $user = User::find(auth()->user()->id);
        $bookings = Booking::all();
        foreach ($bookings as $booked)
        {
            $isReported = Report::where('booking_id', $booked->id)->exists();

            if(!$isReported)
            {
                Report::create(array_merge($request->toArray(), ['booking_id' => $booking->id]));
                return back()->with('msg', 'You have successfully reported this incident');;
            }
            else 
            {
                return back()->with('mesg', 'You have already reported this incident');;
            }
        }
        
    }

    // END OF REPORT

    // START OF NOTIFICATIONS
    public function notifications()
    {

        $user = User::find(auth()->user()->id);
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return view('tutor.notifications')->with('user', $user);
    }
    // END OF NOTIFICATIONS

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
        $user = User::find(auth()->user()->id);
        if($request->image){
            foreach($request->expertise as $exp){
                $image = $request->file('image');
                $file_path = $image->getRealPath();
                Cloudder::upload($file_path,null);
                $user->update(array_merge($request->toArray(), ['image' => Cloudder::show(Cloudder::getPublicId())]));
            }
        }
        else{
            foreach($request->expertise as $exp){
                $user->update($request->toArray());
            }
        }
        
        return redirect('/tutorprofile')->with('msg','Your profile has been updated successfully');
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
        foreach($request->day_list as $day) {
            $scheds = \App\UserSchedule::whereTime('start_time', '>', $request->start_time)
            ->where('day', $day)
            ->where('tutor_id',$request->user()->id)->get();
            if (!$scheds->isEmpty()){
                foreach ($scheds as $sched) {
                    if (!\App\UserSchedule::where('id', $sched->id)->whereTime('start_time', '<', $request->end_time)
                    ->where('day', $day)
                    ->where('tutor_id',$request->user()->id)->get()->isEmpty()){
                        return redirect('/tutorschedule')->with('msg', 'Failed to Book. Conflict of Schedules');
                    }
                    if (!\App\UserSchedule::where('id', $sched->id)->whereTime('end_time', '<=', $request->end_time)
                    ->where('day', $day)
                    ->where('tutor_id',$request->user()->id)->get()->isEmpty()){
                        return redirect('/tutorschedule')->with('msg', 'Failed to Book. Conflict of Schedules');
                    }
                } 
            } 
            
            $scheds = \App\UserSchedule::whereTime('start_time', '<=', $request->start_time)
            ->whereTime('end_time', '>', $request->start_time)
            ->where('day', $day)
            ->where('tutor_id',$request->user()->id)->get();
            
            if (!$scheds->isEmpty()){
                foreach ($scheds as $sched) {
                    if (!\App\UserSchedule::where('id', $sched->id)->whereTime('start_time', '<=', $request->start_time)
                    ->whereTime('end_time', '>', $request->start_time)
                    ->where('day', $day)
                    ->where('tutor_id',$request->user()->id)->get()->isEmpty()){
                        return redirect('/tutorschedule')->with('msg', 'Failed to Book. Conflict of Schedules');
                    } 
                }
            }
        }

        
        if($subject = Subject::where('name', $request->subject)->exists()){
            $subject = Subject::where('name', $request->subject)->first();
            foreach($request->day_list as $day) {
                UserSchedule::create(array_merge($request->toArray(), ['tutor_id' => $user->id, 'location_id' => $user->location_id, 'subject_id' => $subject->id, 'day' => $day]));
            }
            return redirect('/tutorschedule')->with('mesg', 'Saved Successfully!');
        }
        else {
            return redirect('/tutorschedule')->with('messg', 'Subject does not exist!');
        }

        
        // return $request->day_list;
        // $scheds = \App\UserSchedule::whereTime('start_time', '>', $request->start_time)
        // ->where('day', $request->day)
        // ->where('tutor_id',$request->user()->id)->get();
        // if (!$scheds->isEmpty()){
        //     foreach ($scheds as $sched) {
        //         if (!\App\UserSchedule::where('id', $sched->id)->whereTime('start_time', '<', $request->end_time)
        //         ->where('day', $request->day)
        //         ->where('tutor_id',$request->user()->id)->get()->isEmpty()){
        //             return redirect('/tutorschedule')->with('msg', 'Failed to Book. Conflict of Schedules');
        //         }
        //         if (!\App\UserSchedule::where('id', $sched->id)->whereTime('end_time', '<=', $request->end_time)
        //         ->where('day', $request->day)
        //         ->where('tutor_id',$request->user()->id)->get()->isEmpty()){
        //             return redirect('/tutorschedule')->with('msg', 'Failed to Book. Conflict of Schedules');
        //         }
        //     } 
        // } 
        
        // $scheds = \App\UserSchedule::whereTime('start_time', '<=', $request->start_time)
        // ->whereTime('end_time', '>', $request->start_time)
        // ->where('day', $request->day)
        // ->where('tutor_id',$request->user()->id)->get();
        
        // if (!$scheds->isEmpty()){
        //     foreach ($scheds as $sched) {
        //         if (!\App\UserSchedule::where('id', $sched->id)->whereTime('start_time', '<=', $request->start_time)
        //         ->whereTime('end_time', '>', $request->start_time)
        //         ->where('day', $request->day)
        //         ->where('tutor_id',$request->user()->id)->get()->isEmpty()){
        //             return redirect('/tutorschedule')->with('msg', 'Failed to Book. Conflict of Schedules');
        //         } 
        //     }
        // }
        // CREATE TUTOR SCHEDULE

        // if($subject = Subject::where('name', $request->subject)->exists()){
        //     // for(){
        //     $subject = Subject::where('name', $request->subject)->first();
        //     UserSchedule::create(array_merge($request->toArray(), ['tutor_id' => $user->id, 'location_id' => $user->location_id, 'subject_id' => $subject->id]));  
        //     return redirect('/tutorschedule')->with('mesg', 'Saved Successfully!');
        // }
        // else {
        //     return redirect('/tutorschedule')->with('messg', 'Subject does not exist!');
        // }
    // }

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

    // public function destroy(UserSchedule $UserSchedule)
    // {
    //     // $user = User::find(auth()->user()->id);
    //     $UserSchedule->delete();
    //     return redirect('/tutorschedule')->with('UserSchedule', $UserSchedule);
    // }
}



            // if (!\App\UserSchedule::whereTime('start_time', '<', $request->end_time)
            // ->where('day', $request->day)
            // ->where('tutor_id',$request->user()->id)->get()->isEmpty()){
            //     return redirect('/tutorschedule')->with('msg', 'Failed to Book. Conflict of Schedules');
            // } 
            // if (!\App\UserSchedule::whereTime('end_time', '<=', $request->end_time)
            // ->where('day', $request->day)
            // ->where('tutor_id',$request->user()->id)->get()->isEmpty()){
            //     return redirect('/tutorschedule')->with('msg', 'Failed to Book. Conflict of Schedules');
            // }