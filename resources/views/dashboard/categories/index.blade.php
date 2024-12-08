@extends('layouts.dashboard_master')

@section('headTitle', 'Categories')

@section('content')


<div class="container card p-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="title-1">Categories</h2>
        <a href="{{ route('categories.create') }}">
            <button type="button" class="btn btn-primary">
                <i class="zmdi zmdi-plus"></i> Add New Category
            </button>
        </a>
    </div>

    <form action="{{ route('search') }}" method="post" class="container mt-4">
        @csrf
        <div class="form-group">


            <div class="input-group" style="margin-top: 10px">

                <input type="text" id="q" name="q" class="form-control" placeholder="Insert your category name"
                    style="border: rgb(204, 204, 204) solid 1px">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </form>


    @if(session('static'))
        <div class="alert alert-info">
            {{ session('static') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-bordered bg-white">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
{{--                            <th scope="col">Description</th>--}}
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>
                                    @if($category->image)
                                        <img src="{{ asset($category->image) }}" alt="Category Image"
                                            style=" border-radius: 50%;">
                                        {{-- تُستخدم الدالة asset للحصول على URL كامل للملفات الموجودة في مجلد public --}}
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>{{ $category->name }}</td>
{{--                                <td>{{ $category->description }}</td>--}}
                                <td>{{ $category->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" title="Edit">
                                        <button type="submit" class="btn btn-outline-info" ><i
                                                class="mdi mdi-table-edit"></i></button>
                                    </a>
                                    <a href="{{ route('categoties', $category->id) }}" title="view">
                                        <button type="submit" class="btn btn-outline-primary"><i
                                                class="mdi mdi-information-outline"title="View"></i></button>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger"
                                        onclick="confirmDeletion(event, '{{ route('categories.destroy', $category->id) }}')" title="Delete"><i
                                            class="mdi mdi-delete" ></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
