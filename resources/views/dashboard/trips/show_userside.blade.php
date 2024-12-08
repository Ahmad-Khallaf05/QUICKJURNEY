@extends('layouts.dashboard_master')
@section("headTitle", "Show Trip Info")

@section('content')
<style>
    .fixed-size-img {
        height: 200px;
        object-fit: cover;
    }
</style>

<div class="card">
    <div class="card-body">
        <!-- Recent Updates Section -->
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $trip->name }}</h4>
                        <div class="d-flex mb-3">
                            <div class="d-flex align-items-center text-muted font-weight-light">
                                <span>Start: {{ date('y/m/d', strtotime($trip->start_at)) }}</span>
                            </div>
                            <div class="d-flex align-items-center text-muted font-weight-light">
                                <span>| End: {{ date('y/m/d', strtotime($trip->end_at)) }}</span>
                            </div>
                        </div>

                        <!-- Trip Images Section -->
                        <div class="row">
                            <div class="col-6 pe-1">
                                @foreach($tripImages->take(2) as $tripimag)
                                    <div class="position-relative">
                                        <img src="{{ asset($tripimag->image) }}"
                                            class="img-fluid mb-2 w-100 rounded fixed-size-img" alt="Trip Image">
                                        <form action="{{ route('trip_images.destroy', $tripimag->id) }}" method="POST"
                                            class="position-absolute top-0 end-0 me-2 mt-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-6 ps-1">
                                @foreach($tripImages->skip(2)->take(2) as $tripimag)
                                    <div class="position-relative">
                                        <img src="{{ asset($tripimag->image) }}"
                                            class="img-fluid mb-2 w-100 rounded fixed-size-img" alt="Trip Image">
                                        <form action="{{ route('trip_images.destroy', $tripimag->id) }}" method="POST"
                                            class="position-absolute top-0 end-0 me-2 mt-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <p>{{ $trip->description }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recent Tickets Section -->
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Guides</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> Assignee </th>
{{--                                        <th> Subject </ th>--}}
                                        <th> Gender </th>
                                        <th> Age </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tripGuids as $tripGuid)
                                        <tr>

                                            <td>
                                                <img src="{{ asset($tripGuid->image) }}"
                                                    class="img-fluid rounded-circle me-2" alt="Guide Image"
                                                    style="width: 40px; height: 40px;">
                                                {{ $tripGuid->name }}
                                            </td>
{{--                                            <td> {{ $tripGuid->description }} </td>--}}
                                            <td> {{ $tripGuid->gender }} </td>
                                            <td> {{ $tripGuid->age }} </td>
                                            <td class="multi">
                                                <form action="{{route('tripguide.destroy', $tripGuid->id)}}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger" type="submit"> delete </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <a href="{{ route('tripimages.create', $trip->id) }}" title="add image">
                    <button type="submit" class="btn btn-outline-success"> Add images</button>
                </a>
                <a href="{{ route('tripguide.create', $trip->id) }}" title="Add guide">
                    <button type="submit" class="btn btn-outline-warning">Add guide</button>
                </a>
                <a href="{{route('trips.index')}}" class="btn btn-gradient-primary me-2 ms-5">Back to list</a>
            </div>
        </div>



    </div>
</div>
@endsection
