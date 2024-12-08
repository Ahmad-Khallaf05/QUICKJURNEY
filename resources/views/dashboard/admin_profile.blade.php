@extends('layouts.dashboard_master')
@section("headTitle", "My Profile")

@section('content')
    <style>
        .fixed-size-img {
            height: 200px;
            object-fit: cover;
        }
    </style>

    <div class="card">
        <div class="card-body">
            <!-- Profile Information Section -->
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">My Profile</h4>
                            <div class="d-flex mb-3">
                                <div class="d-flex align-items-center text-muted font-weight-light">
                                    <span>Member Since: {{ date('Y/m/d', strtotime(auth()->user()->created_at)) }}</span>
                                </div>
                            </div>

                            <!-- Profile Image Section -->
                            <div class="row">
                                <div class="col-6 pe-1">
                                    <div class="position-relative">
                                        <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('default-profile.jpg') }}"
                                             class="img-fluid mb-2 w-100 rounded fixed-size-img" alt="Profile Image">
                                        <form action="" method="POST"
                                              enctype="multipart/form-data" class="position-absolute top-0 end-0 me-2 mt-2">
                                            @csrf
                                            @method('PUT')
                                            <input type="file" class="form-control form-control-sm @error('image') is-invalid @enderror" id="image" name="image"
                                                   accept="image/*" style="display:none;" onchange="this.form.submit()">
                                            <button type="button" class="btn btn-warning btn-sm" onclick="document.getElementById('image').click();">Change</button>
                                            @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Profile Update Form Section -->
                            <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm mt-4">
                                @csrf
                                @method('PUT')
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                                   placeholder="Your Name" value="{{ auth()->user()->name }}" required>
                                            <label for="name">Name</label>
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                                   placeholder="Your Email" value="{{ auth()->user()->email }}" required>
                                            <label for="email">Email</label>
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                                                   placeholder="Your Phone" value="{{ auth()->user()->phone }}" required>
                                            <label for="phone">Phone</label>
                                            @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-100 py-3">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
