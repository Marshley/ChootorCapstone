@extends('layout.app')
@section('content')
<h1 class="text-center" style="margin-top:50px;margin-bottom:50px">TUTOR APPROVED BOOKING</h1>
<table class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl ">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Tutee Name</th>
        <th scope="col">Day</th>
        <th scope="col">Time</th>
        {{-- <th scope="col">Status</th> --}}
        <th scope="col">Action Buttons</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($user->schedules as $show)
        @if ($show->booking)
        @if ($show->booking->status == 'approved')
            <tr>
                <td>{{$show->booking->tutee->firstname}} {{$show->booking->tutee->lastname}}</td>
                <td>{{$show->booking->schedule->day}}</td>
                <td>{{$show->booking->schedule->start_time}} to {{$show->booking->schedule->end_time}}</td>
                {{-- <td> {{$show->booking->status}}</td> --}}
                <td>
                <div class="d-flex flex-row">
                    <form method="post" action="updatesession/{{$show->booking->id}}" >
                          {{ csrf_field() }}
                        <button type="submit" class="btn btn-success " id="status" name="status" value="done">
                          <label class="form-check-label" for="status">
                          DONE</button>
                        </form>
                </td>
                @endif
            @endif
        @endforeach
    </tbody>
</table>
@endsection
