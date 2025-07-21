@extends('layouts.admin_layout')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit About Section</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">About / Edit</li>
        </ol>

        @include('alert.messages')

        <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Image Section -->
                <div class="col-md-6">
                    <h5 class="mt-3">Current Image</h5>
                    <img src="{{ url($about->image) }}" alt="Background Image" class="img-fluid mb-3 border rounded" style="height: 30vh; object-fit: cover;">

                    <div class="mb-3">
                        <label for="image" class="form-label">Change Image (optional)</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>

                <!-- Text Fields Section -->
                <div class="col-md-6">
                    <h5 class="mt-3">About Content</h5>

                    <div class="mb-3">
                        <label for="title1" class="form-label">Title 1</label>
                        <input type="text" id="title1" name="title1" class="form-control" value="{{ $about->title1 }}" placeholder="Enter first title">
                    </div>

                    <div class="mb-3">
                        <label for="title2" class="form-label">Title 2</label>
                        <input type="text" id="title2" name="title2" class="form-control" value="{{ $about->title2 }}" placeholder="Enter second title">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter detailed description...">{{ $about->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
