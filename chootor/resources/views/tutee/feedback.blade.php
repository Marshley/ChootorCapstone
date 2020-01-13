@extends('layout.app')
@section('content')
<!-- Add icon library -->
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<style>
#ratebutton {
  border: none;
  outline: none;
  padding: 10px 16px;
  background-color: #d35400;
  cursor: pointer;
}
p {
  text-size: 10px;
}
/* Style the active class (and buttons on mouse-over) */
.active, #ratebutton:hover {
  background-color: #e27235;
  color: white;
}
</style>

<h1 class="text-center" style="margin-top:50px;margin-bottom:50px">FEEDBACK</h1> 
<div class="container">
  <div class="row">
    <div class="col-sm-6" >
      {{-- <p class="text-center">TO RATE</p> --}}
      @foreach($user->bookings as $history)
        @if($history->status == 'done')
          @if($history->rate == 'pending')          
      <div class="card mx-auto my-1 mb-5 justify-content-center shadow p-3 mb-5 bg-white rounded" style="height:auto; border-color:white">
        <div class="card-body justify-content-center">
          <div class="card-title justify-content-center text-center">
            @if($history->schedule->tutor->image)
              <img src="{{$history->schedule->tutor->image}}" class="img-responsive justify-content-center text-center" style="height:100px;width:100px" alt="profilepicture">
            @else
              <img src="../img/blank.png" class="img-responsive justify-content-center" style="height:100px;width:100px"  alt="profilepicture">
            @endif
            
          </div> 
          {{-- Button trigger modal  --}}
          <div class="col justify-content-center text-center">
            <button type="button" class="btn btn-dark  " id="ratebutton" data-toggle="modal" style="margin-top:30px;margin-bottom:10px" data-target="#exampleModal{{$history->id}}">
              RATE
            </button>
          </div>
          <div class="row justify-content-center"> 
            <div class="card-text col-lg-6">
              <br /> 
              <p class="text-left">Name: {{$history->schedule->tutor->firstname}} {{$history->schedule->tutor->lastname}} {{$history->schedule->tutor->middleinitial}}</p>
              <p class="text-left">School ID: {{$history->schedule->tutor->school_id}}</p>
              <p class="text-left">Subject: {{$history->schedule->subject->name}} {{$history->subtopic}}</p>
            </div>
            <div class="col-lg-5">
              <br /> 

              <p class="text-left">Day: {{$history->schedule->day}}</p>
              <p class="text-left">  
                {{\Carbon\Carbon::createFromFormat('H:i:s',$history->schedule->start_time)->format('h:i A')}} - 
                {{\Carbon\Carbon::createFromFormat('H:i:s',$history->schedule->end_time)->format('h:i A')}}
              </p>
              {{-- <h4>{{$history->rate}}</h4> --}}
              {{-- {!! str_repeat('<i class="far fa-smile" aria-hidden="true"></i>', $history->rate) !!}
              {!! str_repeat('<i class="fas fa-smile" aria-hidden="true"></i>', 5 - $history->rate) !!} --}}
              {{-- <h4>{{$history->comment}}</h4> --}}
            </div>
            
            
            
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
    @endif
    @endforeach
  </div>
  <div class="col-sm-6 justify-content-center" >
  {{-- <p class="text-center justify-content-center">HAS RATED</p> --}}
  @foreach($user->bookings as $history)
  {{-- @if($history->status == 'done') --}}
  @if($history->rate != 'pending')          
      <div class="card mx-auto my-1 mb-5 justify-content-center shadow p-3 mb-5 bg-white rounded" style=" border-color: #e27235; height: auto;">
        <div class="card-body justify-content-center">
          <div class="card-title justify-content-center text-center">
            @if($history->schedule->tutor->image)
            <img src="{{$history->schedule->tutor->image}}" class="img-responsive justify-content-center" style="height:100px;width:100px" alt="profilepicture">
            @else
            <img src="../img/blank.png" class="img-responsive" style="height:100px;width:100px"  alt="profilepicture">
            @endif
            
            
          </div> 
          <div class="row justify-content-center"> 
           
            <div class="card-text col-lg-6 text-left">
                <br /> 
                <p class="text-left">Name: {{$history->schedule->tutor->firstname}} {{$history->schedule->tutor->lastname}} {{$history->schedule->tutor->middleinitial}}</p>
                <p class="text-left">School ID: {{$history->schedule->tutor->school_id}}</p>
                <p class="text-left">Day {{$history->schedule->day}}</p>
                <p class="text-left">  Time 
                  {{\Carbon\Carbon::createFromFormat('H:i:s',$history->schedule->start_time)->format('h:i A')}} - 
                  {{\Carbon\Carbon::createFromFormat('H:i:s',$history->schedule->end_time)->format('h:i A')}}
                </p>
                <p class="text-left"> Subject: {{$history->schedule->subject->name}} {{$history->subtopic}}</p>
              </div>
              <div class="col-lg-5">
                </br>
                <p class="text-left"> Rate: {{$history->rate}}/5</p>
                {{-- {!! str_repeat('<i class="far fa-smile" aria-hidden="true"></i>', $history->rate) !!}
                {!! str_repeat('<i class="fas fa-smile" aria-hidden="true"></i>', 5 - $history->rate) !!} --}}
                <p class="text-left">Comment: {{$history->comment}}</p>
              </div>
            </div>
         
          </div>
        </div>
      @endif
    @endforeach
      
@endsection
      