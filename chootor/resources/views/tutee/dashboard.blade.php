@extends('layout.app')

@section('content')
  @if(session('msg'))
    <div class="alert alert-danger" role="alert" > 
      {{ session('msg') }}
    </div>
  @endif

  <h1 class="text-center" style="margin-top:50px;margin-bottom:50px">BOOK A CHOOTOR</h1> 
    @foreach ($tutors as $tutor)
      {{-- @if ($tutor['user']['schedule']) --}}
        
      <div class="card">
        <div class="card-body">
          <div class="card-text col-lg-3">   
            <img src="{{$tutor['user']->image}}" class="img-responsive" alt="profilepicture">   
          </div>

          <div class="row"> 
            <div class="card-text col-lg-9">
              <br/> 
                <h3>Name: {{$tutor['user']->firstname}}  {{$tutor['user']->lastname}}  {{$tutor['user']->middleinitial}}</h3>
                <h4>School ID: {{$tutor['user']->school_id}}</h4> <br />
                <h4>Course: {{$tutor['user']->course->course_name}}</h4> <br />
                <h4>Rate per hour: {{$tutor['user']->rate}}</h4> <br /> 
                <h4>Subject:   
                @foreach ($tutor['user']['schedules'] as $schedule)
                {{$schedule->subject->name}}
                @endforeach   
                </h4>
                <h4>Location: {{$tutor['user']->location->name}}</h4>
            </div>
              {{-- Button trigger modal  --}}
                <button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" style="margin-top:30px;margin-bottom:10px" data-target="#exampleModal{{$tutor['user']->id}}">
                  Book
                </button>
          </div> 

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
                    @foreach ($tutor['schedules'] as $schedule)
                    <div class="checkbox">
                      <label>
                      <input type="checkbox" name="schedules_list[]" value="{{$schedule->id}}">  
                      {{$schedule->day}}
                      {{\Carbon\Carbon::createFromFormat('H:i:s',$schedule->start_time)->format('h:i A')}}
                      to 
                      {{\Carbon\Carbon::createFromFormat('H:i:s',$schedule->end_time)->format('h:i A')}}
                      <br/>
                      <span class="font-italic">SUBJECT: {{$schedule->subject->name}}</label></span> <br/>
                      TOPIC: <input type="text" name="subtopic_{{$schedule->id}}" id="subtopic_{{$schedule->id}}">
                    </div>
                    @endforeach</h4>  
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>              
                  <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>   
    {{-- @endif --}}
  @endforeach
@endsection
