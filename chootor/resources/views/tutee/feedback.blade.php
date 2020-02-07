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
  color: white;
}
#stars {
  border: none;
  outline: none;
  padding: 10px 16px;
  background-color: #ffffff;
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

/* .rating {
  unicode-bidi: bidi-override;
  direction: rtl;
}
.rating > span {
  display: inline-block;
  position: relative;
  width: 1.1em;
  color: black;
}
.rating > span:hover:before,
.rating > span:hover ~ span:before {
   content: "\2605";
   position: absolute;
   color: #ffae42 ;
} */

.fa-star {
  color: #ffae42;
}



    .starrating > input {
      display: none;
    }  /* Remove radio buttons */

    .starrating > label:before {
      content: "\f005"; /* Star */
      margin: 2px;
      font-size: 4em;
      font-family: FontAwesome;
      display: inline-block; 
    }

    .starrating > label {
      color: #222222; /* Start color when not clicked */
    }

    .starrating > input:checked ~ label {
      color: #ffca08 ; 
    } /* Set yellow color when star checked */

    .starrating > input:hover ~ label {
      color: #ffca08 ;  
    } /* Set yellow color when star hover */

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
              @if($history->schedule->tutor->expertise)
                <p>Expertise: 
                  @foreach (json_decode($history->schedule->tutor->expertise) as $exp)
                    {{$exp}}, 
                  @endforeach
                </p>
              @endif
              <p class="text-left">Subject: {{$history->schedule->subject->name}} {{$history->subtopic}}</p>
            </div>
            <div class="col-lg-5">
              <br /> 
              
              <p class="text-left">Day and Time: {{$history->schedule->day}}</p>
              <p class="text-left"> 
                {{\Carbon\Carbon::createFromFormat('H:i:s',$history->schedule->start_time)->format('h:i A')}} - 
                {{\Carbon\Carbon::createFromFormat('H:i:s',$history->schedule->end_time)->format('h:i A')}}
              </p>
              <p class="text-left">Materials: {{$history->schedule->materials}}</p>
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
                  <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                    <input type="radio" id="star5" for="rate" name="rate" value="5" />
                    <label for="star5" title="5 star"></label> {{-- may mag lalabas na label sa kung aling star na hinover nya--}}
                    <input type="radio" id="star4" for="rate" name="rate" value="4" />
                    <label for="star4" title="4 star"></label> {{-- may mag lalabas na label sa kung aling star na hinover nya--}}
                    <input type="radio" id="star3" for="rate" name="rate" value="3" />
                    <label for="star3" title="3 star"></label> {{-- may mag lalabas na label sa kung aling star na hinover nya--}}
                    <input type="radio" id="star2" for="rate" name="rate" value="2" />
                    <label for="star2" title="2 star"></label> {{-- may mag lalabas na label sa kung aling star na hinover nya--}}
                    <input type="radio" id="star1" for="rate" name="rate" value="1" />
                    <label for="star1" title="1 star"></label> {{-- may mag lalabas na label sa kung aling star na hinover nya--}}
                </div>

                  {{-- <div class="rating btn-group-toggle" data-toggle="buttons" >
                    <span class="btn btn-lg" for="rate" id="stars">☆
                      <input type="radio" name="rate" id="rate" value="5">
                    </span>
                    <span class="btn btn-lg" for="rate" id="stars">☆
                      <input type="radio" name="rate" id="rate" value="4">
                    </span>
                    <span class="btn btn-lg" for="rate" id="stars">☆
                      <input type="radio" name="rate" id="rate" value="3">
                    </span>
                    <span class="btn btn-lg" for="rate" id="stars">☆
                      <input type="radio" name="rate" id="rate" value="2">
                    </span>
                    <span class="btn btn-lg" for="rate" id="stars">☆
                      <input type="radio" name="rate" id="rate" value="1">
                    </span>
                  </div> --}}

                  {{-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn fas fa-star" for="rate" id="ratebutton">
                        <input type="radio" name="rate" id="rate" value="1">
                    </label>

                    <label class="btn fas fa-star" for="rate" id="ratebutton">
                        <input type="radio" name="rate" id="rate" value="2">
                      </label>
                    
                      <label class="btn fas fa-star" for="rate" id="ratebutton">
                        <input type="radio" name="rate" id="rate" value="3">
                      </label>
                      
                      <label class="btn fas fa-star" for="rate" id="ratebutton">
                        <input type="radio" name="rate" id="rate" value="4">
                      </label>
                      
                      <label class="btn fas fa-star" for="rate" id="ratebutton">
                        <input type="radio" name="rate" id="rate" value="5">
                      </label> --}}
                      
                    {{-- </div> --}}
                    <br/>
                    <br/>
                    <div class="form-group ">
                      <div class="row">
                        <div class="col-1">
                        
                        </div>
                        <div class="col-10">
                          <label>How was your experience?</label>
                        <br/>
                        <br/>
                          <input class="typehead form-control" type="text" name="comment" id="comment" value="{{$history->comment}}">              
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>              
                    <button style="cursor:pointer" type="submit" id="ratebutton" class="btn">Submit</button>
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
                @if($history->schedule->tutor->expertise)
                  <p>Expertise: 
                    @foreach (json_decode($history->schedule->tutor->expertise) as $exp)
                      {{$exp}}, 
                    @endforeach
                  </p>
                @endif
                <p class="text-left"> Subject: {{$history->schedule->subject->name}} {{$history->subtopic}}</p>
                <p class="text-left"> Materials: {{$history->schedule->materials}}</p>
                <p class="text-left">Day and Time: {{$history->schedule->day}}</p>
                <p class="text-left">  
                  {{\Carbon\Carbon::createFromFormat('H:i:s',$history->schedule->start_time)->format('h:i A')}} - 
                  {{\Carbon\Carbon::createFromFormat('H:i:s',$history->schedule->end_time)->format('h:i A')}}
                </p>
              </div>
              <div class="col-lg-5">
                </br>
                <p class="text-left"> RATING:

                <div class="placeholder" style="color: lightgray;">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <span class="small">({{ $history->rate }})</span>
              </div>
              <div class="overlay" style="position: relative;top: -22px;">
            
                @while($history->rate>0)
                    @if($history->rate >0.5)
                        <i class="fas fa-star"></i>
                    @else
                        <i class="fas fa-star-half"></i>
                    @endif
                    @php $history->rate--; @endphp
                @endwhile
    
            </div> 
                </p>
                <p class="text-left">Comment: {{$history->comment}}</p>
              </div>
            </div>
         
          </div>
        </div>
      @endif
    @endforeach
@endsection
      