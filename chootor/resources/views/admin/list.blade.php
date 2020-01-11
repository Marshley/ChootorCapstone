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

    <h1 class="text-center" style="margin-top:50px;margin-bottom:50px">RECORDS</h1> 

    <table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl ">
      <thead class="thead">
        <tr>
          <th scope="col">TUTEE NAME</th>
          <th scope="col">TUTOR NAME</th>
          <th scope="col">STATUS</th>
          <th scope="col">ACTION BUTTON</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach ($lists as $list)
            {{-- @if ($list->status == 'approved') --}}
              <tr>
                <td>{{$list->tutee->firstname}} {{$list->tutee->lastname}} {{$list->tutee->middleinitial}}</td>
                  <td>{{$list->schedule->tutor->firstname}} {{$list->schedule->tutor->lastname}}</td> 
                  <td>{{$list->status}}</td>
                <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$list->id}}">
                    View 
                </button> 

                <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">DETAILS</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <div class="container">
                                      <p class="text-center"> SUBJECT: {{$list->schedule->subject->name}} 
                                        {{$list->subtopic}} </p>
                                      <p class="text-center">TIME: {{\Carbon\Carbon::createFromFormat('H:i:s',$list->schedule->start_time)->format('h:i A')}} to 
                                        {{\Carbon\Carbon::createFromFormat('H:i:s',$list->schedule->end_time)->format('h:i A')}} </p>
                                        <p class="text-center">LOCATION: {{$list->schedule->location->name}} </p>
                                        <p class="text-center">RATE: {{$list->schedule->tutor->rate}}/hr </p>
                                        @if ($list->rate != 'pending') 
                                        <p class="text-center">RATING: {{$list->rate}}/5 </p>   
                                        <p class="text-center">COMMENT: {{$list->comment}} </p> 
                                        @endif  
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
            {{-- @endif --}}
          @endforeach
        </tr>
      </tbody>
    </table>
@endsection