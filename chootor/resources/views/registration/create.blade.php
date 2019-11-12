@extends('layout.app')

@section('content')
<style>
    #cbtn {
        background-color: #141945;
        color: #ffffff;
        border-color: #141945;
        margin-bottom: 20px;
    }

    #cbtn:hover {
        background-color: #1A2056;
        color: #ffffff;
        border-color: #1A2056;
        /* font-weight: bold; */
    }

    #ccard {
        width: 4000px;
        height: auto;
        /* margin-top: 50px; */
        /* border-color: #141945; */
    }

    #clabel {
      border-color: #141945;
    }
</style>

<div class="container">
  <div class="row">
    <div class="card shadow" id="ccard">
        <div class="container" >
          <h2 class="text-center" style="margin-top:50px;margin-bottom:50px;color:#141945">REGISRATION FORM</h2>
        </div>
        
        <div class="container" style="margin-top:30px;">
          <form method="POST" action="/register">
              {{ csrf_field() }}
              <div class="container">
                <div class="row">
                  <div class="form-group col">
                    <label for="lastname">Last Name:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname">
                  </div>
                  <div class="form-group col">
                    <label for="firstname">First Name:</label>
                    <input type="text" class="form-control" id="firstname" name="firstname">
                  </div>          
                  <div class="form-group col">
                    <label for="middleinitial">Middle Initial:</label>
                    <input type="text" class="form-control" id="middleinitial" name="middleinitial">
                  </div>
                </div>
                <div class="form-group">
                  <label for="school_id">School ID:</label>
                  <input type="text" class="form-control" id="school_id" name="school_id">
                </div>        
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>        
                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>        
                <div class="form-group">
                  <label for="password_confirmation">Password Confirmation:</label>
                  <input type="password" class="form-control" id="password_confirmation"
                  name="password_confirmation">
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
                  <button style="cursor:pointer;" id="cbtn" type="submit" class="btn btn-outline-dark btn-block">Submit</button>
                </div>
              </div>
          </form>
        </div>      

    </div>
  </div>
</div>
 
@endsection
