@extends('layout.app')
@section('content')
    

{{-- <!DOCTYPE html>
<html>
 <head> --}}
  {{-- <title>Laravel - How to Generate Dynamic PDF from HTML using DomPDF</title> --}}
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
   .thead {
      /* background-color: #006D5B; */
      /* color: #ffffff; */
      color: #d35400;
    }
    .btn-primary, .btn-primary:active, .btn-primary:visited, .btn-primary:focus {
        border-color: #fa935b;
        color: white;
        background-color: #fa935b;
    }

    .btn-primary:hover {
        background-color: #e27235;
        color: #ffffff;
        border-color: #e27235;  
    }
  </style>
 {{-- </head> --}}
 {{-- <body> --}}
  <br />
  <div class="container">
   <h1 align="center">LIST OF TUTORS</h1><br />
   
   <div class="row">
    <div class="col-md-7" align="center">
     <h4></h4>
    </div>
    <div class="col-md-5" align="right">
     <a href="{{ url('tutor_dynamic_pdf/pdf') }}" class="btn btn-primary">PRINT</a>
    </div>
   </div>
   <br />
   <div class="table-responsive">
    <table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
     <thead class="thead">
      <tr>
       <th>LAST NAME</th>
       <th>FIRST NAME</th>
       <th>MI</th>
       <th>COURSE</th>
       <th>EMAIL</th>
       <th>RATE</th>
      </tr>
     </thead>
     <tbody>
     @foreach($tutor_data as $tutor)
      <tr>
       <td>{{ $tutor->lastname }}</td>
       <td>{{ $tutor->firstname }}</td>
       <td>{{ $tutor->middleinitial }}</td>
       <td>{{ $tutor->course->course_name}}</td>
       <td>{{ $tutor->email }}</td>       
       <td>{{ $tutor->rate }}</td>   
      </tr>
     @endforeach
     </tbody>
    </table>
   </div>
  </div>
 {{-- </body>
</html> --}}
@endsection