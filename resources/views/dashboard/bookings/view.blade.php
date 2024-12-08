@extends('layouts.dashboard_master')

@section('headTitle', 'Bookings')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>{{ $booking->user->name }} Booking</h1>
            <p>
                <strong>Trip ID:</strong> {{ $booking->trip_id }}<br>
                <strong>Status:</strong> {{ $booking->status }}<br>
                <strong>Total Price:</strong> {{ $booking->trip->price }}
            </p>
            
            <a href="{{url('/booking')}}" class="btn btn-gradient-primary me-2">Back to list</a>
        </div>
    </div>

@endsection
