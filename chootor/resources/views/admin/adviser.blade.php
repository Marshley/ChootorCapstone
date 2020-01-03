@extends('layout.app')

@section('content')
<style>
  .thead {
      background-color: #d35400;
      color: #ffffff;
  }
  #cbtn {
    background-color: #ffffff;
    color: #d35400;
    border-color: #d35400;
  }
  #cbtn:hover {
    background-color: #d35400;
    color: #ffffff;
  }
  
  /* Ripple effect */
  .ripple {
    background-position: center;
    transition: background 1s;
  }

  .ripple:hover {
    background: #ffffff radial-gradient(circle, transparent 1%, #ffffff 1%) center/15000%;
  }

  .ripple:active {
    background-color: #6eb9f7;
    background-size: 100%;
    transition: background 1s;
  }

  .btn-search {
    /* background-image: linear-gradient(#1A2056, #d35400); */
    /* background-image: linear-gradient(#1A2056, #d35400); */
    background-color: #d35400;
  }

  .btn:hover {
    background-color: #ffffff;
  }

</style>
 
    <!-- <h1 class="text-center" style="margin-top:50px;margin-bottom:50px">ADVISER FORM</h1> -->
      
    <!-- Search form -->
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form class="form-inline md-form mr-auto mb-4">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-search btn-rounded btn-lg text-white" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>

@endsection