@extends('layout.app')
@section('content')
<h1> REQUESTS </h1>

<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Tutee ID</th>
        <th scope="col">Schedule ID</th>
        <th scope="col">Status</th>
        <th scope="col">Action Buttons</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($user->schedules as $request)
                @if ($request->booking)
            @if ($request->booking->status == 'pending')
            <tr>
                <td>{{$request->booking->id}}</td>
                <td>{{$request->booking->tutee_id}}</td>
                <td>{{$request->booking->schedule_id}}</td>
                <td> {{$request->booking->status}}</td>
                <td>
                <div class="d-flex flex-row">
                    <form method="post" action="updaterequest/{{$request->booking->id}}" >
                          {{ csrf_field() }}
                        <button type="submit" class="btn btn-success " id="status" name="status" value="approved">
                          <label class="form-check-label" for="status">
                          ✓</button>
                        </form>
                        <span style="width:1em;"> </span>
                      <form method="post" action="/updaterequest/{{$request->booking->id}}" >
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-danger " id="status" name="status" value="disapproved">
                          <label class="form-check-label" for="status">
                          X</button>
                        </form>
                </td>
            </tr>

        @endif
        @endif
        @endforeach
    </tbody>
</table>
@endsection
