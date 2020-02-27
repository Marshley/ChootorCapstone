@extends('layout.app')
    
    
<style>
  .card {
    margin: 0 auto; /* Added */
    float: none; /* Added */
    margin-bottom: 10px; /* Added */  
  }
  
  #homebtn {
    background-color: #e27235;
    color: white;
    border-color: #e27235;
  }

  #homebtn:hover {
    background-color: #fa935b;
    color: #ffffff;
    border-color: #fa935b;
  }
  #cbtn {
    background-color: #ffffff;
    color: #e27235;
    border-color: #e27235;
  }
  #cbtn:hover {
    background-color: #fa935b;
    color: #ffffff;
    border-color: #fa935b;
  }
  #cbtnsbmt {
    background-color: #e27235;
    color: #ffffff;
    border-color: #e27235;
  }
  #cbtnsbmt:hover {
    background-color: #fa935b;
    color: #ffffff;
    border-color: #fa935b;
  }

  .thead {
    /* background-color: #141945; */
    color: #e27235;
  }
  #ccard {
        width: 500px;
        height: auto;
        margin-top: 50px;
        border-color: #e27235;
  }

  @media only screen
  and (min-device-width : 320px)
  and (max-device-width : 480px) {
    #ccard {
        width: 300px;
        height: auto;
        margin-top: 50px;
        border-color: #e27235;
    }
    .note {
      font-size: 15px;
    }
  }
</style>
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

@if(session('messg'))
  <div class="alert alert-danger" role="alert" > 
    {{ session('messg') }}
  </div>
@endif

@if(session('delmsg'))
  <div class="alert alert-success" role="alert" > 
    {{ session('delmsg') }}
  </div>
@endif

@if(session('umsg'))
  <div class="alert alert-success" role="alert" > 
    {{ session('umsg') }}
  </div>
@endif

