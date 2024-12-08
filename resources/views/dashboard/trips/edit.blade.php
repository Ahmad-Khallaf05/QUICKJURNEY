@extends("layouts.dashboard_master")
@section("headTitle", "One")
@section("content")

<div class="nav-profile-text d-flex flex-column">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <form class="forms-sample" class="form" action="{{ route('trips.update',$trip->id) }}" method="POST">

                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name"> Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{$trip->name}}" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{$trip->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect3">Category name</label>
                        <select  class="form-control form-control-sm" id="exampleFormControlSelect3" name="cat_id">
                            @foreach ($categories as $category)
                            <option @selected($category->id == $trip->cat_id) value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                           

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description"> Location</label>
                        <input type="text" class="form-control" id="location" name="location"
                            value="{{$trip->location}}" required>
                    </div>

                    <div class="form-group">
                        <label for="description"> Capacity</label>
                        <input type="text" class="form-control" id="capacity" name="capacity"
                            value="{{$trip->capacity}}" required>
                    </div>

                    <div class="form-group">
                        <label for="description"> Price</label>
                        <input type="text" class="form-control" id="price" name="price"
                           value="{{$trip->price}}" required>
                    </div>

                    <div class="form-group">
                        <label for="description"> Start_at</label>
                        <input type="text" class="form-control" id="start_at" name="start_at"
                            value="{{$trip->start_at}}" required>
                    </div>

                    <div class="form-group">
                        <label for="description"> End_at</label>
                        <input type="text" class="form-control" id="end_at" name="end_at"
                            value="{{$trip->end_at}}" required>
                    </div>

                    <!-- <div class="form-group">
                        <label>Image upload</label>
                        <input type="file" name="image" id="fileUpload" class="file-upload-default" multiple>
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" id="fileUploadInfo" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button id="uploadButton" class="btn btn-outline-primary btn-fw" type="button">Upload</button>
                            </span>
                        </div>
                    </div> -->



                    <button type="submit" class="btn btn-outline-info">Update</button>
                    <a href="{{route('trips.index')}}" class="btn btn-outline-secondary">Cancel</a>

                </form>
            </div>
        </div>
    </div>
    @endsection