@extends('layout.app')

@section('content')
 
    <h2 class="text-center" style="margin-top:50px;margin-bottom:50px">REGISRATION</h2>
    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div class="container text-s ">
          <div class="row">
            <div class="form-group col">
              <label for="lastname">Last Name:</label>
              <input type="text" class="form-control" id="lastname" name="lastname">
            </div>
            <div class="form-group col">
              <label for="firstname">First Name:</label>
              <input type="text" class="form-control" id="firstname" name="firstname">
            </div>          
            <div class="form-group col-2">
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
          <div class="row justify-content-center" style="margin-top:50px;margin-bottom:50px;font-size:30px">
            <span>Choose your role: </span> 
          </div>
          <div class="row justify-content-center" style="margin-top:50px;margin-bottom:80px">
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
            <button style="cursor:pointer" type="submit" class="btn btn-outline-dark btn-block">Submit</button>
          </div>
        </div>
    </form>
 
@endsection

<style>
  .text-s {
    font-size: 20px;
  }
</style>