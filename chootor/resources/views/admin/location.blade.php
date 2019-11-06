@extends('layout.app')

@section('content')
 
    <h2>Location</h2>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Location
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
                <form method="post" action="/addlocation" >
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
                <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
      </div>

<table class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl ">
  <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Location Name</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($location as $locations)
        <tr>
            <td>{{$locations->id}}</td>
            <td>{{$locations->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection