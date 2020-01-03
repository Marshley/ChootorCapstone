@extends('layout.app')

@section('content')
  <style>
    .thead {
      /* background-color: #fa935b; */
      /* color: #ffffff; */
      color: #d35400;

    }
  </style>

    <!-- <h1 class="text-center" style="margin-top:50px;margin-bottom:50px">LIST</h1> -->

    <table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl ">
      <thead class="thead">
        <tr>
          <th scope="col">TUTEE NAME</th>
          <th scope="col">SUBJECT</th>
          <th scope="col">TUTOR NAME</th>
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