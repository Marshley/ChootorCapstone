@extends('layout.app')

@section('content')
   <h1>SCHEDULE</h1> 
   <form action="/addtutorschedule" method="POST">
    {{ csrf_field() }}
        {{-- <div class="form-group">
                <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$user->name}}">
        </div> --}}
    
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="rate">Rate</label>
          <input type="rate" class="form-control" id="rate" name="rate" value="{{$user->rate}}">
          </div>
              <div class="form-group col-md-4">
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
                    <label for="start_time">Choose your time</label>
                </div>
                 
                <div class="form-group mx-5 my-4 ">
                <input type="time" id="time" class="form-control" name="end_time">
                <label for="end_time">Choose your time</label>
                </div>
                <div class="form-group col-md-4">
                        <label for="subject_id">Subject</label>
                        <select id="subject_id" class="form-control" name="subject_id" >
                                @foreach ($subject as $subjects)
                                    <option value="{{$subjects->id}}"> {{$subjects->name }}</option>
                                @endforeach                                
                            </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="location_id">Location</label>
                            <select id="location_id" class="form-control" name="location_id" >
                                @foreach ($location as $locations)
                                    <option value="{{$subjects->id}}"> {{$locations->name }}</option>
                                @endforeach                                
                            </select>
                        </div>
                </div>
                <button type="submit" class="btn btn-primary">SAVE</button>
    </div>
</div>

      </form>
@endsection