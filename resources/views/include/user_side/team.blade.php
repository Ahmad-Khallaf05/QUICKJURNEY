<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Travel Guide</h6>
            <h1 class="mb-5">Meet Our Guide</h1>
        </div>
        <div class="row g-4">
            @foreach($allguides->slice(0, 4) as $guide)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
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
