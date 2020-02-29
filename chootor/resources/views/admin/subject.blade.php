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
    /* border-color: #d35400; */
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

    <h2 class="text-center" style="margin-top:50px;margin-bottom:50px">SUBJECT</h2>
<!-- Button trigger modal -->
<!-- <button type="button" id="cbtn" class="btn btn-primary btn-block" data-toggle="modal" style="margin-bottom:20px" data-target="#exampleModal">
        Add Subject
      </button> -->
      
      <!-- Modal Add Subject-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="/addsubject" >
                 {{ csrf_field() }}
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" id="cbtnn" data-dismiss="modal">Close</button>              
              <button style="cursor:pointer" id="cbtn" type="submit" class="btn">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>

<table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
    <thead class="thead">
    <tr>
        <th scope="col">#</th>
        <th scope="col">SUBJECT NAME</th>
        <th scope="col"><!-- Button trigger modal --><button type="button" id="cbtn" class="btn btn-sm m-0" data-toggle="modal" data-target="#exampleModal">Add Subject</button></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($subject as $subjects)
        <tr>
            <td>{{$subjects->id}}</td>
            <td>{{$subjects->name}}</td>
            <td>
              <!-- Button trigger modal -->
              <button type="button" data-toggle="modal" id="cbtn" class="btn btn-sm m-0" data-target="#exampleModal{{$subjects->id}}">
                Edit 
              </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$subjects->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Subject</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form method="post" action="/editsubject/{{$subjects->id}}" >
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$subjects->name}}">
                            </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="cbtnn" class="btn" data-dismiss="modal">Close</button>
                      
                        <button style="cursor:pointer" id="cbtn" type="submit" class="btn">Submit</button>
                        </form>
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