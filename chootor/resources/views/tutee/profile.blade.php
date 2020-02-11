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
</style>
 <h1 class="text-center" style="margin-top:50px;margin-bottom:50px">PROFILE CONFIGURATION</h1>
    <form method="POST" action="/updatetuteeprofile"  enctype="multipart/form-data">
    
    {{ csrf_field() }}
    
    <div class="form-group " style="margin-top:50px">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <p class="font-italic note text-center">* note: that the image ratio must be square for a better fit</p>
                    @if($user->image)
                        <img src="{{$user->image}}" class="img-responsive rounded" style="width:200px;height:200px;margin-top:10px;margin-bottom:20px" alt="profilepicture">
                    @else
                    <img src="../img/blank.png" class="img-responsive" style="width:200px;height:200px;margin-top:10px;margin-bottom:20px" alt="profilepicture">
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-sm-12 justify-content-center">
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SAVE BUTTON -->
    <!--  -->
    <div class="row">
        <div class="col-sm-12 d-flex align-items-end justify-content-center" style="">
            <button type="submit" class="btn btn-primary" style="cursor:pointer">SAVE CHANGES</button>
        </div>
    </div>
    

    <div class="form-group row col-sm-12" style="margin-top:50px">
            
        <div class="form-group row col-sm">
            <label for="lastname" class="col-sm-4 col-form-label">Last Name: </label>
                <div class="form-group">
                    <input type="text" class="form-control font-italic" id="lastname" name="lastname" 
                            placeholder="Last Name" value="{{$user->lastname}}" maxlength="15">
                </div>
        </div>

        <div class="form-group row col-sm">
            <label for="firstname" class="col-sm-4 col-form-label">First Name: </label>
                <div class="form-group">
                    <input type="text" class="form-control font-italic" id="firstname" name="firstname" 
                            placeholder="First Name" value="{{$user->firstname}}" maxlength="20">
                </div>
        </div>
    
        <div class="form-group row col-sm">
            <label for="middleinitial" class="col-sm-5 col-form-label">Middle Initial: </label>
                <div class="form-group">
                    <input type="text" class="form-control font-italic" id="middleinitial" name="middleinitial" 
                    placeholder="M.I" value="{{$user->middleinitial}}" maxlength="2">
                </div>
        </div>
    </div>

    <!-- <div class="container"> -->
        
        <div class="form-group row">
            <label for="school_id" class="col-sm-2 col-form-label">School Number</label>
                <div class="col-sm-10">
                    <input disabled type="input" class="form-control font-italic" id="school_id" name="school_id" value="{{$user->school_id}}">
                </div>
        </div>

        <!-- i add pa ang course, naglagay lang ako incase kailanganin na -->
        {{-- <div class="form-group row">
            <label for="course" class="col-sm-2 col-form-label">Course</label>
            <div class="col-sm-10">
            <input type="course" class="form-control font-italic" id="course" placeholder="Course" name="course" value="{{$user->course}}">
            </div>
        </div> --}}
        <div class="form-group row">
            <label for="course_id" class="col-sm-2 col-form-label">Course</label>
            <div class="col-sm-10">
                <select id="course_id" class="form-control" name="course_id" > 
                        {{-- <option selected value="{{$user->course->id}}"> {{$user->course->course_name}}</option> --}}
                    <option selected disabled> {{$user->course->course_name }}</option>
                        @foreach ($courses as $course)
                            @if($user->course->course_name != $course->course_name)
                                <option value="{{$course->id}}"> {{$course->course_name }}</option>
                            @endif
                        @endforeach                               
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="email" class="form-control font-italic" id="email" placeholder="Email" 
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" value="{{$user->email}}">
            </div>
        </div>

        {{-- <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="password" class="form-control font-italic" id="password" placeholder="Password" name="password">
            </div>
        </div>

        <div class="form-group row">
            <label for="password_confirmation" class="col-sm-2 col-form-label ">Confirm Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control font-italic" id="password_confirmation" 
                placeholder="Confirm Password" name="password_confirmation">
            </div>
        </div> --}}

        <!-- <div class="form-group row">
            <div class="col-sm-12" style="margin-top:20px">
                <button type="submit" class="btn btn-primary btn-block" style="cursor:pointer">SAVE</button>
            </div>
        </div>         -->
    <!-- </div> -->
</form>
@endsection
