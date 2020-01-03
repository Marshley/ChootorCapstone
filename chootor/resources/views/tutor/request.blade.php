@extends('layout.app')
@section('content')
<style>
  .thead {
    /* background-color: #006D5B; */
    /* color: #ffffff; */
    color: #e27235;
  }
  .btn-primary, .btn-primary:active, .btn-primary:visited, .btn-primary:focus {
        border-color: #e27235;
        color: white;
        background-color: #e27235;
    }

    .btn-primary:hover {
        background-color: #fa935b;
        color: #ffffff;
        border-color: #fa935b;  
    }
</style>
{{-- <h1 class="text-center" style="margin-top:50px;margin-bottom:50px"> BOOKING REQUESTS </h1> --}}

<table class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl " style="margin-top:50px">
    <thead class="thead">
    <tr>
        <th scope="col">TUTEE NAME</th>
        <th scope="col">DAY</th>
        <th scope="col">TIME</th>
        <th scope="col">SUBJECT</th>
        <th scope="col">ACTION BUTTONS</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($schedules as $request)
                @if ($request->booking)
            @if ($request->booking->status == 'pending')
            <tr>
                <td>{{$request->booking->tutee->firstname}} {{$request->booking->tutee->lastname}}</td>
                <td>{{$request->booking->schedule->day}}</td>
                <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$request->booking->schedule->start_time)->format('h:i A')}} -
                {{\Carbon\Carbon::createFromFormat('H:i:s',$request->booking->schedule->end_time)->format('h:i A')}}</td>
                <td>{{$request->booking->schedule->subject->name}} {{$request->booking->subtopic}}</td>
                <td>
                <div class="d-flex flex-row">
                    <form method="post" action="updaterequest/{{$request->booking->id}}" >
                          {{ csrf_field() }}
                        <button type="submit" class="btn btn-success" id="status" name="status" value="approved">
                          <label class="form-check-label" for="status">
                          ✓</button>
                        </form>
                        <span style="width:1em;"> </span>
                      <form method="post" action="/updaterequest/{{$request->booking->id}}" >
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-danger" id="status" name="status" value="disapproved">
                          <label class="form-check-label" for="status">
                          X</button>
                        </form>
                </td>
                <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$request->booking->tutee_id}}">
                    View 
                </button>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{$request->booking->tutee_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tutee Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center">
                          <div class="container">
                            <img src="{{$request->booking->tutee->image}}" class="img-responsive" alt="profilepicture">                           
                            <p class="text-center">School ID: {{$request->booking->tutee->school_id}} </p>
                            <p class="text-center">Name: {{$request->booking->tutee->lastname}}, {{$request->booking->tutee->firstname}} {{$request->booking->tutee->middleinitial}}</p>
                            <p class="text-center">Course: {{$request->booking->tutee->course->course_name}} </p>
                            <p class="text-center">Email: {{$request->booking->tutee->email}} </p>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </td>
            </tr>

        @endif
        @endif
        @endforeach
    </tbody>
</table>
@endsection
