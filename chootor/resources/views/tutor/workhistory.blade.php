@extends('layout.app')
@section('content')
<!-- Add icon library -->
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<h1 class="text-center" style="margin-top:50px;margin-bottom:50px">WORK HISTORY</h1>

<div class="card">
    <div class="card-body">
      <div class="card-title">
           
            @foreach ($user->schedules as $sessiondone)
                @if ($sessiondone->booking)
                    @if ($sessiondone->booking->status == 'done')
                        <img src="{{$sessiondone->booking->tutee->image}}" alt="profile picture">
                        {{$sessiondone->booking->tutee->firstname}} {{$sessiondone->booking->tutee->lastname}}
                        {{\Carbon\Carbon::createFromFormat('H:i:s',$sessiondone->start_time)->format('h:i A')}}
                            to 
                            {{\Carbon\Carbon::createFromFormat('H:i:s',$sessiondone->end_time)->format('h:i A')}}
                        {{$sessiondone->day}}
                        {{$sessiondone->booking->rate}}
                        {!! str_repeat('<i class="far fa-smile" aria-hidden="true"></i>', $sessiondone->booking->rate) !!}
                        {!! str_repeat('<i class="fas fa-smile" aria-hidden="true"></i>', 5 - $sessiondone->booking->rate) !!}
                        {{$sessiondone->booking->comment}}
                    @endif
                @endif
            @endforeach
      </div>
    </div>
</div>
@endsection
