@extends('layout.app')
@section('content')
<h1>WORK HISTORY</h1>
<table class="table table-light">
    <thead>
    <tr>
        <th scope="col">Tutee ID</th>
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
                <td>{{$sessiondone->booking->tutee_id}}</td>
                <td>{{$sessiondone->start_time}} to: {{$sessiondone->end_time}} </td>
                <td>{{$sessiondone->day}}</td>
                <td>{{$sessiondone->booking->status}}</td>
                @endif
            @endif
        @endforeach
    </tbody>
</table>
@endsection
