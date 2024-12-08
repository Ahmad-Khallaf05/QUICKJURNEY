<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Packages</h6>
            <h1 class="mb-5">Awesome Packages</h1>
        </div>


        <div class="container"  style="margin-top: -40px">

            <div class="row g-4">
                @foreach($alltrips->slice(0, 3) as $trip)
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
    </div>
  

