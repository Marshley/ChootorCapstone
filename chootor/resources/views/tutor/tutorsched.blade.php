@extends('layout.app')

<style>
  .card {
    margin: 0 auto; /* Added */
    float: none; /* Added */
    margin-bottom: 10px; /* Added */  
  }

  #cbtn {
    background-color: #ffffff;
    color: #141945;
    border-color: #141945;
  }
  #cbtn:hover {
    background-color: #141945;
    color: #ffffff;
  }
  #cbtnsbmt {
    background-color: #141945;
    color: #ffffff;
    border-color: #141945;
  }
  #cbtnsbmt:hover {
    background-color: #1A2056;
    color: #ffffff;
    border-color: #1A2056;
  }

  .thead {
    background-color: #141945;
    color: #ffffff;
  }
  #ccard {
        width: 500px;
        height: 400px;
        margin-top: 50px;
        border-color: #141945;
  }
</style>
@section('content')
   <h1 class="text-center" style="margin-top:50px;margin-bottom:50px">SCHEDULE CONFIGURATION</h1> 
   
    <div class="card text-center" id="ccard">
      <form action="/addinfo" method="POST">
        {{ csrf_field() }}    
        <div class="container">
          <div class="form-row justify-content-center">
            <div class="form-group col-md-10" style="margin-top:50px">
              <p class="font-italic">* note: please input first your rate per hour and the location where you'll meet with your tutee</p>
              <label for="rate">RATE / HR</label>
              <input type="rate" class="form-control text-center" id="rate" name="rate" value="{{$user->rate}}">
            </div>
          </div>

          <div class="form-row justify-content-center">
            <div class="form-group col-md-10">
              <label for="location_id">LOCATION</label>
              <select id="location_id" class="form-control" name="location_id" >
                @foreach ($location as $locations)
                  <option value="{{$locations->id}}"> {{$locations->name }}</option>
                @endforeach                                
              </select>
            </div>
          </div>
        </div>
        
        <div class="container">
          <div class="form-row">
              <div class="col-md-4 justify-content-center">
                 
              </div>
              <div class="col-md-4 justify-content-center">
                  <button id="cbtn" type="submit" class="btn btn-outline-dark btn-block" style="margin-top:30px;margin-bottom:10px">SAVE</button>
              </div>
              <div class="col-md-4 justify-content-center">
                 
              </div>
          </div>
        </div>

      </form>
    </div>
    <br/>
                            {{-- START OF CREATING TUTOR SCHEDULE --}}
    <button id="cbtn" type="button" class="btn btn-outline-primary btn-block" data-toggle="modal" style="margin-top:20px;margin-bottom:10px" data-target="#exampleModal">
      CREATE SCHEDULE
    </button>
    <br/>

    <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">SET SCHEDULE</h5>
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
              <div class="row">
                <div class="form-group mx-5 my-4">FROM
                  <input type="time" id="time" class="form-control" name="start_time">
                  <label for="start_time">Choose start time</label>
                </div>
                <div class="form-group mx-5 my-4"> TO:
                  <input type="time" id="time" class="form-control" name="end_time">
                  <label for="end_time">Choose end time</label>
                </div>
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
                <button type="button" id="cbtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button style="cursor:pointer" id="cbtnsbmt" type="submit" class="btn btn-dark">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- END OF CREATING TUTOR SCHEDULE --}}


    {{-- START OF TABLE --}}
  <table class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl ">
    <thead class="thead">
      <tr>
          {{-- <th scope="col">#</th> --}}
          <th scope="col">Day</th>
          <th scope="col">From</th>
          <th scope="col">To</th>
          <th scope="col">Subject</th>
          <th scope="col">Location</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($user->schedules as $schedules)
        <tr>
          {{-- <td>{{$schedules->id}}</td> --}}
          <td>{{$schedules->day}}</td>
          <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$schedules->start_time)->format('h:i A')}}</td>
          <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$schedules->end_time)->format('h:i A')}}</td>
          <td>{{$schedules->subject->name}}</td>
          <td>{{$schedules->location->name}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection