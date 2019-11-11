@extends('layout.app')
@section('content')
<h1 class="text-center" style="margin-top:50px;margin-bottom:50px"></h1>
@foreach ($tutors as $tutor)
  {{-- @if ($tutor['user']->schedules) --}}
    {{-- {{json_encode($tutor, true)}} --}}
    {{-- {{$tutor['user']->firstname}} --}}
   {{-- @foreach ($tutor['schedules'] as $schedule) --}}
       {{-- {{$schedule->start_time}} --}}
   
  <div class="card">
    <div class="card-body">
      <div class="card-title">   
        <h3>Name: {{$tutor['user']->firstname}}  {{$tutor['user']->lastname}}  {{$tutor['user']->middleinitial}}</h3>
      </div>
      <div class="row"> 
        <div class="card-text col-lg-12">
          <br /> 
           <h4>School ID:{{$tutor['user']->school_id}}</h4> <br />
          <h4>Rate: {{$tutor['user']->rate}}/hour</h4> <br /> 
           <h4>Subject:   
           @foreach ($tutor['user']['schedules'] as $schedule)
            {{$schedule->subject->name}}
            @endforeach   
           <h4>Location: {{$tutor['user']->location->name}}</h4>
        </div>
        <div class="col-lg-3" style="margin-top:70px;left:15%"> 
          {{-- Button trigger modal  --}}
          <button type="button" class="btn btn-dark" data-toggle="modal" style="margin-top:5px;" data-target="#exampleModal{{$tutor['user']->id}}">
            Book
          </button>
        </div> 
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
                @foreach ($tutor['user']['schedules'] as $schedule)
                  <div class="checkbox">
                  <label>
                  <input type="checkbox" name="schedules_list[]" value="{{$schedule->id}}">  
                  {{$schedule->day}}
                    {{\Carbon\Carbon::createFromFormat('H:i:s',$schedule->start_time)->format('h:i A')}}
                    to 
                    {{\Carbon\Carbon::createFromFormat('H:i:s',$schedule->end_time)->format('h:i A')}}
                    <br/>
                    SUBJECT: {{$schedule->subject->name}}</label>
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
