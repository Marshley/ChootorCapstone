@extends('layout.app')

@section('content')
<style>
  .thead {
      background-color: #ffffff;
      color: #d35400;
  }
  #cbtn {
    background-color: #e27235;
    color: #ffffff;
    /* border-color: #141945; */
  }
  #cbtn:hover {
    background-color: #d35400;
    color: #ffffff;
  }
  #cbtnn {
    background-color: #7f8c8d;
    color: #ffffff;
    /* border-color: #e27235; */
  }
  #cbtnn:hover {
    background-color: #bdc3c7;
    color: #ffffff;
  }
</style>
 
 @if(session('mesg'))
  <div class="alert alert-success" role="alert" > 
    {{ session('mesg') }}
  </div>
 @endif
 
 @if(session('messg'))
  <div class="alert alert-danger" role="alert" > 
    {{ session('messg') }}
  </div>
 @endif

    <h2 class="text-center" style="margin-top:50px;margin-bottom:50px">Rate</h2>
    
    @foreach ($rates as $rate)
    <div class="card text-center shadow p-2 mb-3" id="ccard">
    <form action="/editrate" method="POST">
        {{ csrf_field() }}    
        <div class="container">
          <label for="min_rate">SET MINIMUN RATE</label>
          <div class="form-row justify-content-center">
            <div class="form-group col-md-10 col-xs-10" style="margin-top:50px">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">₱</span>
                </div>

                <input type="number" class="form-control text-center" id="min_rate" name="min_rate" value="{{$rate->min_rate}}">
                
                <div class="input-group-append">
                  <span class="input-group-text">.00</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <label for="max_rate">SET MAXIMUM RATE</label>
          <div class="form-row justify-content-center">
            <div class="form-group col-md-10 col-xs-10" style="margin-top:50px">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">₱</span>
                </div>

                <input type="number" class="form-control text-center" id="max_rate" name="max_rate" value="{{$rate->max_rate}}">
                
                <div class="input-group-append">
                  <span class="input-group-text">.00</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="container">
          <div class="form-row">
            <div class="col-md-4 justify-content-center">
              
            </div>
            <div class="col-md-4 justify-content-center" >
              <button id="homebtn" type="submit" class="btn btn-outline-dark btn-block" style="margin-top:30px;margin-bottom:10px">SAVE</button>
            </div>
            <div class="col-md-4 justify-content-center">
              
            </div>
          </div>
        </div>
        
      </form>
      @endforeach
    </div>

@endsection