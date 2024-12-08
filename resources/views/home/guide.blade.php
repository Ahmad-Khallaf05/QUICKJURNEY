@extends("layouts/user_side_master")
@section("pagename", "Guide Profile")
@section("content")
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3 d-inline-block">Travel Guide</h6>
            <h1 class="mb-5">Guide Profile</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <!-- Profile Section -->
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="profile-item d-flex flex-column align-items-center text-center p-4 shadow rounded bg-light">
                    <div class="profile-img overflow-hidden rounded-circle mb-4" style="width: 200px; height: 200px; border: 5px solid #007BFF;">
                        <img class="img-fluid" src="{{ asset($guide->image) }}" alt="{{ $guide->name }}">
                    </div>
                    <h2 class="mb-3">{{ $guide->name }}</h2>
                    <p>
                        <span class="rating-display">
                        Average Rating:
                            {{ number_format($guide->ratings->avg('rate') ?? 0, 1) }}
                            /5<span style="color: gold;">★</span>
                        </span>
                    </p>
                </div>
            </div>

            <!-- Guide Info Section -->
            <div class="col-md-8 mt-5">
                <div class="guide-info p-4 bg-light rounded shadow">
                    <h3>About {{ $guide->name }}</h3>
                    <p class="text-muted">Gender: {{ $guide->gender }}</p>
                    <p class="text-muted">Age: {{ $guide->age }}</p>
                    <p class="text-muted">Description: <br> {{ $guide->description }}</p>

                    @auth
                    <!-- Rating Form -->
                    <form action="{{ route('guides.rate', $guide->id) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-3">
                            <h4 for="rate" class="form-label">Rate this guide:</h4>
                            <div class="star-rating d-flex justify-content-center mb-3">
                                @for($i = 5; $i >= 1; $i--)
                                    <input type="radio" id="star{{ $i }}" name="rate" value="{{ $i }}" class="d-none"/>
                                    <label for="star{{ $i }}" class="star" style="font-size: 30px; color: lightgray;">★</label>
                                @endfor
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill">Submit Rating</button>
                        </div>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Additional Custom CSS -->
<style>
    /* Star Rating Styling */
    .star-rating label {
        cursor: pointer;
        transition: color 0.3s;
    }

    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: gold !important;
    }

    .star-rating input {
        display: none;
    }

    /* Profile Section Styling */
    .profile-item {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Button Styling */
    .btn-primary {
        background-color: #86b817;
        border-color: #86b817;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary:hover {
        background-color:#86b817;
        border-color:#86b817;
    }
</style>
@endsection
