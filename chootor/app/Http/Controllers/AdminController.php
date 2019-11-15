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
        return redirect('/subject');
    }

    public function store2(Request $request, Location $location)
    {   
        // Create Location
        $location->create($request->toArray());
        return redirect('/location');
    }

    public function addcourse(Request $request, Course $course)
    {
        // Create Course
        $course->create($request->toArray());
        return redirect('/course');
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
}
