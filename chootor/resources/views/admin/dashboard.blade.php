@extends('layout.app')

@section('content')
  <style>
    .thead {
      /* background-color: #fa935b; */
      color: #d35400;
      /* border-color: #fa935b; */
    }
  </style>

<h1 class="text-center" style="margin-top:50px;margin-bottom:50px">ADMIN DASHBOARD</h1>

    <table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl ">
      <thead class="thead">
        <tr>
          <th scope="col">NAME</th>
          <th scope="col">SCHOOL ID</th>
          <th scope="col">EMAIL</th>
          <th scope="col">STATUS</th>
          <th scope="col">ACTION BUTTON</th>
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