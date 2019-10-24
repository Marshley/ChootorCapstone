@extends('layout.app')
@section('content')
<h1> REQUESTS </h1>
@foreach ($bookings as $booking)
    {{$booking->id}}
@endforeach
@endsection