@foreach ($rates as $rate)
    {{-- {{$rate->max_rate}} --}}
    @if(session('message'))
    <div class="alert alert-danger" role="alert" > 
      {{ session('message') }} minimun rate: {{$rate->min_rate}} - maximum rate: {{$rate->max_rate}}
    </div>
    @endif
    
    @if(session('messgs'))
    <div class="alert alert-success" role="alert" > 
      {{ session('messgs') }}
    </div>
    @endif
    
    <h1 class="text-center" style="margin-top:50px;margin-bottom:50px">SCHEDULE CONFIGURATION</h1>
    
    <div class="card text-center shadow p-2 mb-3" id="ccard">
      <form action="/addinfo" method="POST">
        {{ csrf_field() }}    
        <div class="container">
          <div class="form-row justify-content-center">
            <div class="form-group col-md-10 col-xs-10" style="margin-top:50px">
              <p class="font-italic note">* note: please input first your rate per hour and the location where you'll meet with your tutee</p>
              <label for="rate note">RATE / HR</label>
              
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">₱</span>
                </div>
              <input type="number" class="form-control text-center" id="rate" name="rate" value="{{$user->rate}}" min="{{$rate->min_rate}}" max="{{$rate->max_rate}}">
                @endforeach
                <div class="input-group-append">
                  <span class="input-group-text">.00</span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row justify-content-center">
            <div class="form-group note col-md-10 col-xs-10 ">
              <label for="location_id">LOCATION</label>
              <select id="location_id" class="form-control" name="location_id" >
                <option selected disabled> {{$user->location->name}}</option>
                @foreach ($location as $locations)
                 @if($user->location->name != $locations->name)
                    <option value="{{$locations->id}}"> {{$locations->name }}</option>
                  @endif
                @endforeach                                
              </select>
            </div>
          </div>
        </div>
        
        <div class="container">
          <div class="form-row">
              <div class="col-md-4 justify-content-center">
                 
              </div>
              <div class="col-md-4 justify-content-center" >
                  <button id="homebtn" type="submit" class="btn btn-outline-dark btn-block" style="margin-top:30px;margin-bottom:10px">SAVE</button>
              </div>
              <div class="col-md-4 justify-content-center">
                 
              </div>
          </div>
        </div>

      </form>
    </div>
    <br/>
                            {{-- START OF CREATING TUTOR SCHEDULE --}}
    <!-- <button id="homebtn" type="button" class="btn btn-primary btn-block" data-toggle="modal" style="margin-top:20px;margin-bottom:10px" data-target="#exampleModal">
      CREATE SCHEDULE
    </button> -->
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
            <div class="modal-body" style="height:auto;weight:478">
            <form name="setSchedule" method="post" action="/addtutorschedule/{{$user->id}}" onsubmit="return validateForm()" >
              {{ csrf_field() }}                    
              <div class="form-group col-md-12">
              <p class="font-italic note text-center">* note: that the schedule you set will only be visible for this week only</p>
                {{-- <label for="day">Day</label>
                <select id="day" class="form-control" name="day">
                  <option selected>Monday</option>
                  <option>Tuesday</option>
                  <option>Wednesday</option>
                  <option>Thursday</option>
                  <option>Friday</option>
                  <option>Saturday</option>
                </select> --}}
              </div>
              <div class="form-group col-md-12">
                <br/>
                <p class="note"> PICK YOUR AVAILABLE DAY/S</p> 
                <div class="row my-3">
                  <div class="col-1">
                  </div>
                  <div class="col-3 center">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="day" value="Monday" name="day_list[]">
                      <label class="form-check-label" for="day">Monday</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="day" value="Thursday" name="day_list[]">
                      <label class="form-check-label" for="day">Thursday</label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="day" value="Tuesday" name="day_list[]">
                      <label class="form-check-label" for="day">Tuesday</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="day" value="Friday" name="day_list[]">
                      <label class="form-check-label" for="day">Friday</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input type="checkbox" onclick="toggle(this);" />Everyday<br />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="day" value="Wednesday" name="day_list[]">
                      <label class="form-check-label" for="day">Wednesday</label>
                    </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="day" value="Saturday" name="day_list[]">
                          <label class="form-check-label" for="day">Saturday</label>
                        </div>
                      </div>
                </div>
              </div>

              {{-- <input type="checkbox" onclick="toggle(this);" />Select all?<br /> --}}

              <div class="row">
                <div class="form-group mx-5 my-4">FROM
                  <input type="time" id="start_time" class="form-control" name="start_time" min="08:00:00" max="17:00:00">
                  <label for="start_time">Choose start time</label>
                </div>
                <div class="form-group mx-5 my-4"> TO:
                  <input type="time" id="end_time" class="form-control" name="end_time" min="08:00:00" max="17:00:00">
                  <label for="end_time">Choose end time</label>
                </div>
              </div>
              <div class="form-group col-md-12 my-3">
                <label for="subject_id">Subject</label>
                <input class="typeahead form-control" type="text" name="subject" id="subject" />
                 {{-- @foreach ($subject as $subjects) 
                @endforeach   
                <select id="subject_id" class="form-control" name="subject_id" >
                    @foreach ($subject as $subjects)
                        <option value="{{$subjects->id}}"> {{$subjects->name }}</option>
                    @endforeach                              
                </select>                --}}
              </div>
              <div class="form-group col-md-12">              
                <label for="materials">Materials to bring (if any): </label>   
                <input class="typeahead form-control" type="text" name="materials" id="materials" />  
              </div>

              <div class="form-row">
                <div class="col-md-4 justify-content-center">
                   
                </div>
                <div class="col-md-6 justify-content-center" >
                  <button style="cursor:pointer" id="cbtnsbmt" type="submit" class="btn btn-dark">Submit</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <div class="col-md-2 justify-content-center">
                   
                </div>
            </div>
              
              </form>
              {{-- <div class="modal-footer">
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    {{-- END OF CREATING TUTOR SCHEDULE --}}


    {{-- START OF TABLE --}}
  <div class="container-fluid overflow-scroll">
    <table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl .w-auto">
      <thead class="thead">
        <tr>
            {{-- <th scope="col">#</th> --}}
            <th scope="col">DAY</th>
            <th scope="col">FROM</th>
            <th scope="col">TO</th>
            <th scope="col">SUBJECT</th>
            <th scope="col">MATERIALS</th>
            <th scope="col">STATUS</th>
            <th scope="col"><button id="homebtn" type="button" class="btn btn-primary btn-sm m-0" data-toggle="modal" data-target="#exampleModal"> Add Schedule </button></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($schedules as $schedule)
          <tr>
            {{-- <td>{{$schedule->id}}</td> --}}
            <td>{{$schedule->day}}</td>
            <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$schedule->start_time)->format('h:i A')}}</td>
            <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$schedule->end_time)->format('h:i A')}}</td>
            <td>{{$schedule->subject->name}}</td>
            <td>{{$schedule->materials}}</td>
            <td>{{$schedule->status}}</td>
            <td>
              <div class="d-flex flex-row">
              <form method="post" action="/publish/{{$schedule->id}}" >
                {{ csrf_field() }}
              <button id="homebtn" type="submit" class="btn btn-primary btn-sm m-0" name="status" value="published"> Publish </button>
            </form>
            <span style="width:1em;"> </span>
            <form method="post" action="/destroy/{{$schedule->id}}" >
              {{ csrf_field() }}
                <button id="btn" type="submit" class="btn btn-danger btn-sm m-0"> Remove </button>
            </form>
              </div>
            </td>
            <td> </td>
            {{-- <td> <form name="destroy" method="get" action="/destroy" >
            <button> Delete </button> 
            </form>
          </td> --}}
          </tr>
        @endforeach
      </tbody>
    </table>
    
  </div>


<script>

    function validateForm() {
      var startTime = document.getElementById("start_time").value
      var endTime = document.getElementById("end_time").value

      var time1 = startTime.split(":");
      var hour1 = time1[0];
      if(hour1 == "00") {hour1 = 24}
      var min1 = time1[1];
      startTime = hour1 + "." + min1
      
      var time2 = endTime.split(":")
      var hour2 = time2[0];
      if(hour2 == "00") {hour2 = 24}
      var min2 = time2[1]
      endTime = hour2 + "." + min2
      
      var totalTime = startTime - endTime

      if(Math.abs(totalTime) >= 1) {
        return true;
      } else {
        alert("Time duration must be atleast 1 hour!")
      }

      return false;
    }

</script>

<script>
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>
@endsection