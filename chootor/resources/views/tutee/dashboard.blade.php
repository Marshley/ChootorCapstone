@extends('layout.app')
@section('content')
<h1>TUTUEE</h1>
@foreach ($tutor_list as $tutor)
    <div class="card">
        <div class="card-body">
            <div class="card-title">       
               <h3>Name: {{$tutor->name}}</h3>
            </div>
            <div class="card-text">
                <h4>School ID: {{$tutor->school_id}}</h4> <br />
                <h4>Rate: {{$tutor->rate}}/hour</h4> <br />
                <h4>Subject:  
                    @foreach ($tutor->schedules as $sched)
                        {{$sched->subject->name}}, 
                    @endforeach</h4> 
                <br /> 
                <h4>Location: {{$tutor->schedules[0]->location->name}}</h4>
            </div>
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Book
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="/booking" >
            {{ csrf_field() }}
            @foreach ($tutor->schedules as $sched)
                <div class="checkbox">
                <label>
                <input type="checkbox" name="schedules[]" value="{{$sched->id}}">  
                      {{$sched->id}}  
                        {{$sched->day}}
                        {{$sched->start_time}} to 
                        {{$sched->end_time}} 
                        SUBJECT: {{$sched->subject->name}}</label>
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
    {{-- @foreach ( $tutor->schedules as $sched)
        {{$sched->day}}
    @endforeach
    {{$sched->subject->name}} --}}
    {{-- {{$tutor->schedules}} --}}
@endforeach
@endsection
