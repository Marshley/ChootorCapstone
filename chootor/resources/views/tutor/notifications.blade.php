@extends('layout.app')
@section('content')
   @foreach ($user->notifications as $notification)
        <a class="notification" href="/request">{{json_encode($notification->data, true)}}</a>
    @endforeach
@endsection