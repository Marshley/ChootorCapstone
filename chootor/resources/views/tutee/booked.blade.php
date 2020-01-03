@extends('layout.app')
@section('content')
<style>
    .thead {
      background-color:white;
      color: #d35400;
    }
</style>
{{-- <h1 class="text-center" style="margin-top:50px;margin-bottom:50px">APPOINTMENTS</h1> --}}
<table class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl " style ="margin-top: 50px">
    <thead class="thead">
    <tr>
        <th scope="col">TUTOR NAME</th>
        <th scope="col">DAY</th>
        <th scope="col">TIME</th>
        <th scope="col">STATUS</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($user->bookings as $booked)
        @if ($user->bookings)
        @if ($booked->status != 'done')
            <tr>
                <td>{{$booked->schedule->tutor->firstname}} {{$booked->schedule->tutor->lastname}}</td>
                <td>{{$booked->schedule->day}}</td>
                <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$booked->schedule->start_time)->format('h:i A')}}
                    to 
                    {{\Carbon\Carbon::createFromFormat('H:i:s',$booked->schedule->end_time)->format('h:i A')}}</td>
                 <td> {{$booked->status}}</td>
                @endif
            @endif
        @endforeach
    </tbody>
</table>
@endsection
