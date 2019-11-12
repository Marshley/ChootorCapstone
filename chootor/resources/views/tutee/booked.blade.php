@extends('layout.app')
@section('content')
<style>
    .thead {
      background-color: #141945;
      color: #ffffff;
    }
</style>
<h1 class="text-center" style="margin-top:50px;margin-bottom:50px">APPOINTMENTS</h1>
<table class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl ">
    <thead class="thead">
    <tr>
        <th scope="col">Tutor Name</th>
        <th scope="col">Day</th>
        <th scope="col">Time</th>
        <th scope="col">Status</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($user->bookings as $booked)
        @if ($user->bookings)
        {{-- @if ($booked->status == 'approved') --}}
            <tr>
                <td>{{$booked->schedule->tutor->firstname}} {{$booked->schedule->tutor->lastname}}</td>
                <td>{{$booked->schedule->day}}</td>
                <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$booked->schedule->start_time)->format('h:i A')}}
                    to 
                    {{\Carbon\Carbon::createFromFormat('H:i:s',$booked->schedule->end_time)->format('h:i A')}}</td>
                 <td> {{$booked->status}}</td>
                {{-- @endif --}}
            @endif
        @endforeach
    </tbody>
</table>
@endsection
