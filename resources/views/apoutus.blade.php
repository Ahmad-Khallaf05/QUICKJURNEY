@extends("layouts/user_side_master")
@section('pagename', 'About us')
@section("hero", "We specialize in crafting unique travel experiences that combine adventure with comfort. Our focus is on creating memorable journeys that take you to stunning destinations and offer exceptional experiences")

@section("content")


    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">About Us</h6>
                <h1 class="mb-5">Learn More About Our Company</h1>
            </div>


            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/abo.jpg" alt=""
                             style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">Welcome to <span class="text-primary">Quick Journey</span></h1>
                    <p class="mb-4">Discover the thrill of adventure with us! We believe in creating extraordinary experiences for explorers who seek the unknown. Whether you're looking to trek through wild terrains or unwind in serene landscapes, we bring the world’s wonders closer to you</p>
                    <p class="mb-4">From thrilling expeditions to relaxing escapes, we curate journeys that captivate the heart and soul, ensuring every moment is unforgettable. Adventure, comfort, and excitement—all wrapped into one perfect journey</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Exclusive Adventure Tours</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Premium Adventure Gear</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Top-Notch Local Guides</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>24/7 Personalized Support</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Custom-Tailored Itineraries</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Unique Off-the-Beaten-Path Destinations</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row g-4 mt-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>Who We Are</h5>
                    <p class="mb-4">Welcome to <span class="text-primary">Quick Journey</span>, where the spirit of adventure meets unparalleled expertise. We are a team of passionate explorers and travel enthusiasts dedicated to curating unforgettable adventure experiences across the globe. Our mission is to bring you closer to the wild and the wonderful, offering a range of meticulously planned trips that cater to every thrill-seeker’s desires. With a combined experience of over 4 years in the travel industry, we pride ourselves on delivering authentic, immersive, and transformative adventures that resonate long after the journey ends.<br><br>

At the heart of our organization is a commitment to excellence and a deep respect for the natural world. Our dedicated team of travel experts works tirelessly to handpick each destination, ensuring that every trip not only meets but exceeds your expectations. We believe that adventure should be both exhilarating and sustainable, and we strive to minimize our environmental impact while maximizing your enjoyment. Our partnerships with local guides and communities ensure that your adventures contribute positively to the places we visit, fostering connections and creating lasting memories.<br><br>

Our passion for adventure goes beyond simply planning trips; it’s about creating experiences that inspire and enrich lives. Whether you’re scaling mountains, exploring ancient ruins, or embarking on a cultural journey, we are here to support you every step of the way. Join us on a journey of discovery, and let us help you uncover the world’s hidden gems, one adventure at a time. At <span class="text-primary">Quick Journey</span>, the adventure begins with us, and the possibilities are as boundless as your imagination.</p>
                    <div class="d-flex align-items-center mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                             style="width: 50px; height: 50px;">
                           <a href="{{url('/guidesview') }}"><i class="fa fa-users text-white"></i></a>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Our Team</h5>
                            <p class="mb-0">We have a skilled team of professionals committed to excellence.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h5>Our Vision</h5>
                    <p class="mb-4">At <span class="text-primary">Quick Journey</span>, our vision is to redefine the way the world experiences adventure travel. We aspire to be the leading trailblazer in crafting extraordinary journeys that inspire and transform, offering not just a trip, but a gateway to new horizons and profound personal growth. We envision a world where every adventure is an opportunity to connect deeply with nature, cultures, and oneself, all while embracing the thrill of the unknown. By curating unique and immersive experiences, we aim to ignite a sense of wonder and exploration that stays with you long after the journey ends.<br><br>

We are committed to fostering a culture of sustainability and respect for the environment in all our travel endeavors. Our vision extends beyond the immediate adventure; we strive to protect and preserve the natural landscapes and cultural heritage that make our destinations special. By partnering with local communities and promoting responsible travel practices, we aim to ensure that our adventures contribute positively to the world and leave a lasting legacy of respect and care for future generations.<br><br>

Our ultimate goal is to empower our travelers to embark on meaningful journeys that enrich their lives and broaden their perspectives. We believe that adventure has the power to transform, and we are dedicated to creating opportunities for you to discover new passions, forge lasting connections, and make unforgettable memories. At <span class="text-primary">Quick Journey</span>, we invite you to join us in our vision of a world where every adventure is a step toward a more enlightened and connected global community.

</p>
                    <div class="d-flex align-items-center mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                             style="width: 50px; height: 50px;">
                            <i class="fa fa-bullseye text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Our Mission</h5>
                            <p class="mb-0">To provide exceptional services that exceed our clients' expectations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
