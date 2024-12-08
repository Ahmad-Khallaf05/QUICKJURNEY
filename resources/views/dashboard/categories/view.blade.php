@extends('layouts.dashboard_master')
@section("headTitle", "Show Guides")

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ old('name', $category->name) }}</h4>

            @if($category->image)
                <img src="{{ asset($category->image) }}" alt="Category Image" style="width: 50%; border-radius: 8px; margin-bottom: 15px;">
            @else
                <span style="color: #666; font-style: italic;">No Image</span>
            @endif

            <p><strong>Name:</strong> {{ old('name', $category->name) }}</p>
            <p><strong>Description:</strong> {{ $category->description }}</p>


            
           

            <a href="{{ route('categories.index') }}" class="btn btn-gradient-primary me-2">Back to List</a>

        </div>
    </div>
@endsection
