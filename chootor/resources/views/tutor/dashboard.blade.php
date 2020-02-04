@extends('layout.app')
@section('content')
<style>
    .thead {
      /* background-color: #141945; */
      /* color: #006D5B; */
      color: #d35400;
    }
    .thead-light {
      /* background-color: #141945; */
      /* color: #006D5B; */
      color: #e27235;
    }
</style>
 <h1 class="text-center" style="margin-top:50px;margin-bottom:50px">APPOINTMENTS</h1> 
<!-- <hr> -->

<table class="table table-borderless text-center  table-responsive-xs table-responsive-sm table-responsive-md table-responsive-lg " style="margin-top:50px;margin-bottom:50px">
    <thead class="thead">
    <tr>
        <th scope="col">MONDAY</th>
        <th scope="col">TUESDAY</th>
        <th scope="col">WEDNESDAY</th>
        <th scope="col">THURSDAY</th>
        <th scope="col">FRIDAY</th>
        <th scope="col">SATURDAY</th>
    </tr>
    </thead>
    <tbody>
       <tr>
        <td> {{ $user->getScheduleCount("Monday")}} </td>
        <td> {{ $user->getScheduleCount("Tuesday")}} </td>
        <td> {{ $user->getScheduleCount("Wednesday")}} </td>
        <td> {{ $user->getScheduleCount("Thursday")}} </td>
        <td> {{ $user->getScheduleCount("Friday")}} </td>
        <td> {{ $user->getScheduleCount("Saturday")}} </td>        
       </tr>
    </tbody>
</table>

</br>

        @if(auth()->user()->status == 'pending')
            <div class="alert alert-primary" role="alert">
                Your account is needed to be verified first but you can already create a schedule for the week. Go to <a href="/tutorschedule" class="alert-link">Schedule Settings</a>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

<table class="table table-hover table-responsive-xs table-responsive-sm table-responsive-md table-responsive-lg ">
    <thead class="thead">
    <tr>
        <th scope="col">TUTEE NAME</th>
        <th scope="col">DAY</th>
        <th scope="col">TIME</th>
        <th scope="col">LOCATION</th>
        <th scope="col">SUBJECT</th>
        <th scope="col">RATE/HR</th>
        <th scope="col">MATERIALS</th>
        <th scope="col">ACTION BUTTONS</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($user->schedules as $show)
        @if ($show->booking)
        @if ($show->booking->status == 'approved')
            <tr>
                <td>{{$show->booking->tutee->firstname}} {{$show->booking->tutee->lastname}}</td>
                <td>{{$show->booking->schedule->day}}</td>
                <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$show->booking->schedule->start_time)->format('h:i A')}}
                    to 
                    {{\Carbon\Carbon::createFromFormat('H:i:s',$show->booking->schedule->end_time)->format('h:i A')}}</td>
                {{-- <td> {{$show->booking->status}}</td> --}}
                <td>{{$show->booking->schedule->location->name}}</td>
                <td>{{$show->booking->schedule->subject->name}}</td>
                <td>₱ {{$user->rate}}.00</td>
                <td>{{$show->booking->schedule->materials}}</td>
                <td>
                <div class="d-flex flex-row">
                    <form method="post" action="updatesession/{{$show->booking->id}}" >
                          {{ csrf_field() }}
                        <button type="submit" class="btn btn-success " id="status" name="status" value="done">
                        <label class="form-check-label" for="status">DONE</button>
                    </form>
                </td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$show->booking->id}}">
                        Report
                    </button>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal{{$show->booking->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">REPORT</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-center">
                              <div class="container">
                              <p>{{$show->booking->tutee->firstname}}</p>
                              {{-- {{$show->booking->report}} --}}
                              <form method="post" action="report/{{$show->booking->id}}" >
                                {{ csrf_field() }}
                                <div class="form-group col-md-12">              
                                    <label for="description">Describe the report: </label>   
                                    <input class="typeahead form-control" type="text" name="description" id="description" />  
                                  </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success " id="booking_id" name="booking_id">
                                <label class="form-check-label" for="booking_id">SUBMIT REPORT</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>
    
                    </td>
                @endif
            @endif
        @endforeach
    </tbody>
</table>
@endsection
