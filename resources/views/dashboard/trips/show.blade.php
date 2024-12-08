

@extends('layouts/user_side_master')
@section('pagename', 'Trip Details')
@section('login_active', 'active')
@section('content')
    <!-- Trip Details Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <!-- Trip Images -->
                <div class="col-lg-6">
                    <div id="tripCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($tripImages as $index => $tripImage)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset($tripImage->image) }}" class="d-block w-100 rounded" alt="Trip Image"
                                         style="height: 425px; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#tripCarousel"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#tripCarousel"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <!-- Trip Details -->
                <div class="col-lg-6">
                    <div class="bg-light p-4 rounded">
                        <h2 class="mb-3">{{ $trip->name }}</h2>
                        <div class="mb-4">
                            <span class="me-2"><strong>Start Date:</strong>
                                {{ date('Y/m/d', strtotime($trip->start_at)) }}</span><br>
                            <span class="me-2"><strong>End Date:</strong>
                                {{ date('Y/m/d', strtotime($trip->end_at)) }}</span>
                        </div>
                        <h5 class="mb-3">Description:</h5>
                        <p>{{ $trip->description }}</p>

                        <h5 class="mb-3">Guide Information:</h5>
                        <div class="row">
                            @foreach ($tripGuids as $guide)
                                <div class="col-md-6 mb-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset($guide->image) }}" class="img-fluid rounded-circle me-3"
                                             alt="Guide Image" style="width: 60px; height: 60px;">
                                        <div>
                                            <p class="mb-1"><strong>{{ $guide->name }}</strong></p>

                                            <small class="text-muted">{{ $guide->gender }}, {{ $guide->age }} years
                                                old</small>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    @guest
        @if (Route::has('login'))
            <a href="{{ route('login') }}" class="nav-item nav-link text-center">
                <span class="btn btn-primary btn-lg">Please Login to Book Trip</span>
            </a>
        @endif
    @else
        @include('include/user_side/booking')
    @endguest
    <!-- Trip Details End -->
    <!-- Feedback Section -->
    <div class="container-xxl py-5">
        <h3 class="mb-4">Feedback</h3>

        <!-- Display existing feedback -->
        @foreach($feedbacks as $feedback)
            <div class="bg-light p-4 mb-3 rounded shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        @if($feedback->user)
                            <img src="{{asset('storage/' .  $feedback->user->image) }}" alt="User Image" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                            <div>
                                <strong>{{ $feedback->user->name }}</strong> <br>
                                <small class="text-muted">{{ $feedback->created_at->format('Y-m-d') }}</small>
                            </div>
                        @else
                            <strong>Deleted User</strong>
                        @endif
                    </div>
                    <small class="text-muted">{{ $feedback->created_at->diffForHumans() }}</small>
                </div>
                <div class="mt-3">
                    <p class="mb-0">{{ $feedback->feedback }}</p>
                </div>
            </div>
        @endforeach

        <!-- Feedback Form -->
        @php
            $booking = Auth::check() ? \App\Models\Booking::where('user_id', Auth::id())->where('trip_id', $trip->id)->first() : null;
        @endphp

        @if($booking && $booking->accepted == 1)
            @auth
                <div class="bg-light p-4 mt-4 rounded shadow-sm">
                    <h4>Leave Your Feedback</h4>
                    <form action="{{ route('trips.storeFeedback', $trip->id) }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <textarea name="feedback" class="form-control" rows="4" placeholder="Write your feedback here..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Feedback</button>
                    </form>
                </div>
            @else
                <p>Please <a href="{{ route('login') }}">log in</a> to leave feedback.</p>
            @endauth
        @else
            <p>You can only leave feedback after your booking for this trip has been accepted.</p>
        @endif


    </div>


@endsection
