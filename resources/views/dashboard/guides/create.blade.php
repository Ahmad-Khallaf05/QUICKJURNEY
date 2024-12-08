@extends('layouts.dashboard_master')
@section("headTitle", "Crate Guides")

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Create Guide</h4>
        <form action="{{ route('guides.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" name="age" placeholder="Age">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                   
                </select>
            </div>
            <button type="submit" class="btn btn-gradient-primary me-2">Add new guide</button>
            <a href="{{ route('guides.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
