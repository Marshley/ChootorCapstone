@extends('layout.app')

@section('content')
 
    <h2>Register</h2>
    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div class="form-check form-check-inline">
            <span>Choose your role:</span> 
            <input class="form-check-input" type="radio" name="user_type" id="user_type" value="tutee" checked>
            <label class="form-check-label" for="user_type">
              Tutee
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="user_type" id="user_type" value="tutor">
            <label class="form-check-label" for="user_type">
              Tutor
            </label>
          </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
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

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
 
@endsection