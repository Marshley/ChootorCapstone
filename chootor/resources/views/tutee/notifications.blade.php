@extends('layout.app')
@section('content')
   @foreach ($user->notifications as $notification)
        <a class="notification" href="/booked">{{json_encode($notification->data, true)}}</a>
    @endforeach
@endsection