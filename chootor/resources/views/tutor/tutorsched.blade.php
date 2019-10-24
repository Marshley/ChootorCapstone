@extends('layout.app')

@section('content')
   <h1>SCHEDULE</h1> 
   <form action="/addinfo" method="POST">
    {{ csrf_field() }}    
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="rate">Rate</label>
          <input type="rate" class="form-control" id="rate" name="rate" value="{{$user->rate}}">
          </div>
            <div class="form-group col-md-4">
              <label for="location_id">Location</label>
                  <select id="location_id" class="form-control" name="location_id" >
                      @foreach ($location as $locations)
                      {{$locations->id}}
                          <option selected value="{{$locations->id}}"> {{$locations->name }}</option>
                      @endforeach                                
                  </select>
              </div>
                </div>
                <button type="submit" class="btn btn-primary">SAVE</button>
      </form>
    </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  SUBJECT SCHEDULE
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
      <form method="post" action="/addtutorschedule/{{$user->id}}" >
          {{ csrf_field() }}
              
          <div class="form-group col-md-6">
            <label for="day">Day</label>
            <select id="day" class="form-control" name="day">
              <option selected>Monday</option>
              <option>Tuesday</option>
              <option>Wednesday</option>
              <option>Thursday</option>
              <option>Friday</option>
              <option>Saturday</option>
            </select>
        </div>
        <div class="form-group mx-5 my-4">
                <input type="time" id="time" class="form-control" name="start_time">
                <label for="start_time">Choose start time</label>
        </div>
             
        <div class="form-group mx-5 my-4 ">
          <input type="time" id="time" class="form-control" name="end_time">
          <label for="end_time">Choose end time</label>
        </div>
        <div class="form-group col-md-4">
          <label for="subject_id">Subject</label>
          <select id="subject_id" class="form-control" name="subject_id" >
              @foreach ($subject as $subjects)
                  <option value="{{$subjects->id}}"> {{$subjects->name }}</option>
              @endforeach                                
          </select>
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




<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Day</th>
        <th scope="col">From</th>
        <th scope="col">To</th>
        <th scope="col">Subject</th>
        
    </tr>
    </thead>
    <tbody>
        @foreach ($tutorschedule as $schedules)
        <tr>
            <td>{{$schedules->id}}</td>
            <td>{{$schedules->day}}</td>
            <td>{{$schedules->start_time}}</td>
            <td>{{$schedules->end_time}}</td>
            <td>{{$schedules->subject->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection