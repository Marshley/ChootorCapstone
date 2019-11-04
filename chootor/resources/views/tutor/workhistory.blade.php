@extends('layout.app')
@section('content')
<h1 class="text-center" style="margin-top:50px;margin-bottom:50px">WORK HISTORY</h1>
<table class="table table-light">
    <thead>
    <tr>
        <th scope="col">Tutee Name</th>
        <th scope="col">Time</th>
        <th scope="col">Day</th>
        <th scope="col">Status</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($user->schedules as $sessiondone)
                @if ($sessiondone->booking)
            @if ($sessiondone->booking->status == 'done')
            <tr> 
                {{-- <td>{{$user->location->name}}</td> --}}
                <td>{{$sessiondone->booking->tutee->firstname}} {{$sessiondone->booking->tutee->lastname}}</td>
                <td>{{$sessiondone->start_time}} to: {{$sessiondone->end_time}} </td>
                <td>{{$sessiondone->day}}</td>
                <td>{{$sessiondone->booking->status}}</td>
                @endif
            @endif
        @endforeach
    </tbody>
</table>
@endsection
