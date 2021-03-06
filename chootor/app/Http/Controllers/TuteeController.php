<?php

namespace App\Http\Controllers;

use JD\Cloudder\Facades\Cloudder;

use Illuminate\Http\Request;
use App\User;
use App\UserSchedule;
use App\Booking;
use App\Course;
use App\Subject;

class TuteeController extends Controller
{
    public function index(Request $request)
    {
        if($request->subject){
            $subject = Subject::where('name', 'LIKE', "%$request->subject%")->first();
            // return $subject;
            if($subject) {
                $tutor_list = User::leftJoin('user_schedules', 'user_schedules.tutor_id', 'users.id')
                                ->where('users.user_type','tutor')
                                ->where('users.status', 'approved')
                                ->where('user_schedules.subject_id', $subject->id)
                                ->groupBy('users.id')
                                ->get();
                // return $tutor_list;
            // $tutor_list = UserSchedule::join('users', 'users.id', 'user_schedules.tutor_id')
            //             ->where('user_schedules.subject_id', $subject->id)
            //             ->get();    
            
            if(!(count($tutor_list) > 0)) {
                return back()->with('norecordmsg','No Record Exists!');
            }
            } else {
                return back()->with('norecordmesg','No Record Exists!');
            }
            
        }
        else{
            $tutor_list = User::where('user_type','tutor')->where('status', 'approved')->get(); 
        }

            $week_start = date("Y-m-d",strtotime("monday this week"))." 00:00:00";
            $week_end = date("Y-m-d",strtotime("saturday this week"))." 23:59:59";
    
            
            $tutors = [];
    
            foreach ($tutor_list as $tutor){
                $tutorID = $request->subject ? $tutor->tutor_id : $tutor->id;
                $schedules = UserSchedule::where('tutor_id',$tutorID)->whereBetween('created_at',[$week_start,$week_end])->where('status', 'published')->get();
                $subjects = UserSchedule::select('subjects.name')->join('subjects', 'subjects.id', 'user_schedules.subject_id')
                            ->where([
                                ['user_schedules.tutor_id', $tutorID]
                            ])->groupBy('subjects.name')->get();
                // return $subjects;   
                $avg_rating = Booking::join('user_schedules', 'user_schedules.id', 'bookings.schedule_id')
                        ->where('user_schedules.tutor_id', $tutorID)
                        ->avg('bookings.rate');
                $avg_rating = round($avg_rating, 2);
                                
                $schedule_list = [];
                foreach ($schedules as $sched){
                    $isBooked = Booking::where('schedule_id',$sched->id)->exists();
                    // $isDisapproved = Booking::where('schedule_id',$sched->id )->where('status', 'disapproved')->first();
    
                    if(!$isBooked){
                        $schedule_list[] = $sched;
                    }
                }
    
                $tutors[] = [
                    'user' => $tutor,
                    'schedules' => $schedule_list,
                    'subjects' => $subjects,
                    'ratings' => $avg_rating,
                ];
            }

            // return response($tutors);
    
            // return $tutors;
            return view('tutee.dashboard')->with('tutors', $tutors );
        
    }
    
    // START OF TUTEE PROFILE UPDATE
    public function tuteeprofile()
    {
        $user = User::find(auth()->user()->id);
        $courses = Course::all();
        return view('tutee.profile',compact('user', 'courses'));
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
        
        return redirect('/tuteeprofile');
    }
    // END OF TUTEE PROFILE UPDATE

    public function store(Request $request)
    {
        $user = $request->user()->id;

        //$request->schedules_list -> ID ng pinili na schedule ni user
        $schedule_details = \App\UserSchedule::findOrFail($request->schedules_list); //details ng pinili na schedule ni user
        foreach($schedule_details as $schedule_details){
            //START NG COMPARISON
            if(!\App\Booking::join('user_schedules', 'user_schedules.id', 'bookings.schedule_id')
            ->whereTime('start_time', '>', $schedule_details->start_time)
            ->where('day', $schedule_details->day)
            ->where('tutee_id',$request->user()->id)->get()->isEmpty()){
                if(!\App\Booking::join('user_schedules', 'user_schedules.id', 'bookings.schedule_id')
                ->whereTime('start_time', '<', $schedule_details->end_time)
                ->where('day', $schedule_details->day)
                ->where('tutee_id',$request->user()->id)->get()->isEmpty()){
                    return redirect('/tuteedashboard')->with('msg', 'Failed to Book. Conflict of Schedules');
                }
                if(!\App\Booking::join('user_schedules', 'user_schedules.id', 'bookings.schedule_id')
                ->whereTime('end_time', '<=', $schedule_details->end_time)
                ->where('day', $schedule_details->day)
                ->where('tutee_id',$request->user()->id)->get()->isEmpty()){
                    return redirect('/tuteedashboard')->with('msg', 'Failed to Book. Conflict of Schedules');
                }
            }
            elseif(!\App\Booking::join('user_schedules', 'user_schedules.id', 'bookings.schedule_id')
            ->whereTime('end_time', '>', $schedule_details->start_time)
            ->where('day', $schedule_details->day)
            ->where('tutee_id',$request->user()->id)->get()->isEmpty()){
                return redirect('/tuteedashboard')->with('msg', 'Failed to Book. Conflict of Schedules');
            }

            //END NG COMPARISON

        } //don't mind. nagdecode lng ng array
        
        $schedules = $request->schedules_list;
        foreach ($schedules as $schedule){
            $booking = Booking::create(['tutee_id' => $user, 'schedule_id' => $schedule, 'subtopic' => $request['subtopic_'.$schedule]]);
            
            $userschedule = UserSchedule::find($schedule);
            $tutor = $userschedule->tutor;
            $tutor->notify(new \App\Notifications\BookingRequestNotification('A tutee '. $userschedule->booking->tutee->firstname . ' ' . $userschedule->booking->tutee->lastname .' has booked your schedule'));
        } 

        return redirect('/tuteedashboard')->with('mesg', 'Successfully booked!');
    }

    public function bookeddisplay()
    {
        $user = User::find(auth()->user()->id); 
        return view('tutee.booked')->with('user', $user);
    }

    public function mysched()
    {
        $user = User::find(auth()->user()->id); 
        return view('tutee.mysched')->with('user', $user);
    }

    public function donesessiondisplay()
    {
        $user = User::find(auth()->user()->id); 
        return view('tutee.feedback')->with('user', $user);
    }

    public function feedback(Request $request, Booking $booking)
    {
        $booking->update($request->toArray());
        return redirect('/feedback');
    }

    // START OF NOTIFICATIONS
    public function notifications(){
        $user = User::find(auth()->user()->id);
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return view('tutee.notifications')->with('user', $user);
    }
    // END OF NOTIFICATIONS

}
