@extends('layouts.admin_layout')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create About Section</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">About / Create</li>
        </ol>

        @include('alert.messages')

        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Image Upload Section -->
                <div class="col-md-6">
                    <h5 class="mt-3">Background Image</h5>
                    <img src="{{ asset('img/main_background.jpg') }}" alt="Background Image" class="img-fluid mb-3" style="height: 30vh; object-fit: cover; border: 1px solid #ccc; border-radius: 5px;">
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image <span class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>

                <!-- Text Input Section -->
                <div class="col-md-6">
                    <h5 class="mt-3">About Content</h5>

                    <div class="mb-3">
                        <label for="title1" class="form-label">Title 1 <span class="text-danger">*</span></label>
                        <input type="text" id="title1" name="title1" class="form-control" placeholder="Enter first title">
                    </div>

                    <div class="mb-3">
                        <label for="title2" class="form-label">Title 2 <span class="text-danger">*</span></label>
                        <input type="text" id="title2" name="title2" class="form-control" placeholder="Enter second title">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter detailed description..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
