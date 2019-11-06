@extends('layout.app')
@section('content')
<h1 class="text-center" style="margin-top:50px;margin-bottom:50px">TUTEE PROFILE</h1>

<form>

    <div class="form-group">
        <div class="row">
            <div class="col-lg-12">
                <label for="exampleFormControlFile1">You can upload your photo too!</label>
            </div>
        </div>
        <div class="row">
            <img src="/img/blank.png" class="img-responsive rounded center-block" style="width:200px;height:200px">           
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
    </div>


    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
        <input type="name" class="form-control font-italic" id="inputName" placeholder="Complete Name">
        </div>
    </div>
 
    <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="email" class="form-control font-italic" id="inputEmail" placeholder="Email">
        </div>
    </div>

    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control font-italic" id="inputPassword" placeholder="Password">
        </div>
    </div>

    <div class="form-group row">
        <label for="inputConfirmPassword" class="col-sm-2 col-form-label ">Confirm Password</label>
        <div class="col-sm-10">
        <input type="confirm password" class="form-control font-italic" id="inputConfirmPassword" placeholder="Confirm Password">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
        <button type="save" class="btn btn-primary">SAVE</button>
        </div>
    </div>
</form>
@endsection
