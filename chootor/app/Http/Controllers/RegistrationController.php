<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('registration.create')->with('courses', $courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->validate(request(),[
            'firstname' => 'required',
            'lastname' => 'required',
            'school_id' => 'required',
            'user_type' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::create(request(['firstname', 'lastname', 'middleinitial','course_id','school_id','user_type','email','password', 'status']));

        \Mail::send('emails.verification', ['token' => $user->token], function($message) use ($user) {
            $message->to($user->email)->subject('Email Verification');
            $message->from('xmash16x@gmail.com');
        });
            return view('verify');
        // auth()->login($user);

        // if ($user->user_type == 'tutee'){
        //     $user = User::find($user->id);
        //     return redirect()->to('/tuteedashboard');     
        // }
        // elseif ($user->user_type == 'tutor')
        // {
        //     $user = User::find($user->id);
        //      return redirect()->to('/tutordashboard');
        // }
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
