@extends('layouts.dashboard_master')

@section('headTitle', 'Bookings')

@section('content')
    <div class="card">
        <div class="card-body">
            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @elseif (Session::get('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('booking.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="inprogress" {{ $booking->status == 'inprogress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-outline-info">Update</button>
                <a href="{{ url('/booking') }}" class="btn btn-outline-secondary">Cancel</a>
            </form>

            <h2 class="mt-4">{{ $booking->user->name }}'s Booking</h2>
            <p>
                <strong>Trip ID:</strong> {{ $booking->trip_id }}<br>
                <strong>Status:</strong> {{ ucfirst($booking->status) }}<br>
                <strong>Total Price:</strong> {{ number_format($booking->trip->price, 2) }}
            </p>
        </div>
    </div>
@endsection
