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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tutor.profile');
    }
    public function tutordashboard(Request $request)
    {
        // Tutor approved request | done tutor session
        $user = User::find(auth()->user()->id); 
        return view('tutor.dashboard')->with('user', $user);
    }
    public function workhistory(Request $request)
    {
        // Done tutor session
        $user = User::find(auth()->user()->id); 
        return view('tutor.workhistory')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $location = Location::all();
        $subject = Subject::all();
        return view('tutor.tutorsched',compact('user','location','subject'));
    }
    public function bookingrequest(Request $request)
    {
        // Tutor booking request | approved or disapproved
        $user = User::find(auth()->user()->id); 
        return view('tutor.request')->with('user', $user);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
    public function update(Request $request, Booking $booking)
    {
        //Update of booking status
        $booking->update($request->toArray());
        return redirect('/request');
    }

    public function sessionstatus(Request $request, Booking $booking)
    {
        //Update of tutor session status
        $booking->update($request->toArray());
        return redirect('/request');
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
