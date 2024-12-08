<div class="container-xxl py-5 destination">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Destination</h6>
            <h1 class="mb-5">Popular Destination</h1>
        </div>
        <div class="row g-3">
            @foreach($categories->slice(0, 1 ) as $category)
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="{{ url('/service')}}">
                                <img class="img-fluid" src="{{ asset($category->image) }}" alt="">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">{{ $category->name }}</div>
                            </a>
                        </div>
                        @endforeach
                        @foreach($categories->slice(1, 2) as $category)
                            <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                                <a class="position-relative d-block overflow-hidden" href="{{ url('/service') }}">
                                    <img class="img-fluid" src="{{ asset($category->image) }}" alt="">
                                    <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">{{ $category->name }}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                @foreach($categories->slice(2, 1) as $category)

                    <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                        <a class="position-relative d-block h-100 overflow-hidden" href="{{ url('/service') }}">
                            <img class="img-fluid position-absolute w-100 h-100" src="{{ asset($category->image) }}" alt="" style="object-fit: cover;">
                            <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">{{ $category->name }}</div>
                        </a>
                    </div>
                @endforeach

        </div>
    </div>
</div>
