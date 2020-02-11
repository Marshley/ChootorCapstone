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
    .shadow-textarea textarea.form-control::placeholder {
      font-weight: 300;
    }
    .shadow-textarea textarea.form-control {
      padding-left: 0.8rem;
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
</style>
 @if(session('mesg'))
 <div class="alert alert-danger" role="alert" > 
   {{ session('mesg') }}
 </div>
@endif
@if(session('msg'))
<div class="alert alert-success" role="alert" > 
  {{ session('msg') }}
</div>
@endif
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
                    <span style="width:1em;"> </span>
                    <button type="button" class="btn btn-danger" data-toggle="modal" style="font-weight:bold" data-target="#exampleModal{{$show->booking->id}}">
                      !
                    </button>
                    {{-- <ion-icon type="button" class="btn btn-danger" data-toggle="modal" style="font-weight:bold" data-target="#exampleModal{{$show->booking->id}}" name="warning"></ion-icon> --}}
                </td>
                <td>
                    <!-- Button trigger modal --> 
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
                              {{-- <p>TUTEE:</p> --}}
                              <br/>
                              <br/>
                              @if($show->booking->tutee->image)
                                <img src="{{$show->booking->tutee->image}}" class="img-responsive rounded" style="height:150px;width:150px" alt="profilepicture">
                              @else
                                <img src="../img/blank.png" class="img-responsive" style="height:100px;width:100px"  alt="profilepicture">
                              @endif
                              <br/>
                              <br/>
                              <h5 style="font-weight: bold;">{{$show->booking->tutee->lastname}}, {{$show->booking->tutee->firstname}} {{$show->booking->tutee->middleinitial}}</h5>
                              {{-- {{$show->booking->report}} --}}
                              <form method="post" action="report/{{$show->booking->id}}" >
                                {{ csrf_field() }}
                                <div class="form-group col-md-12">   
                                <br/>
                                {{-- <label for="description" class="font-italic">Can you describe the incident?</label>    --}}
                                {{-- <input class="typeahead form-control" type="text" name="description" id="description" />   --}}
                                {{-- <textarea class="form-control rounded-0" id="description" hint="Can you describe the incident?" name="description" rows="10"></textarea> --}}
                                <textarea class="form-control z-depth-1" name="description" id="description" rows="3" placeholder="Can you describe the incident?"></textarea>  
                              </form>
                              
                              <br/>
                              <button type="submit" class="btn btn-success " id="cbtnsbmt" for="booking_id" name="booking_id">
                              {{-- <label class="form-check-label" for="booking_id"> --}}
                                SUBMIT REPORT</button>
                              </div>
                            </div>
                          </div>
                            
                            
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
