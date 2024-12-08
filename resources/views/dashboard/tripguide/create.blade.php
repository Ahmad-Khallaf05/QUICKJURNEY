@extends('layouts.dashboard_master')
@section("add image to trip", "Add Guides")

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Guide</h4>
            <form action="{{ route('tripguide.store' , $tripid) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf
                <div class="form-group">
                
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="guide_id" >
                        @foreach ($allGuides as $guide)
                            <option value="{{$guide->id}}">{{$guide->name}}</option>
                        @endforeach


                    </select>
                </div>
                <button type="submit" class="btn btn-outline-warning">Add guide</button>
                <a href="{{route('trips.showadmin', $tripid)}}" class="btn btn-outline-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
