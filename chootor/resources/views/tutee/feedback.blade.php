@extends('layout.app')
@section('content')
<!-- Add icon library -->
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<style>
#ratebutton {
  border: none;
  outline: none;
  padding: 10px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
}

/* Style the active class (and buttons on mouse-over) */
.active, #ratebutton:hover {
  background-color: #666;
  color: white;
}
</style>
{{-- <h1 class="text-center" style="margin-top:50px;margin-bottom:50px">FEEDBACK</h1>  --}}
 
  @foreach($user->bookings as $history)
    @if($history->status == 'done')
      <div class="card">
        <div class="card-body">
          <div class="card-title">
         
            <img src="{{$history->schedule->tutor->image}}" class="img-responsive" alt="profilepicture">   
            <h2>{{$history->schedule->tutor->firstname}} {{$history->schedule->tutor->lastname}} {{$history->schedule->tutor->middleinitial}}</h2>
            
          </div> 
            <div class="row"> 
                <div class="card-text col-lg-12">
                  <br /> 
              <h3>{{$history->schedule->tutor->school_id}}</h3>
              <h4>{{$history->schedule->day}}</h4>
              <h4>
                  {{\Carbon\Carbon::createFromFormat('H:i:s',$history->schedule->start_time)->format('h:i A')}} - 
                  {{\Carbon\Carbon::createFromFormat('H:i:s',$history->schedule->end_time)->format('h:i A')}}
              </h4>
              <h4>{{$history->schedule->subject->name}} {{$history->subtopic}}</h4>
              {{-- <h4>{{$history->rate}}</h4> --}}
              {!! str_repeat('<i class="far fa-smile" aria-hidden="true"></i>', $history->rate) !!}
              {!! str_repeat('<i class="fas fa-smile" aria-hidden="true"></i>', 5 - $history->rate) !!}
              <h4>{{$history->comment}}</h4>
                </div>
                {{-- Button trigger modal  --}}
                <button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" style="margin-top:30px;margin-bottom:10px" data-target="#exampleModal{{$history->id}}">
                    RATE
                </button>
                    {{-- Modal --}}
                  <div class="modal fade" id="exampleModal{{$history->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">FEEDBACK</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body text-center">
                          <form method="post" action="/feedback/{{$history->id}}" >
                              {{ csrf_field() }} 
                              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    
                                    <label class="btn far fa-frown" for="rate" id="ratebutton">
                                        <input type="radio" name="rate" id="rate" value="1">
                                    </label>

                                    <label class="btn far fa-frown-open" for="rate" id="ratebutton">
                                        <input type="radio" name="rate" id="rate" value="2">
                                    </label>
                                    
                                    <label class="btn far fa-meh-o" for="rate" id="ratebutton">
                                        <input type="radio" name="rate" id="rate" value="3">
                                    </label>

                                    <label class="btn far fa-smile" for="rate" id="ratebutton">
                                        <input type="radio" name="rate" id="rate" value="4">
                                    </label>

                                    <label class="btn far fa-smile-beam" for="rate" id="ratebutton">
                                        <input type="radio" name="rate" id="rate" value="5">
                                    </label>

                                </div>
                                
                              <br/>
                              COMMENT: <input type="text" name="comment" id="comment" value="{{$history->comment}}">
                        </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>              
                              <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div> 
          @endif
    @endforeach
@endsection
