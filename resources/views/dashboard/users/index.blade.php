@extends('layouts.dashboard_master')
@section("headTitle", "Users")

@section('content')
<div class="container card p-5">
<div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="title-1">Users</h2>
            <a href="{{ route('users.create') }}">
                <button type="button" class="btn btn-primary">
                    <i class="zmdi zmdi-plus"></i> Add New user
                </button>
            </a>
        </div>
        <div class="row">
        <div class="col-lg-12">


        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($users->isEmpty())
            <p>No user found.</p>
        @else
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-bordered bg-white">
                <thead class="thead-light">
                    <tr>
                        <th>Image</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>

                        <th>Phone</th>
                        <!-- <th>image</th> -->
                        <th>Usertype</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                        @if($user->image)
                                <img src="{{ asset('storage/'. $user->image) }}" alt="{{ $user->name }}" class="img-fluid" width="100">
                                        @else
                                <p>No Image</p>
                                       @endif
                            </td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

                            <td>{{ $user->phone }}</td>

                            <td>{{ $user->usertype }}</td>

                            <td>

                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-info" title="edit"><i class="mdi mdi-table-edit"></i></a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    style="display:inline-block;" title="delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="btn btn-outline-danger"  onclick="confirmDeletion(event, '{{ route('users.destroy', $user->id) }}')"><i class="mdi mdi-delete"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
</div>
</div>

<div id="confirmationModal"
    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 1000;">
    <div style="background: #fff; padding: 20px; border-radius: 5px; text-align: center;">
        <p>Are you sure you want to delete this user?</p>
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
