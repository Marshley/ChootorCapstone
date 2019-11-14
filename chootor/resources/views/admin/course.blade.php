@extends('layout.app')

@section('content')
<style>
  .thead {
      background-color: #141945;
      color: #ffffff;
  }
  #cbtn {
    background-color: #ffffff;
    color: #141945;
    border-color: #141945;
  }
  #cbtn:hover {
    background-color: #141945;
    color: #ffffff;
  }
</style>
 
    <h2 class="text-center" style="margin-top:50px;margin-bottom:50px">SUBJECT</h2>
<!-- Button trigger modal -->
<button type="button" id="cbtn" class="btn btn-primary btn-block" data-toggle="modal" style="margin-bottom:20px" data-target="#exampleModal">
        Add Course
      </button>
      
      <!-- Modal -->
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
              <button type="button" class="btn btn-secondary" id="cbtn" data-dismiss="modal">Close</button>
              
                <button style="cursor:pointer" id="cbtn" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
      </div>

<table class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl ">
    <thead class="thead">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Course Name</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
        <tr>
            <td>{{$course->id}}</td>
            <td>{{$course->course_name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection