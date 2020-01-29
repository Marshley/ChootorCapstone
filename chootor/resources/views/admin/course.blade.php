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
    /* border-color: #e27235; */
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
 
      
      <!-- Modal Add Course-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/addcourse" >
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="course_name">Course Name:</label>
                        <input type="text" class="form-control" id="course_name" name="course_name">
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="cbtnn" data-dismiss="modal">Close</button>
              
                <button style="cursor:pointer" id="cbtn" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Edit Course-->
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modify Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="/addsubject" >
                      <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cbtnn" data-dismiss="modal">Close</button>              
                    <button style="cursor:pointer" id="cbtn" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

<table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl ">
    <thead class="thead">
    <tr>
        <th scope="col">#</th>
        <th scope="col">COURSE NAME</th>
        <th scope="col"> <!-- Button trigger modal --> <button type="button" id="cbtn" class="btn btn-sm m-0" data-toggle="modal" data-target="#exampleModal">Add Course</button></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
        <tr>
            <td>{{$course->id}}</td>
            <td>{{$course->course_name}}</td>
            <td><!-- Button trigger modal --><button type="button" id="cbtn" class="btn btn-sm m-0" data-toggle="modal" data-target="#editModal">Edit</button></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection