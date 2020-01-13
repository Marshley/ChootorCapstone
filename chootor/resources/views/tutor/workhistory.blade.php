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
 <h1 class="text-center" style="margin-top:50px;margin-bottom:50px">WORK HISTORY</h1> 

            @foreach ($user->schedules as $sessiondone)
                @if ($sessiondone->booking)
                    @if ($sessiondone->booking->status == 'done')
                    
                    <div class="card mx-auto" id="ccard" style="margin-top:50px">
                        <div class="card-body">
                            <div class="card-title">                       
                                <div class="row">
                                    <div class="col-3 text-center">
                                        @if($sessiondone->booking->tutee->image)
                                        <img src="{{$sessiondone->booking->tutee->image}}" id="profile-img" class="img-responsive" alt="profile picture"> 
                                        @else
                                        <img src="../img/blank.png" class="img-responsive" id="profile-img" alt="profilepicture">
                                        @endif
                                    </div>
                                    <div class="col-4">
                                    Tutee:
                                        <div class="font-weight-bold">
                                        {{$sessiondone->booking->tutee->firstname}} {{$sessiondone->booking->tutee->lastname}}
                                        </div>
                                        </br>
                                    Schedule:
                                        <div class="font-weight-bold">
                                        {{$sessiondone->day}}
                                        
                                        {{\Carbon\Carbon::createFromFormat('H:i:s',$sessiondone->start_time)->format('h:i A')}}
                                            to 
                                        {{\Carbon\Carbon::createFromFormat('H:i:s',$sessiondone->end_time)->format('h:i A')}}
                                        </div>
                                    </div>
                                    <div class="col-4">
                                    Subject:
                                        <div class="font-weight-bold">
                                        {{$sessiondone->booking->schedule->subject->name}} 
                                        </div>
                                    </br>
                                           
                                    Rate:
                                        <div class="font-weight-bold">
                                            @if($sessiondone->booking->rate != 'pending')
                                                {{$sessiondone->booking->rate}}/5
                                            @elseif($sessiondone->booking->rate = 'pending')
                                                NO RATINGS YET!
                                            @endif
                                        {{-- {!! str_repeat('<i class="far fa-smile" aria-hidden="true"></i>', $sessiondone->booking->rate) !!}
                                        {!! str_repeat('<i class="fas fa-smile" aria-hidden="true"></i>', 5 - $sessiondone->booking->rate) !!} --}}
                                        {{-- {{$sessiondone->booking->comment}}  --}}
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endif
                @endif
            @endforeach
@endsection
