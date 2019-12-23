@extends('layout.app')
@section('content')
<style>
    .thead {
      /* background-color: #141945; */
      color: #006D5B;
    }
</style>
{{-- <h1 class="text-center" style="margin-top:50px;margin-bottom:50px">APPOINTMENTS</h1> --}}

<table class="table table-bordered text-center text-black" style="margin-top:50px;margin-bottom:50px">
    <thead class="thead-light ">
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

<table class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl ">
    <thead class="thead">
    <tr>
        <th scope="col">TUTEE NAME</th>
        <th scope="col">DAY</th>
        <th scope="col">TIME</th>
        {{-- <th scope="col">Status</th> --}}
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
                <td>
                <div class="d-flex flex-row">
                    <form method="post" action="updatesession/{{$show->booking->id}}" >
                          {{ csrf_field() }}
                        <button type="submit" class="btn btn-success " id="status" name="status" value="done">
                        <label class="form-check-label" for="status">DONE</button>
                    </form>
                </td>
                @endif
            @endif
        @endforeach
    </tbody>
</table>
@endsection
