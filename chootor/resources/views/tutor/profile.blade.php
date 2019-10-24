@extends('layout.app')
@section('content')
<h1>TUTOR PROFILE</h1>

<form>

    <div class="form-group">
        <label for="exampleFormControlFile1">You can upload your photo too!</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
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
