<!-- @foreach ($tutors as $tutor)
  {{ json_encode($tutor) }}

  {{ $tutor['subjects'] }}
@endforeach -->

@extends('layout.app')

@section('content')
  @if(session('msg'))
    <div class="alert alert-danger" role="alert" > 
      {{ session('msg') }}
    </div>
  @endif
  
  @if(session('mesg'))
    <div class="alert alert-success" role="alert" > 
      {{ session('mesg') }}
    </div>
  @endif
<!-- <h1 class="text-center" style="margin-top:50px;margin-bottom:50px">BOOK A CHOOTOR</h1>  -->

<style>
  #butto {
    background-color: #e27235;
    color: #ffffff;
  
  }
  #butto:hover {
    background-color: #d35400;
    color: #ffffff;
  }
  #closebtn {
    background-color: #7f8c8d;
    color: #ffffff;
  }
  #closebtn:hover {
    background-color: #bdc3c7;
    color: #ffffff;
  }
  p{
    font-size: 15px;
  }
</style>

<div class="container">
  <!-- <div class="card-deck"> -->
    <div class="col-12" style="margin-top:50px;margin-bottom:50px" >
      <div class="row" style="margin-bottom:50px">
        @foreach ($tutors as $tutor)
        {{-- @if ($tutor['user']['schedule']) --}}    
        <div class="w-100 d-none d-sm-block d-md-none"><!-- wrap every 2 on sm--></div>
        <div class="w-100 d-none d-sm-block d-md-none"><!-- wrap every 2 on sm--></div>
        <div class="card col-xs-12 col-sm-12 col-md-12 col-lg-5 mx-auto my-1 mb-5" style="height:auto">
          <div class="card-body">
            <div class="card-img text-center img-fluid">   
              @if($tutor['user']->image)
                <img src="{{$tutor['user']->image}}" class="img-responsive" alt="profilepicture" style="height:100px;width:100px">   
              @else
                <img src="../img/blank.png" class="img-responsive" style="height:100px;width:100px" alt="profilepicture">
              @endif
            </div>
            <!-- <div class="row">  -->
            <div class="card-text text-center">
                <br/> 
                  <p>Name: {{$tutor['user']->firstname}}  {{$tutor['user']->lastname}}  {{$tutor['user']->middleinitial}} </p>
                  <p>School ID: {{$tutor['user']->school_id}}</p>
                  <p>Course: {{$tutor['user']->course->course_name}}</p> 
                  <p>Rate per hour: {{$tutor['user']->rate}}</p> 
                  <p>Location: {{$tutor['user']->location->name}}</p>  
                  <p>Subject/s:               
                    @foreach ($tutor['subjects'] as $subject)
                      {{ $subject['name'] }}, 
                    @endforeach
                  </p>
              </div>

            {{-- Button trigger modal  --}}
              <button type="button" class="btn btn-block" id="butto" data-toggle="modal" style="margin-top:30px;margin-bottom:10px" data-target="#exampleModal{{$tutor['user']->id}}"> Book </button> 
            <!-- </div>  -->

            {{-- Modal --}}
            <div class="modal fade" id="exampleModal{{$tutor['user']->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

          <div class="modal-dialog" role="document">
            <div class="modal-content">            
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TUTOR SCHEDULES</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="/booking" >
                  {{ csrf_field() }} 
                  @foreach ($tutor['schedules'] as $schedule ?? '')                  
                  <div class="row">
                    <div class="col-1">
                      <p> </p>    
                    </div>
                    <div class="col-1">
                      <div class="checkbox">
                        <label>
                        <input type="checkbox" name="schedules_list[]" value="{{$schedule->id}}" class="make-switch" id="on_off_{{$schedule->id}}" data-on-text="on" data-off-text="off" onchange="checkboxClicked({{$schedule->id}})">  
                      </div>
                    </div>
                    <div class="col-10">
                      {{$schedule ?? ''->day}}
                      {{\Carbon\Carbon::createFromFormat('H:i:s',$schedule ?? ''->start_time)->format('h:i A')}}
                      to 
                      {{\Carbon\Carbon::createFromFormat('H:i:s',$schedule ?? ''->end_time)->format('h:i A')}}
                      <br/>
                      <span class="font-italic">SUBJECT: {{$schedule ?? ''->subject->name}}</label></span> <br/>
                      <div class="col-md-8 Subtopic">
                        TOPIC: <input type="text" name="subtopic_{{$schedule ?? ''->id}}" id="subtopic_{{$schedule ?? ''->id}}" disabled >                        
                      </div>
                      @endforeach  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn" id="closebtn" data-dismiss="modal">Close</button>              
                    <button style="cursor:pointer" type="submit" class="btn" id="butto">Submit</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div> 
        <br/>
        {{-- @endif --}}
        @endforeach
      </div>
    </div>
  <!-- </div> -->
</div>

  <script>

    function checkboxClicked(id) {
      $('#subtopic_' + id).attr('disabled', $('#on_off_' + id).is(':checked') ? false : true)
    }

  </script>

@endsection
