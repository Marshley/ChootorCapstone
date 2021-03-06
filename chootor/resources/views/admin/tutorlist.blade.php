@extends('layout.app')

@section('content')
<style>
    .thead {
      /* background-color: #006D5B; */
      /* color: #ffffff; */
      color: #e27235;
    }
    .btn-primary, .btn-primary:active, .btn-primary:visited, .btn-primary:focus {
          border-color: #e27235;
          color: white;
          background-color: #e27235;
      }
  
      .btn-primary:hover {
          background-color: #fa935b;
          color: #ffffff;
          border-color: #fa935b;  
      }
  </style>
  <h1 class="text-center" style="margin-top:50px;margin-bottom:50px"> LIST OF TUTORS </h1>
  <table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl " style="margin-top:50px">
      <thead class="thead">
      <tr>
          <th scope="col">TUTOR NAME</th>
          <th scope="col">STATUS</th>
          <th scope="col">ACTION BUTTON</th>
      </tr>
      </thead>
        <tbody>
            @foreach ($tutors as $tutor)
            <tr>
                <td>{{$tutor->lastname}} {{$tutor->firstname}} {{$tutor->middleinitial}} </td>
                <td>{{$tutor->status}}</td>
                <td>
                    {{-- @foreach ($tutor->schedules as $schedule) --}}
                        {{-- {{$tutor->schedules->count()}} --}}
                    {{-- @endforeach  --}}
                   <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$tutor->id}}">
                    View 
                </button> 

                <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$tutor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">TUTOR PROFILE</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <div class="container">
                                      @if($tutor->image)
                                        <img src="{{$tutor->image}}" class="img-responsive" style="height:100px;width:100px" alt="profilepicture">
                                      @else
                                        <img src="../img/blank.png" class="img-responsive"style="height:100px;width:100px"  alt="profilepicture">
                                      @endif          
                                      <br/><br/>
                                      <p class="text-center">School ID: {{$tutor->school_id}} </p>
                                      <p class="text-center">Course: {{$tutor->course->course_name}} </p>
                                      <p class="text-center">Email: {{$tutor->email}} </p>
                                    </div>
                                </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>

@endsection