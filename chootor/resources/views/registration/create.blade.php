@extends('layout.app')

@section('content')
<style>
    #cbtn {
        background-color: #006D5B;
        color: #ffffff;
        border-color: #006D5B;
        margin-bottom: 20px;
    }

    #cbtn:hover {
        background-color: #009B81;
        color: #ffffff;
        border-color: #009B81;
        /* font-weight: bold; */
    }

    #ccard {
        width: 4000px;
        height: auto;
        /* margin-top: 50px; */
        /* border-color: #141945; */
    }

    #clabel {
      border-color: #006D5B;
    }
    a {
      text-decoration: none;
      display: inline-block;
      padding: 8px 16px;
    }

    a:hover {
      background-color: #ddd;
      color: black;
    }

    .previous {
      background-color: #f1f1f1;
      color: black;
    }

</style>

<div class="container">
  <div class="row">
    <!-- <div class="card shadow" id="ccard"> -->
        <div class="form-group">
            <a href="/home" class="previous">&laquo; RETURN</a>
        </div>
        <!-- <div class="container" >
          <h2 class="text-center" style="margin-top:50px;margin-bottom:50px;color:#141945">REGISRATION FORM</h2>
        </div> -->
        
        <div class="container" style="margin-top:30px;">
          <form method="POST" action="/register">
            @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
              {{ csrf_field() }}
              <div class="container">
                <div class="row">
                  <div class="form-group col">
                    <label for="lastname">Last Name:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" maxlength="15" required >
                  </div>
                  <div class="form-group col">
                    <label for="firstname">First Name:</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" maxlength="20" required>
                  </div>          
                  <div class="form-group col">
                    <label for="middleinitial">MI:</label>
                    <input type="text" class="form-control" id="middleinitial" name="middleinitial" maxlength="2">
                  </div>
                </div>

                <div class="form-group">
                  <label for="course_id">Course</label>
                  <select id="course_id" class="form-control" name="course_id" required>
                      @foreach ($courses as $course)
                          <option value="{{$course->id}}"> {{$course->course_name }}</option>
                      @endforeach                                
                  </select>
                </div>

                <div class="form-group">
                  <label for="school_id">School ID:</label>
                  <input type="text" class="form-control" id="school_id" name="school_id" required>
                </div>        
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>        
                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" name="password" maxlength="8" required>
                </div>        
                <div class="form-group">
                  <label for="password_confirmation">Password Confirmation:</label> 
                  <input type="password" class="form-control" id="password_confirmation"
                  name="password_confirmation" maxlength="8" required>
                </div>        
                <div class="row justify-content-center" style="margin-top:20px;margin-bottom:30px;font-size:30px">
                  <span>Choose your role: </span> 
                </div>
                <div class="row justify-content-center" style="margin-top:20px;margin-bottom:30px">
                  <div class="form-check form-check-inline" style="margin-right:50px;font-size:20px">
                    <input class="form-check-input" type="radio" name="user_type" id="user_type" value="tutee" checked>
                    <label class="form-check-label" for="user_type">
                      Tutee
                    </label>
                  </div>
                  <div class="form-check form-check-inline" style="margin-left:50px;font-size:20px">
                    <input class="form-check-input" type="radio" name="user_type" id="user_type" value="tutor">
                    <label class="form-check-label" for="user_type">
                      Tutor
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox font-italic" style="margin-bottom:30px">
                    <input type="checkbox" class="custom-control-input" id="materialUnchecked" unchecked required>
                    <label class="custom-control-label" for="materialUnchecked">By clicking Register, you agree to our <a href="google.com" style="padding:0">Terms</a>, <a href="google.com" style="padding:0">Data Policy</a> and <a href="google.com" style="padding:0">Cookies Policy.</a></label> 
                  </div>
                  
                  <!-- <p class="font-italic btn-link">By clicking Register, you agree to our Terms, Data Policy and Cookies Policy. </p> -->
                  <button style="cursor:pointer;" id="cbtn" type="submit" class="btn btn-outline-dark btn-block">REGISTER</button>
                </div>
              </div>
              
          </form>
        </div>      

    <!-- </div> -->
  </div>
</div>
 
@endsection
