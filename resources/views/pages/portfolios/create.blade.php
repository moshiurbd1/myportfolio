@extends('layouts.admin_layout')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create Service</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Create</li>
        </ol>

        @include('alert.messages')

        <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Image Upload Section -->
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Upload Images</h5>

                            <!-- Big Image -->
                            <div class="mb-3">
                                <label for="big_image" class="form-label">Big Image</label>
                                <img src="{{ asset('img/main_background.jpg') }}" alt="Big Image" class="img-fluid rounded mb-2" style="height: 30vh; object-fit: cover;">
                                <input type="file" name="big_image" id="big_image" class="form-control">
                            </div>

                            <!-- Small Image -->
                            <div class="mb-3">
                                <label for="small_image" class="form-label">Small Image</label>
                                <img src="{{ asset('img/main_background.jpg') }}" alt="Small Image" class="img-fluid rounded mb-2" style="height: 20vh; object-fit: cover;">
                                <input type="file" name="small_image" id="small_image" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Service Info Section -->
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Service Information</h5>

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter service title">
                            </div>

                            <!-- Sub Title -->
                            <div class="mb-3">
                                <label for="sub_title" class="form-label">Sub Title</label>
                                <input type="text" id="sub_title" name="sub_title" class="form-control" placeholder="Enter short subtitle">
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="5" placeholder="Write a brief description..."></textarea>
                            </div>

                            <!-- Client -->
                            <div class="mb-3">
                                <label for="client" class="form-label">Client</label>
                                <input type="text" id="client" name="client" class="form-control" placeholder="Client name (optional)">
                            </div>

                            <!-- Category -->
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" id="category" name="category" class="form-control" placeholder="Service category (e.g., Web Development)">
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="fas fa-plus-circle me-1"></i> Create Service
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
