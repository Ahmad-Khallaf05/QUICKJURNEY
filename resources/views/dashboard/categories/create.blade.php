@extends("layouts.dashboard_master")
@section("headTitle", "One")
@section("content")

    <div class="nav-profile-text d-flex flex-column">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p> --}}
                    <form class="forms-sample" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        {{-- enctype="multipart/form-data" -> بتخليني ابعت انواع داتا مختلفه --}}

                        @csrf
                        <div class="form-group">
                            <label for="name">Category name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="insert your category name" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Category description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="description" required>
                        </div>
                        <div class="form-group">
                            <label for="image">File Upload</label>
                            <input type="file" name="image" id="fileUpload" class="form-control">
                        </div>


                        <button type="submit" class="btn btn-gradient-primary me-2">Add new category</button>
                        <a href="{{route('categories.index')}}" class="btn btn-outline-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
@endsection
