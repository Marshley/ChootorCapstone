@extends('layout.app')

@section('content')
    
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
    #pbtn, #pbtn:active, #pbtn:visited, #pbtn:focus {
        border-color: #e27235;
        color: white;
        background-color: #e27235;
    }

    #pbtn:hover {
        background-color: #d35400;
        color: #ffffff;
        border-color: #d35400;  
    }
  </style>
  <br />

  <div class="container">
   <h1 align="center">RECORDS</h1><br />
   
   <div class="row">
    <div class="col-md-7" align="right">
     <h4></h4>
    </div>
    <div class="col-md-5" align="right">
     <a href="{{ url('dynamic_pdf/pdf') }}" class="btn " id="pbtn">PRINT</a>
    </div>
   </div>
   <br />
   <div class="table-responsive">
    <table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
     <thead class="thead">
      <tr>
       <th>TUTEE NAME</th>
       <th>TUTOR NAME</th>
       <th>STATUS</th>
       <th>SUBJECT</th>
       <th>TIME</th>
       <th>LOCATION</th>
       <th>RATE</th>
       <th>RATING</th>
       <th>COMMENT</th>
      </tr>
     </thead>
     <tbody>
     @foreach($records_data as $record)
      <tr>
       <td>{{$record->tutee->firstname}} {{$record->tutee->lastname}} {{$record->tutee->middleinitial}}</td>
       <td>{{$record->schedule->tutor->firstname}} {{$record->schedule->tutor->lastname}}</td>
       <td>{{$record->status}}</td>
       <td>{{$record->schedule->subject->name}} {{$record->subtopic}}</td>
       <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$record->schedule->start_time)->format('h:i A')}} to 
        {{\Carbon\Carbon::createFromFormat('H:i:s',$record->schedule->end_time)->format('h:i A')}} </td>
        <td>{{$record->schedule->location->name}}</td>
        <td>{{$record->schedule->tutor->rate}}/hr</td>
        @if ($record->rate != 'pending') 
            <td>{{$record->rate}}/5 </td>
            <td>{{$record->comment}}</td>
        @else
       <td></td>
       <td></td>
        @endif 
      </tr>
     @endforeach
     </tbody>
    </table>
   </div>
  </div>
@endsection
