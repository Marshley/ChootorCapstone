@extends('layout.app')
@section('content')
<h1>TUTUEE</h1>
@foreach($user as $users)
        @if($users->user_type == 'tutor')
            @if($users->status == 'approved')
            <div class="card">
                <div class="card-body">
                <h3>{{ $users->id }}</h3>
                <h3>{{ $users->name }}</h3>
                <h3>{{ $users->school_id }}</h3>    
                <h3>{{ $users->email }}</h3>    
                {{-- <h3>{{ $users->userschedule->day }}</h3>  --}}
                </div>
            </div>
            @endif
        @endif
    @endforeach
@endsection
