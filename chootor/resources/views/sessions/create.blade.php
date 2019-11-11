@extends('layout.app')
 
@section('content')
 
    <h2 class="text-center" style="margin-top:50px;margin-bottom:50px">SIGN IN</h2>
    
    <form method="POST" action="/login">
        {{ csrf_field() }}
        <div class="container">
            <div class="col-lg-6 offset-lg-3">
                <div class="form-group text-s">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
        
                <div class="form-group text-s">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
        
                <div class="form-group text-s" style="margin-top:50px">
                    <button style="cursor:pointer" type="submit" class="btn btn-outline-dark btn-block">Login</button>
                </div>
            </div>
        </div>
    </form>
 
@endsection

<style>
  .text-s {
    font-size: 20px;
  }
</style>