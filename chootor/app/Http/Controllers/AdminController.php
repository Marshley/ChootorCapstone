<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subject;
use App\Location;
use App\Course;
use App\Booking;

class AdminController extends Controller
{
    public function displayadviserform()
    {
        // DISPLAY ADVISER
        return view('admin.adviser');
    }

    public function index()
    {
        // DISPLAY SUBJECT
        $subject = Subject::all();
        return view('admin.subject')->with('subject', $subject);
    }

    public function index2()
    {
        // DISPLAY LOCATION
        $location = Location::all();
        return view('admin.location')->with('location', $location);
    }

    public function displaycourse()
    {
        // DISPLAY LOCATION
        $courses = Course::all();
        return view('admin.course')->with('courses', $courses);
    }

    public function store(Request $request, Subject $subject)
    {   
        // Create Subject
        $subject->create($request->toArray());
        return redirect('/subject')->with('mesg', 'Saved Successfully!');
    }

    public function store2(Request $request, Location $location)
    {   
        // Create Location
        $location->create($request->toArray());
        return redirect('/location')->with('mesg', 'Saved Successfully!');
    }

    public function addcourse(Request $request, Course $course)
    {
        // Create Course
        $course->create($request->toArray());
        return redirect('/course')->with('mesg', 'Saved Successfully!');
    }

    public function show(Request $request)
    {
        $users = User::all();
        return view('admin.dashboard')->with('users', $users);
    }
    
    public function update(Request $request, User $user)
    {
        // Update of tutor status
        $user->update($request->toArray());

        $user->notify(new \App\Notifications\TutorStatusNotification('Tutor has been '.$user->status));

        return redirect('/admindashboard');
        
    }

    public function list()
    {
        $lists = Booking::all();
        return view('admin.list')->with('lists', $lists);
    }

    // START LIST OF TUTORS
    public function tutorlist()
    {
        $tutors = User::where('user_type', 'tutor')->get();
        return view('admin.tutorlist')->with('tutors', $tutors);
    }
    // END OF LIST OF TUTORS

    // START LIST OF TUTEE
    public function tuteelist()
    {
        $tutees = User::where('user_type', 'tutee')->get();
        return view('admin.tuteelist')->with('tutees', $tutees);
    }
    // END LIST OF TUTEE
}
