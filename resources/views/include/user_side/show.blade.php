
        @extends('layouts/user_side_master')
        @section('pagename', 'Profile')
        @section('login_active', 'active')

        @section('content')

            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <h2 class=" mb-4 text-center">My Profile</h2>
                            <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST"
                                  enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
                                @csrf
                                @method('PUT')
                                <div class="row g-4">
                                    <div class="col-12 text-center">
                                        <div class="profile-img mb-4">
                                            <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('default-profile.jpg') }}"
                                                 alt="Profile Photo" class="img-fluid rounded-circle" width="150" height="150">
                                        </div>

                                        <div class="form-group">
                                            <label for="profile_photo" class="form-label">Update Profile Photo</label>
                                            <input type="file" class="form-control" id="image" name="image"
                                                   accept="image/*">
                                            <small class="form-text text-muted">Accepted formats: jpg, jpeg, png. Max size:
                                                2MB.</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   placeholder="Your Name" value="{{ auth()->user()->name }}" required>
                                            <label for="name">Name</label>
                                            <div class="invalid-feedback">
                                                Please enter your name.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email"
                                                   placeholder="Your Email" value="{{ auth()->user()->email }}" required>
                                            <label for="email">Email</label>
                                            <div class="invalid-feedback">
                                                Please enter a valid email address.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                   placeholder="Your Phone" value="{{ auth()->user()->phone }}" required>
                                            <label for="phone">Phone</label>
                                            <div class="invalid-feedback">
                                                Please enter your phone number.
                                            </div>
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



