@extends('layouts.admin_layout')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Portfolio</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Portfolio</li>
        </ol>

        @include('alert.messages')

        <form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Image Section -->
                <div class="col-md-5 mt-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="mb-3">Big Image</h5>
                            <img src="{{ url($portfolio->big_image) }}" alt="Big Image" class="img-fluid rounded mb-2" style="height: 30vh; object-fit: cover;">
                            <input type="file" name="big_image" class="form-control mb-4">

                            <h5 class="mb-3">Small Image</h5>
                            <img src="{{ url($portfolio->small_image) }}" alt="Small Image" class="img-fluid rounded mb-2" style="height: 20vh; object-fit: cover;">
                            <input type="file" name="small_image" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Text Input Section -->
                <div class="col-md-7 mt-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="mb-4">Portfolio Details</h5>

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" name="title" value="{{ $portfolio->title ?? '' }}" class="form-control" placeholder="Enter portfolio title">
                            </div>

                            <!-- Sub Title -->
                            <div class="mb-3">
                                <label for="sub_title" class="form-label">Sub Title</label>
                                <input type="text" id="sub_title" name="sub_title" value="{{ $portfolio->sub_title ?? '' }}" class="form-control" placeholder="Enter portfolio subtitle">
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" rows="5" class="form-control" placeholder="Write portfolio description...">{{ $portfolio->description ?? '' }}</textarea>
                            </div>

                            <!-- Client -->
                            <div class="mb-3">
                                <label for="client" class="form-label">Client</label>
                                <input type="text" id="client" name="client" value="{{ $portfolio->client ?? '' }}" class="form-control" placeholder="Client name">
                            </div>

                            <!-- Category -->
                            <div class="mb-4">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" id="category" name="category" value="{{ $portfolio->category ?? '' }}" class="form-control" placeholder="Portfolio category">
                            </div>

                            <!-- Submit -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="fas fa-save me-1"></i> Update Portfolio
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
