@extends("layouts/user_side_master")
@section("pagename", "Booking History")
@section("content")
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="mb-5 text-center">Booking History</h1>
            <div class="row g-4">
                @foreach($userBookings as $userBooking)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="card-body p-4">
                                <!-- Trip Details -->
                                <h5 class="card-title">{{ $userBooking->trip->name }}</h5>
                                <p class="card-text">
                                    <strong>Status:</strong>
                                    @if($userBooking->status == 'completed')
                                        <span class="badge bg-success">Confirmed</span>
                                    @elseif($userBooking->status == 'inprogress')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($userBooking->status == 'cancelled')
                                        <span class="badge bg-danger">Cancelled</span>
                                    @endif
                                </p>
                                <p class="card-text">
                                    <strong>Price:</strong> ${{ number_format($userBooking->trip->price, 2) }}
                                </p>
                                <p class="card-text">
                                    <strong>Booking Date:</strong> {{ $userBooking->created_at->format('d M Y') }}
                                </p>

                                <!-- Additional Information (optional) -->
                                <p class="card-text">
                                    <strong>Trip Date:</strong> {{ $userBooking->trip->created_at->format('y/m/d') }}
                                </p>
                            </div>
                            <div class="card-footer text-center">

                                <a href="{{route('trips.show' ,$userBooking->trip->id )}}" class="btn btn-primary">View Details</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
