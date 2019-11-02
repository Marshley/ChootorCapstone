@extends('layout.app')
@section('content')
<h1>TUTOR APPROVED BOOKING</h1>
<table class="table table-light">
    <thead>
    <tr>
        <th scope="col">Tutee ID</th>
        <th scope="col">Schedule ID</th>
        <th scope="col">Status</th>
        <th scope="col">Action Buttons</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($user->schedules as $show)
        @if ($show->booking)
        @if ($show->booking->status == 'approved')
            <tr>
                <td>{{$show->booking->tutee_id}}</td>
                <td>{{$show->booking->schedule_id}}</td>
                <td> {{$show->booking->status}}</td>
                <td>
                <div class="d-flex flex-row">
                    <form method="post" action="updaterequest/{{$show->booking->id}}" >
                          {{ csrf_field() }}
                        <button type="submit" class="btn btn-success " id="status" name="status" value="done">
                          <label class="form-check-label" for="status">
                          ✓</button>
                        </form>
                </td>
                @endif
            @endif
        @endforeach
    </tbody>
</table>
@endsection
