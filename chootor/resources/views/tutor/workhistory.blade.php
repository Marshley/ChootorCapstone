@extends('layout.app')
@section('content')
<h1 class="text-center" style="margin-top:50px;margin-bottom:50px">WORK HISTORY</h1>
<table class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl ">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Tutee Name</th>
        <th scope="col">Time</th>
        <th scope="col">Day</th>
        <!-- <th scope="col">Status</th> -->
    </tr>
    </thead>
    <tbody>
        @foreach ($user->schedules as $sessiondone)
                @if ($sessiondone->booking)
            @if ($sessiondone->booking->status == 'done')
            <tr> 
                {{-- <td>{{$user->location->name}}</td> --}}
                <td>{{$sessiondone->booking->tutee->firstname}} {{$sessiondone->booking->tutee->lastname}}</td>
                <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$sessiondone->start_time)->format('h:i A')}}
                    to 
                    {{\Carbon\Carbon::createFromFormat('H:i:s',$sessiondone->end_time)->format('h:i A')}}
                </td>
                <td>{{$sessiondone->day}}</td>
                <!-- <td>{{$sessiondone->booking->status}}</td> -->
                @endif
            @endif
        @endforeach
    </tbody>
</table>
@endsection
