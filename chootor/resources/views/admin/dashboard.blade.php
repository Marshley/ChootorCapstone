@extends('layout.app')

@section('content')
    <h1>ADMIN DASHBOARD</h1>

    <table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl ">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Name</th>
          <th scope="col">School ID</th>
          <th scope="col">Email</th>
          <th scope="col">Status</th>
          <th scope="col">Action Button</th>
        </tr>
      </thead>
      <tbody>
        <tr>
              @foreach ($users as $user)
                  @if($user->user_type == 'tutor')
                  <tr>
                      <td>{{$user->firstname}} {{$user->lastname}} {{$user->middleinitial}}</td>
                      <td>{{$user->school_id}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->status}}</td>
                      
                      <td>
                          <div class="d-flex flex-row">
                        <form method="post" action="/updatetutor/{{$user->id}}" >
                          {{ csrf_field() }}
                        <button type="submit" class="btn btn-success " id="status" name="status" value="approved">
                          <label class="form-check-label" for="status">
                          ✓</button>
                        </form>
                        <span style="width:1em;"> </span>
                      <form method="post" action="/updatetutor/{{$user->id}}" >
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-danger " id="status" name="status" value="disapproved">
                          <label class="form-check-label" for="status">
                          X</button>
                        </form>
                      </td>
                    </div>
                  </tr>
                  @endif
              @endforeach
        </tr>
      </tbody>
    </table>
@endsection