@extends('layouts.dashboard_master')
@section('dashboard', 'One')
@section('content')
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <span class="font-weight-normal mb-3 h3"><b>Catigories</b>
                    </span><i class="mdi mdi-collage mdi-24px"></i>
                    <h2 class="mb-5">{{ count($cats) }}</h2>

                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <span class="font-weight-normal mb-3 h3"><b>Trips</b>
                    </span>
                    <i class="mdi mdi-airballoon mdi-24px"></i>
                    <h2 class="mb-5">{{ count($trips) }}</h2>

                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <span class="font-weight-normal mb-3 h3"><b> Testamonials </b></span>
                    <i class="mdi mdi-voice mdi-24px"></i>
                    <h2 class="mb-5">{{ count($testamonials) }}</h2>

                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <span class="font-weight-normal mb-3 h3"><b>Guides</b> </span>
                    <i class="mdi mdi-account-star mdi-24px"></i>
                    <h2 class="mb-5">{{ count($guides) }}</h2>

                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <span class="font-weight-normal mb-3 h3"><b>bookings</b></span>
                    <i class="mdi mdi-clipboard-check mdi-24px "></i>
                    <h2 class="mb-5">{{ count($bookings) }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <!-- Bookings Chart -->
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bookings</h4>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Users Chart -->
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users</h4>
                    <div>
                        <canvas id="myChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Bookings Chart
        const ctx1 = document.getElementById('myChart').getContext('2d');
        new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ['inProgress', 'Booked', 'Cancelled'],
                datasets: [{
                    label: 'The number of bookings',
                    data: [
                        {{ $inProgressBookings }},
                        {{ $completedBookings }},
                        {{ $cancelledBookings }}
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });

        // Users Chart
        const ctx2 = document.getElementById('myChart1').getContext('2d');
        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['customers', 'admins' , 'guides'],
                datasets: [{
                    label: 'The number of users',
                    data: [
                        {{ $custumers }},
                        {{ $admins }},
                        {{ count($guides) }}

                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(75, 192, 55, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(75, 192, 55, 0.2)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
