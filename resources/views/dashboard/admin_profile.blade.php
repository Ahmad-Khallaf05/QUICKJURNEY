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
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">My Profile</h4>
                        <div class="d-flex mb-3">
                            <div class="text-muted">
                                <span>Member Since: {{ date('Y/m/d', strtotime(auth()->user()->created_at)) }}</span>
                            </div>
                        </div>

                        <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm mt-4">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <div class="position-relative">
                                        <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('default-profile.jpg') }}"
                                            class="img-fluid mb-2 rounded fixed-size-img" alt="Profile Image">
                                        <input type="file" id="image" name="image" accept="image/*" class="d-none" onchange="previewImage(event)">
                                        <button type="button" class="btn btn-warning btn-sm" onclick="document.getElementById('image').click();">Change</button>
                                        @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                            placeholder="Your Name" value="{{ auth()->user()->name }}" required>
                                        <label for="name">Name</label>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                            placeholder="Your Email" value="{{ auth()->user()->email }}" required>
                                        <label for="email">Email</label>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                                            placeholder="Your Phone" value="{{ auth()->user()->phone }}" required>
                                        <label for="phone">Phone</label>
                                        @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100 py-3">Update Profile</button>
                                </div>
                                <!-- Reset Password Button -->
                                <div class="text-center mt-4">
                                    <a href="{{ route('password.request') }}" class="btn btn-secondary w-100 py-3">Reset Password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const imgElement = document.querySelector('.fixed-size-img');
            imgElement.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection