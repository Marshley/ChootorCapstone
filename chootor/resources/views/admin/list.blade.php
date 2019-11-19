@extends('layout.app')

@section('content')
  <style>
    .thead {
      background-color: #141945;
      color: #ffffff;
    }
  </style>

    <h1 class="text-center" style="margin-top:50px;margin-bottom:50px">LIST</h1>

    <table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl ">
      <thead class="thead">
        <tr>
          <th scope="col">Tutee Name</th>
          <th scope="col">Subject</th>
          <th scope="col">Tutor Name</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach ($lists as $list)
            @if ($list->status == 'approved')
              <tr>
                <td>{{$list->tutee->firstname}} {{$list->tutee->lastname}} {{$list->tutee->middleinitial}}</td>
                <td>{{$list->schedule->subject->name}}</td>      
                <td>{{$list->schedule->tutor->firstname}} {{$list->schedule->tutor->lastname}}</td>      
              </tr>        
            @endif
          @endforeach
        </tr>
      </tbody>
    </table>
@endsection