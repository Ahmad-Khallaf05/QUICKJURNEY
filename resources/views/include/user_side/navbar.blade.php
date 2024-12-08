    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="{{ url('/') }}" class="navbar-brand p-0">
                <h1 class="text-primary m-0"> <img src="{{asset('logo.png')}}" alt="logo" ></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    
                    <a href="{{ url('/apoutus') }}"
                       class="nav-item nav-link {{ request()->is('About_active') ? 'active' : '' }}">About Us</a>


                    <a href="{{ url('/service') }}" class="nav-item nav-link {{ request()->is('service') ? 'active' : '' }}">Services</a>

                    <a href="{{ url('/guidesview') }}"
                        class="nav-item nav-link {{ request()->is('services') ? 'active' : '' }}">Guides</a>

                    <a href="{{ url('/contacte') }}" class="nav-item nav-link {{ request()->is('contacte') ? 'active' : '' }}">Contact</a>

                    @guest
                    @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                    @endif
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn  nav-item nav-link">Register</a>
                    @endif
                    @else
                    <div class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (Auth::user()->image != null)
                                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile Photo"
                                     class="rounded-circle me-2" width="30" height="30">
                            @else
                                <img src="{{ asset('default-profile.jpg') }}" alt="Profile Photo"
                                     class="rounded-circle me-2" width="30" height="30">
                            @endif
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            @if(Auth()->user()->usertype == "admin" ||Auth()->user()->usertype == "superAdmin")
                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                {{ __('dashboard') }}
                            </a>
                            @endif
                            <a class="dropdown-item" href="{{ route('bookingHistory.index') }}">
                                {{ __('booking History') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @endguest
                </div>
            </div>
        </nav>

        <!-- Rest of the Hero Header Code -->
        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy Your Vacation With Us</h1>
                        <p class="fs-4 text-white mb-4 animated slideInDown">Embark on thrilling adventures and explore the world’s most breathtaking destinations. Join us for unforgettable experiences, tailored for the daring and the curious!</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
