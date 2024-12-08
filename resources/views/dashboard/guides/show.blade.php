@extends('layouts.dashboard_master')
@section("headTitle", "Show Guides")

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ $guide->name }}</h4>
        @if ($guide->image)
        <div class="text-center mb-4">
        <img src="{{asset($guide->image) }}" alt="{{ $guide->name }}" class="img-fluid rounded">
        </div>
        @endif
        <p><strong>Age:</strong> {{ $guide->age }}</p>
        <p><strong>Gender:</strong> {{ $guide->gender }}</p>
        <p><strong>Description:</strong></p>
        <p>{{ $guide->description }}</p>
        <a href="{{ route('guides.index') }}" class="btn btn-gradient-primary me-2">Back to List</a>
       
    </div>
</div>
@endsection
