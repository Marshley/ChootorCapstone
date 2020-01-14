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
      <p class="text-center">TO RATE</p>
      @foreach($user->bookings as $history)
    @if($history->status == 'done')
      @if($history->rate == 'pending')          
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            @if($history->schedule->tutor->image)
              <img src="{{$history->schedule->tutor->image}}" class="img-responsive" style="height:100px;width:100px" alt="profilepicture">
            @else
              <img src="../img/blank.png" class="img-responsive" style="height:100px;width:100px"  alt="profilepicture">
            @endif
            
            <p>Name: {{$history->schedule->tutor->firstname}} {{$history->schedule->tutor->lastname}} {{$history->schedule->tutor->middleinitial}}</p>
        
          </div> 
          <div class="row"> 
          <div class="card-text col-lg-12">
            <br /> 
            <p>School ID: {{$history->schedule->tutor->school_id}}</p>
            <p>Day: {{$history->schedule->day}}</p>
            <p>  
              {{\Carbon\Carbon::createFromFormat('H:i:s',$history->schedule->start_time)->format('h:i A')}} - 
              {{\Carbon\Carbon::createFromFormat('H:i:s',$history->schedule->end_time)->format('h:i A')}}
            </p>
            <p>Subject: {{$history->schedule->subject->name}} {{$history->subtopic}}</p>
            {{-- <h4>{{$history->rate}}</h4> --}}
            {{-- {!! str_repeat('<i class="far fa-smile" aria-hidden="true"></i>', $history->rate) !!}
            {!! str_repeat('<i class="fas fa-smile" aria-hidden="true"></i>', 5 - $history->rate) !!} --}}
            {{-- <h4>{{$history->comment}}</h4> --}}
          </div>

          {{-- Button trigger modal  --}}
          <div class="col">
            <button type="button" class="btn btn-dark btn-block " id="ratebutton" data-toggle="modal" style="margin-top:30px;margin-bottom:10px" data-target="#exampleModal{{$history->id}}">
                RATE
            </button>
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

<div class="col-sm-6" >
  <p class="text-center">HAS RATED</p>
  @foreach($user->bookings as $history)
  {{-- @if($history->status == 'done') --}}
    @if($history->rate != 'pending')          
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            @if($history->schedule->tutor->image)
              <img src="{{$history->schedule->tutor->image}}" class="img-responsive" style="height:130px;width:130px" alt="profilepicture">
            @else
              <img src="../img/blank.png" class="img-responsive" style="height:130px;width:130px"  alt="profilepicture">
            @endif
            
            <h2 class="text-center">Name: {{$history->schedule->tutor->firstname}} {{$history->schedule->tutor->lastname}} {{$history->schedule->tutor->middleinitial}}</h2>
        
          </div> 
      <div class="row"> 
        <div class="card-text col-lg-12 text-center">
          <br /> 
          <h3 class="text-center">School ID: {{$history->schedule->tutor->school_id}}</h3>
          <h4 class="text-center">Day {{$history->schedule->day}}</h4>
          <h4 class="text-center">  Time 
            {{\Carbon\Carbon::createFromFormat('H:i:s',$history->schedule->start_time)->format('h:i A')}} - 
            {{\Carbon\Carbon::createFromFormat('H:i:s',$history->schedule->end_time)->format('h:i A')}}
          </h4>
          <h4 class="text-center"> Subject: {{$history->schedule->subject->name}} {{$history->subtopic}}</h4>
          <h4 class="text-center"> Rate: {{$history->rate}}/5</h4>
          {{-- {!! str_repeat('<i class="far fa-smile" aria-hidden="true"></i>', $history->rate) !!}
          {!! str_repeat('<i class="fas fa-smile" aria-hidden="true"></i>', 5 - $history->rate) !!} --}}
          <h4 class="text-center">Comment: {{$history->comment}}</h4>
        </div>
    @endif
  @endforeach
    </div>
  </div>
</div>
  
@endsection
