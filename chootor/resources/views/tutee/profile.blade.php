@extends('layout.app')

@section('content')
<style>
    .btn-primary, .btn-outline-primary:active, .btn-outline-primary:visited, .btn-outline-primary:focus {
        border-color: #e27235;
        color: #ffffff;
        background-color: #e27235;
    }

    .btn-primary:hover {
        background-color: #fa935b;
        color: #ffffff;
        border-color: #fa935b;  
    }
    #ccard {
        /* width: 500px; */
        height: auto;
        margin-top: 50px;
        border-color: #e27235;
    }
    #marg {
        margin-top: 10px;
        margin-bottom: 10px;
        text-align: left;
    }
    @media only screen
        and (min-device-width : 320px)
        and (max-device-width : 480px) {
            #names {
                align-content:  center;
            }
            #ccard {
                /* width: 310px; */
                height: auto;
                margin-top: 50px;
                border-color: #e27235;
            }
        } 
</style>
 <h2 class="text-center" style="margin-top:50px;margin-bottom:50px">PROFILE CONFIGURATION</h2>
    <form method="POST" action="/updatetuteeprofile"  enctype="multipart/form-data">
       {{ csrf_field() }}
    <div class="card text-center shadow p-2 mb-3" id="ccard">
        <div class="form-group " style="margin-top:50px">
            <div class="container text-center">
                <div class="row">
                    <div class="col-lg-5 justify-content-center">

                        @if($user->image)
                            <img src="{{$user->image}}" class="img-responsive rounded" style="width:200px;height:200px;margin-top:10px;margin-bottom:20px" alt="profilepicture">
                        @else
                        <img src="../img/blank.png" class="img-responsive" style="width:200px;height:200px;margin-top:10px;margin-bottom:20px" alt="profilepicture">
                        @endif

                        <p class="font-italic note text-center">* note: that the image ratio must be square for a better fit</p>

                        <div class="row justify-content-center">
                            <div class="col-lg-7 justify-content-center">
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                            
                        <div class="row" id="marg">
                            <div class="col-lg-3">
                                <label for="school_id" class="col-form-label">School Number</label>
                            </div>
                            <div class="col-lg-8">
                                <input disabled type="input" class="form-control font-italic" id="school_id" name="school_id" value="{{$user->school_id}}">
                            </div>
                        </div>
                    
                        <div class="row" id="marg">
                            <div class="col-lg-3">
                                <label for="email" class="col-form-label">Email</label>
                            </div>
                            <div class="col-lg-8">
                                <input disabled type="email" class="form-control font-italic" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" value="{{$user->email}}" >
                            </div>
                        </div>
                    
                        <div class="row" id="marg">                           
                            <div class="col-lg-3">
                                <label for="lastname" class="col-form-label">Last Name: </label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control font-italic" id="lastname" name="lastname" placeholder="Last Name" value="{{$user->lastname}}" maxlength="15">
                            </div>
                        </div>
                    
                        <div class="row" id="marg">
                            <div class="col-lg-3">
                                <label for="firstname" class="col-form-label">First Name: </label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control font-italic" id="firstname" name="firstname" placeholder="First Name" value="{{$user->firstname}}" maxlength="20">
                            </div>
                        </div>
                        
                        <div class="row" id="marg">
                            <div class="col-lg-3">
                                <label for="middleinitial" class="col-form-label">Middle Initial: </label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control font-italic" id="middleinitial" name="middleinitial" placeholder="M.I" value="{{$user->middleinitial}}" maxlength="2">
                            </div>
                        </div>
                    
                        <div class="row" id="marg">
                            <div class="col-lg-3">
                                <label for="course_id" class="col-form-label">Course</label>
                            </div>
                            <div class="col-lg-8">
                                <select id="course_id" class="form-control" name="course_id" > 
                                    <!-- {{-- <option selected value="{{$user->course->id}}"> {{$user->course->course_name}}</option> --}} -->
                                    <option selected disabled> {{$user->course->course_name }}</option>
                                        @foreach ($courses as $course)
                                            @if($user->course->course_name != $course->course_name)
                                                <option value="{{$course->id}}"> {{$course->course_name }}</option>
                                            @endif
                                        @endforeach                               
                                </select>
                            </div>
                        </div>
                            <!-- {{-- <div class="form-group row">
                                <label for="password" class="col-form-label">Password</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control font-italic" id="password" placeholder="Password" name="password">
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-form-label ">Confirm Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control font-italic" id="password_confirmation" 
                                    placeholder="Confirm Password" name="password_confirmation">
                                </div>
                            </div> --}} -->

                    </div>
                </div>
            </div>
        </div>

    <!-- SAVE BUTTON -->
    <!--  -->
    <br/>
    <div class="row">
        <div class="col-sm-12 d-flex align-items-end justify-content-center" style="margin-bottom: 30px">
            <button type="submit" class="btn btn-primary" style="cursor:pointer">SAVE CHANGES</button>
        </div>
    </div>
    
 

    

        <!-- <div class="form-group row">
            <div class="col-sm-12" style="margin-top:20px">
                <button type="submit" class="btn btn-primary btn-block" style="cursor:pointer">SAVE</button>
            </div>
        </div>         -->
    <!-- </div> -->

    </div>
</form>
@endsection
