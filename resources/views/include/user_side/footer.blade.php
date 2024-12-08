<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Company</h4>
                <a class="btn btn-link" href="{{ url('/') }}">Home</a>
                <a class="btn btn-link" href="{{ url('/apoutus') }}">About Us</a>
                <a class="btn btn-link" href="{{ url('/service') }}">Services</a>
                <a class="btn btn-link" href="{{ url('/guidesview') }}">Guides</a>
                <a class="btn btn-link" href="{{ url('/contacte') }}">Contact</a>
            </div>

            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>
                    123 Red Sea Blvd, Aqaba, Jordan
                </p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>quickjourney@example.com</p>

            </div>
           
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Testimonials</h4>
                <p>We value your feedback! Please leave a testimonial below.</p>
                <form action="{{ route('testimonials.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="@if(auth()->check()) {{ auth()->user()->id }} @endif">
                    <textarea class="form-control mb-2 @error('testimonial') is-invalid @enderror" name="testimonial"
                        placeholder="Your testimonial" required>{{ old('testimonial') }}</textarea>
                    @error('testimonial')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-primary">Add Testimonial</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">quickjourney</a>, All Right Reserved.
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>