<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subject;
use App\Location;

class AdminController extends Controller
{
    public function index()
    {
        $subject = Subject::all();
        return view('admin.subject')->with('subject', $subject);
    }
    public function index2()
    {
        $location = Location::all();
        return view('admin.location')->with('location', $location);
    }
    public function create()
    {
        //
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
    public function show(Request $request)
    {
        $users = User::all();
        return view('admin.dashboard')->with('users', $users);
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, User $user)
    {
        // Update of tutor status
        $user->update($request->toArray());

        $user->notify(new \App\Notifications\TutorStatusNotification('Tutor has been '.$user->status));

        return redirect('/admindashboard');
        
    }
    public function destroy($id)
    {
        //
    }
}
