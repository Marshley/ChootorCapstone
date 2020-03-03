@extends('layout.app')

@section('content')
<style>
    .btn-primary, .btn-primary:active, .btn-primary:visited, .btn-primary:focus {
        border-color: #e27235;
        color: white;
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
            #title {

            }
            #marg {

            }
    }
</style>

@if(session('msg'))
<div class="alert alert-success" role="alert" > 
  {{ session('msg') }}
</div>
@endif

 <h2 class="text-center" style="margin-top:50px;margin-bottom:50px">PROFILE CONFIGURATION</h2>
    <form method="POST" action="/updatetutorprofile" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="card text-center shadow p-2 mb-3" id="ccard">
        <div class="form-group " style="margin-top: 50px;">
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
                            <label for="school_id" class="text-right col-form-label">School Number</label> </br>
                            </div>
                            <div class="col-lg-8">
                                <input disabled type="input" class="form-control font-italic" id="school_id" name="school_id" value="{{$user->school_id}}">
                            </div>
                        </div>
                        
                        <div class="row" id="marg">
                            <div class="col-lg-3">
                                <label for="email" class="text-right col-form-label">Email</label> </br>
                            </div>
                            <div class="col-lg-8">
                                <input disabled type="email" class="form-control font-italic" id="email" placeholder="Email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" value="{{$user->email}}">
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
                                <label for="firstname" class="col-form-label">First Name: </label> </br>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control font-italic" id="firstname" name="firstname"  placeholder="First Name" value="{{$user->firstname}}" maxlength="20">
                            </div>
                        </div>

                        <div class="row" id="marg">
                            <div class="col-lg-3">
                                <label for="middleinitial" class="col-form-label">Middle Initial: </label> </br>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control font-italic" id="middleinitial" name="middleinitial" placeholder="M.I" value="{{$user->middleinitial}}" maxlength="2">
                            </div>
                        </div>

                        <div class="row" id="marg">
                            <div class="col-lg-3">
                                <label for="course_id" class="text-right col-form-label">Course</label> </br>
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

                        <div class="row" id="marg">
                            <div class="col-lg-3">
                                <label for="email" class="text-right col-form-label">Expertise </label>
                            </div>
                            <div class="col-lg-8">
                                <select class="js-example-tags form-control" multiple="multiple" data-width="100%" name="expertise[]">
                                    @if($user->expertise)
                                        @foreach(json_decode($user->expertise) as $exp)
                                            <option selected value="{{$exp}}">{{$exp}}</option>
                                        @endforeach
                                    @endif
                                    <!-- {{-- <option value="{{$user->expertise}}"></option> --}} -->
                                    <!-- {{-- <option selected="selected">purple</option> --}} -->
                                </select>
                            </div>
                        </div>              
                                    
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.min.css" rel="stylesheet" />
                       
                    </div>
                </div>
            </div>
        </div>
        
        <!-- SAVE BUTTON -->
        <br/>
        <div class="row">
            <div class="col-sm-12 d-flex align-items-end justify-content-center" style="margin-bottom: 30px">
                <button type="submit" class="btn btn-primary" style="cursor:pointer">SAVE CHANGES</button>
            </div>
        </div>
    </div>

        <!-- <div class="form-group " style="margin-top:50px">
            <div class="container text-center">
                <div class="row">
                    <div class="col-lg-12">
                        @if($user->image)
                            <img src="{{$user->image}}" class="img-responsive" style="width:200px;height:200px;margin-top:10px;margin-bottom:20px" alt="profilepicture">
                        @else
                        <img src="../img/blank.png" class="img-responsive" style="width:200px;height:200px;margin-top:10px;margin-bottom:20px" alt="profilepicture">
                        @endif   
                        <div class="row justify-content-center">
                            <div class="col-sm-4 justify-content-center">
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->    

    <script>
        $(".js-example-tags").select2({
            tags: true
        })
    </script>
</form>
@endsection
