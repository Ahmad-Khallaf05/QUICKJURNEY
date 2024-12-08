
@include("include/user_side/first")

<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<!-- Spinner End -->


<!-- Topbar Start -->
<div class="container-fluid bg-dark px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i> 123 Red Sea Blvd, Aqaba, Jordan</small>
                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</small>
                <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@example.com</small>
            </div>
        </div>
        
    </div>
</div>
<!-- Spinner End -->



<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="#" class="navbar-brand p-0">
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
                        <a href="{{ route('login') }}" class="nav-item nav-link @yield('login_active')">Login</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn nav-item nav-link @yield('register_active')">Register</a>
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

    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white animated slideInDown">@yield("pagename" )</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">

                            <li class="fs-4 text-white mb-4 animated slideInDown" aria-current="page">@yield("hero")</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@yield("content")

@include("include/user_side/footer")
@include("include/user_side/end")
