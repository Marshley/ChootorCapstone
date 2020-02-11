@extends('layout.app')
@section('content')
<!-- Add icon library -->
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
    #ccard {
        border-color: #e27235;
        color: #141945;
        /* width: 500px; */
        height: auto;
    }
    #profile-img {
        height: 130px;
        width: 130px;
    }
</style>
 <h1 class="text-center" style="margin-top:50px;margin-bottom:50px">REPORTED TUTEES</h1> 

            @foreach ($reports as $report)
                    
                    <div class="card mx-auto" id="ccard" style="margin-top:50px">
                        <div class="card-body">
                            <div class="card-title">                       
                                <div class="row">
                                    {{-- <div class="col-3 text-center">
                                        @if($sessiondone->booking->tutee->image)
                                        <img src="{{$sessiondone->booking->tutee->image}}" id="profile-img" class="img-responsive" alt="profile picture"> 
                                        @else
                                        <img src="../img/blank.png" class="img-responsive" id="profile-img" alt="profilepicture">
                                        @endif
                                    </div> --}}
                                    <div class="col-4">
                                        Reported by Tutor:
                                        <div class="font-weight-bold">
                                            {{$report->booked->schedule->tutor->firstname}} 
                                            {{$report->booked->schedule->tutor->lastname}} 
                                        </div>
                                    </br>
                                    Tutee:
                                        <div class="font-weight-bold">
                                            {{$report->booked->tutee->firstname}}
                                            {{$report->booked->tutee->lastname}}
                                        </div>
                                    <br/>
                                    Incident Report:
                                        <div class="font-weight-bold">
                                            {{$report->description}}
                                        </div>
                                    </div>
                                    <div class="col-4">
                                    Schedule:
                                    <div class="font-weight-bold">
                                    {{$report->booked->schedule->day}}
                                    
                                    {{\Carbon\Carbon::createFromFormat('H:i:s',$report->booked->schedule->start_time)->format('h:i A')}}
                                        to 
                                    {{\Carbon\Carbon::createFromFormat('H:i:s',$report->booked->schedule->end_time)->format('h:i A')}}
                                    </div>
                                    <br/>
                                    Subject:
                                        <div class="font-weight-bold">
                                        {{$report->booked->schedule->subject->name}} 
                                        {{$report->booked->subtopic}}
                                        </div>
                                    </br>
                                    <div>
                                        Materials: 
                                        <div class="font-weight-bold">
                                            {{$report->booked->schedule->materials}}
                                        </div>
                                    </div>
                                    <br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
@endsection
