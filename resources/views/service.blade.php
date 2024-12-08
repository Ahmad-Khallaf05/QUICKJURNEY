@extends("layouts/user_side_master")
@section("pagename", "Our services")
@section("hero", "Discover Tailored Adventures That Transform Your Travel Dreams Into Reality")

@section("content")
    <!-- Categories Carousel Start -->
    <style>
        .category-image {
            width: 60px; /* Fixed width */
            height: 60px; /* Fixed height */
            object-fit: cover; /* Ensures image covers the area */
        }

        .package-item img {
            width: 100%; /* Full width for the image */
            height: 200px; /* Fixed height for the image */
            object-fit: cover; /* Ensures image covers the area */
        }
    </style>

    <div class="container-xxl py-5">
        <div class="container">
        <div class="text-center wow fadeInUp mb-5" data-wow-delay="0.1s">
            <h2 class="section-title bg-white text-center text-primary px-3">Categories</h2>
</div>
            <div id="categoriesCarousel" class="carousel slide">
                <div class="carousel-inner">
                    @foreach($categories->chunk(20) as $chunk)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row">
                                @foreach($chunk as $category)
                                    <div class="col-md-3 mb-3">
                                        <div class="d-flex align-items-center border rounded p-3">
                                            <img src="{{ asset($category->image) }}" class="img-fluid rounded-circle me-3 category-image" alt="Category Image">

                                            <form action="{{ route('service.show') }}" method="GET" style="display:inline-block">
                                                <input type="hidden" value="{{$category->id}}" name="cat_id">
                                                <button type="submit" style="border: none; background-color: transparent;">
                                                    <div>
                                                        <p class="mb-1"><strong>{{ $category->name }}</strong></p>
                                                    </div>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
               
            </div>
        </div>
    </div>
    <!-- Categories Carousel End -->

    <!-- Filter Form Start -->
{{--    <div class="container-xxl py-5">--}}
{{--        <div class="container">--}}
{{--            <form action="{{ route('service.show' , 3) }}" method="GET" class="mb-4">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-3 mb-3">--}}
{{--                        <input type="text" name="location" class="form-control" placeholder="Location" value="{{ request()->get('location') }}">--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3 mb-3">--}}
{{--                        <input type="date" name="start_date" class="form-control" placeholder="Start Date" value="{{ request()->get('start_date') }}">--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3 mb-3">--}}
{{--                        <input type="date" name="end_date" class="form-control" placeholder="End Date" value="{{ request()->get('end_date') }}">--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3 mb-3">--}}
{{--                        <input type="number" name="max_price" class="form-control" placeholder="Max Price" value="{{ request()->get('max_price') }}">--}}
{{--                    </div>--}}
{{--                    <div class="col-md-12">--}}
{{--                        <button type="submit" class="btn btn-primary">Apply Filters</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Filter Form End -->

    <!-- Trips Section Start -->
    <div class="container-xxl py-5" style="margin-top: -40px">
        <!-- Filter Form Start -->

        <div class="container-xxl py-5">
                        <div class="text-center mb-4">
                            <h1 class="mb-5"><span class="text-primary">{{ isset($cat_name) && $cat_name->name ? $cat_name->name : 'All ' }}</span> trips</h1>
                        </div>
            <div class="container">

                <form action="{{ route('service.show') }}" method="GET" class="mb-4">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <input type="text" name="location" class="form-control" placeholder="Location" value="{{ request()->get('location') }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="date" name="start_date" class="form-control" placeholder="Start Date" value="{{ request()->get('start_date') }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="date" name="end_date" class="form-control" placeholder="End Date" value="{{ request()->get('end_date') }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="number" name="max_price" class="form-control" placeholder="Max Price" value="{{ request()->get('max_price') }}">
                        </div>
                        <div class="col-md-12">
                            <div class="text-center mb-0 mt-20">
                                <button type="submit" class="btn btn-primary ">Apply Filters</button>
                            </div>
{{--                            <button type="submit" class="btn btn-primary ">Apply Filters</button>--}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container"  style="margin-top: -40px">

            <div class="row g-4">
                @foreach($trips as $trip)
                    <div class="col-lg-4 col-md-6">
                        <div class="package-item">
                            <a href="{{ route('trips.showBooking', $trip->id) }}">
                                <div class="overflow-hidden">
                                    <!-- Correctly fetch the first image from the trip_images relationship -->
                                    @php
                                        $firstImage = $trip->trip_images->first();
                                    @endphp
                                    <img class="img-fluid" src="{{ asset($firstImage ? $firstImage->image : 'default-trip.jpg') }}" alt="Trip Image">
                                </div>
                            </a>
                            <div class="d-flex border-bottom">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $trip->location }}</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>{{ $trip->start_at }} - {{ $trip->end_at }}</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{ $trip->capacity }} capacity</small>
                            </div>
                            <div class="text-center p-4">
                                <h3 class="mb-0">${{ $trip->price }}</h3>
                                <div class="mb-3">
                                    @for ($i = 0; $i < 5; $i++)
                                        <small class="fa fa-star {{ $i < $trip->rating ? 'text-primary' : 'text-muted' }}"></small>
                                    @endfor
                                </div>
                                <p>{{ $trip->description }}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="{{ route('trips.showBooking', $trip->id) }}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                    <a href="{{ route('trips.showBooking', $trip->id) }}" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Trips Section End -->
@endsection
