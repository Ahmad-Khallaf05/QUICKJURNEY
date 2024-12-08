@extends("layouts.dashboard_master")
@section("headTitle", "One")
@section("content")

    <div class="nav-profile-text d-flex flex-column">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p> --}}
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        {{-- enctype="multipart/form-data" -> بتخليني ابعت انواع داتا مختلفه --}}
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Category name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="insert your category name"value="{{ old('name', $category->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Category description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="description" value="{{ old('description', $category->description) }}" required>
                            {{-- لاسترداد بيانات الإدخال القديمة --}}
                        </div>

                        <div class="form-group">
                            <label for="image">File Upload</label>
                            <input type="file" name="image" id="fileUpload" class="form-control" value="{{ old('image', $category->image) }}">
                        </div>

                        <button type="submit" class="btn btn-outline-info"> Update</button>
                        <button class="btn btn-outline-secondary">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
