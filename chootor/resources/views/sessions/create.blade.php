@extends('layout.app')
 
@section('content')
 <style>
    #cbtn {
        background-color: #141945;
        color: #ffffff;
        border-color: #141945;
        margin-bottom: 50px;
    }

    #cbtn:hover {
        background-color: #1A2056;
        color: #ffffff;
        border-color: #1A2056;
        /* font-weight: bold; */
    }

    #ccard {
        width: 500px;
        height: 450px;
        margin-top: 50px;
        border-color: #141945;
    }
</style>

<div class="container">
    <div class="row">
        <div class="card offset-md-4" id="ccard">
            <div class="container" style="background-color:#141945">
                <h2 class="text-center" style="margin-top:50px;margin-bottom:50px;color:#ffffff">SIGN IN</h2>   
            </div>             
            <form method="POST" action="/login">
                {{ csrf_field() }}
                <div class="container"  style="margin-top:20px;margin-bottom:30px;background-color:#ffffff">
                    <div class="col-lg-12 offset-lg-12">
                        <div class="form-group text-center">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" style="border-color: #141945;">
                        </div>                
                        <div class="form-group text-center">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" style="border-color: #141945;">
                        </div>                
                        <div class="form-group text-center" style="margin-top:50px;margin-bottom:20px">
                            <button id="cbtn" style="cursor:pointer" type="submit" class="btn btn-outline-dark btn-block" >LOGIN</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
 
@endsection