@extends("layouts/user_side_master")

@section("pagename" , "Guides")

@section("hero" , "Meet Our Expert Guides Who Make Every Journey Unforgettable")

@section("content")
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Travel Guide</h6>
            <h1 class="mb-5">Meet Our Guides</h1>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach($guides as $guide)
            <div class="col wow fadeInUp" data-wow-delay="0.1s">
                <a href="{{ url('guide/' . $guide->id) }}">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid fixed-size" src="{{asset($guide->image)}}" style="width: 300px; height: 300px;" alt="Image">
                        </div>
                       
                        <div class="text-center p-4">
                            <h5 class="mb-0">{{$guide->name}}</h5>
                            <small style="color:grey;">{{$guide->description}}</small>
                        </div>
                        <div class="text-center mb-10">
                                <a href="{{ url('guide/' . $guide->id) }}" class="btn btn-primary ">show guide profile</a>
                            </div>
                    </div>
                </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
