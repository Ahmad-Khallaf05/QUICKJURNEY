@extends('layouts.dashboard_master')

@section('headTitle', 'Bookings')

@section('content')
<div class="container card p-5">
<div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="title-1">Bookings</h2>
         
        </div>

        <div class="row">
        <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-40">
         
            @if ($bookings->isEmpty())
                <p>No booking found.</p>
            @else
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @elseif (Session::get('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <table class="table table-bordered bg-white">
                    <thead class="thead-light">
                        <tr>
                            <th>Booking ID</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>price</th>
                            <th>status</th>
                            <th>accepted</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->user->email }}</td>
                                <td>{{ $booking->user->phone }}</td>
                                <td>{{ $booking->trip->price }}</td>
                                <td>{{ $booking->status }}</td>
                                @if ($booking->accepted)
                                    <td>Accepted</td>
                                @else
                                    <td>pending</td>
                                @endif
                                <td>
                                    
                                        
                                        <a href="{{ route('booking.edit', $booking->id) }}"
                                            class="btn btn-outline-info" title="edit"><i class="mdi mdi-table-edit"></i></a>
                                            <a href="{{ route('booking.show', $booking->id) }}" class="btn btn-outline-primary" title="view">
                                            <i class="mdi mdi-information-outline" ></i></a>
                                        <form action="{{ route('booking.destroy', $booking->id) }}" method="POST"
                                            style="display:inline-block;" title="delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" 
                                                onclick="confirmDeletion(event, '{{ route('booking.destroy', $booking->id) }}')"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                        <a href="{{ route('book.confirm', $booking->id) }}" class="btn btn-outline-warning" title="confirm">
                                        <i class="mdi mdi-checkbox-marked-circle-outline"></i> 
                                       </a>
                                        <a href="{{ route('booking.accept', $booking->id) }}" class="btn btn-outline-success" title="accept">   <i class="mdi mdi-checkbox-multiple-marked-circle-outline"></i></a>
                                    </div>
                                </td>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    </div>
    </div>

    <!-- Custom Confirmation Modal -->
<div id="confirmationModal"
    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 1000;">
    <div style="background: #fff; padding: 20px; border-radius: 5px; text-align: center;">
        <p>Are you sure you want to delete this category?</p>
        <button id="confirmButton" class="btn btn-outline-danger">delete</button>
        <button id="cancelButton" class="btn btn-outline-secondary">Cancel</button>
    </div>
</div>

<script>
    function confirmDeletion(event, url) {
        event.preventDefault(); // Prevent the default form submission -. تريد منع نموذج من الإرسال عند النقر على زر الإرسال
        var modal = document.getElementById('confirmationModal');
        var confirmButton = document.getElementById('confirmButton');
        var cancelButton = document.getElementById('cancelButton');

        // Show the custom confirmation dialog
        modal.style.display = 'flex';

        // Set up the confirm button to submit the form
        confirmButton.onclick = function () {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = url;

            var csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            // "hidden" يُستخدم للإشارة إلى طرق مختلفة لجعل العناصر غير مرئية أو مخفية
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}'; // Laravel CSRF token
            form.appendChild(csrfToken);

            var methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            form.appendChild(methodField);

            document.body.appendChild(form);
            form.submit();
        };

        // Set up the cancel button to hide the modal
        cancelButton.onclick = function () {
            modal.style.display = 'none';
        };
    }
</script>

@endsection
