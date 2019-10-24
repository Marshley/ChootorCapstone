@extends('layout.app')
@section('content')
<h1>TUTUEE</h1>
@foreach ($tutor_list as $tutor)
    <div class="card">
        <div class="card-body">
            <div class="card-title">       
                {{$tutor->name}}
            </div>
            <div class="card-text">
                schoolid  {{$tutor->school_id}} <br />
                rate{{$tutor->rate}} <br />
                subject 
                    @foreach ($tutor->schedules as $sched)
                        {{$sched->subject->name}}, 
                    @endforeach
                <br /> location
                {{-- {{$tutor->schedules[0]->location->name}},  --}}
            </div>
        </div>
    </div>
    {{-- @foreach ( $tutor->schedules as $sched)
        {{$sched->day}}
    @endforeach
    {{$sched->subject->name}} --}}
    {{-- {{$tutor->schedules}} --}}
@endforeach


{{-- @foreach($user as $users)
        @if($users->user_type == 'tutor')
            @if($users->status == 'approved')
            <div class="card">
                <div class="card-body">
                <h3>{{ $users->id }}</h3>
                <h3>{{ $users->name }}</h3>
                <h3>{{ $users->school_id }}</h3>    
                <h3>{{ $users->email }}</h3>    
                <h3>{{ $users->userschedule->day }}</h3> 
                </div>
            </div>
            @endif
        @endif
    @endforeach --}}
@endsection
