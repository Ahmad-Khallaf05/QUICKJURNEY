@extends('layouts.dashboard_master')
@section("headTitle", "Guides")

@section('content')
<div class="container card p-5">
    @if(session('static'))
        <div class="alert alert-info">
            {{ session('static') }}
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="title-1">Guides</h2>
            <a href="{{ route('guides.create')  }}">
                <button type="button" class="btn btn-primary">
                    <i class="zmdi zmdi-plus"></i>Add New Guide
                </button>
            </a>
        </div>
        
        <!-- <a href="{{ route('guides.create') }}" class="btn btn-primary">Add New Guide</a> -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($guides->isEmpty())
            <p>No guides found.</p>
        @else

        <form action="{{ route('search_guides') }}" method="post" class="container mt-4">
        @csrf
        <div class="form-group">
           

            <div class="input-group" style="margin-top: 10px">

                <input type="text" id="q" name="q" class="form-control" placeholder="Insert guides name" style="border: rgb(204, 204, 204) solid 1px">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </form>
        <table class="table table-bordered bg-white">
        <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guides as $guide)
                        <tr>
                        <td>
                                @if($guide->image)
                                    <img src="{{ asset($guide->image) }}" alt="{{ $guide->name }}" class="img-fluid" width="100">
                                @else
                                    <p>No Image</p>
                                @endif
                            </td>
                            <td>{{ $guide->name }}</td>
                            <td>{{ $guide->age }}</td>
                            <td>{{ $guide->gender }}</td>
                            <td>
                               
                                <a href="{{ route('guides.edit', $guide->id) }}" class="btn btn-outline-info" title="edit"><i class="mdi mdi-table-edit"></i></a>
                                <a href="{{ route('guides.show', $guide->id) }}" class="btn btn-outline-primary"title="view"><i class="mdi mdi-information-outline"></i></a>
                                <form action="{{ route('guides.destroy', $guide->id) }}" method="POST" style="display:inline-block;" title="delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger"  onclick="confirmDeletion(event)"><i class="mdi mdi-delete"></i></button>
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
