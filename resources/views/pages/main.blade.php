@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Main Page Settings</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Main</li>
        </ol>

        @include('alert.messages')

        <form action="{{ route('admin.main.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Background Image -->
                <div class="col-md-5 mt-3">
                    <h5 class="mb-2">Current Background Image</h5>
                    @if(isset($data) && $data->bg_image)
                        <img src="{{ url($data->bg_image) }}" alt="Background Image" class="img-fluid rounded mb-3" style="height: 30vh; object-fit: cover;">
                    @else
                        <img src="{{ asset('img/main_background.jpg') }}" alt="Default Background Image" class="img-fluid rounded mb-3" style="height: 30vh; object-fit: cover;">
                    @endif

                    <label class="form-label">Change Background Image</label>
                    <input type="file" name="bg_image" class="form-control mb-3">
                </div>

                <!-- Title, Subtitle, Resume -->
                <div class="col-md-6 mt-3">
                    <div class="mb-3">
                        <label for="title" class="form-label">Main Title</label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            class="form-control" 
                            value="{{ old('title', $data->title ?? '') }}" 
                            placeholder="Enter main heading, e.g., Hi, I'm John Doe"
                        >
                    </div>

                    <div class="mb-3">
                        <label for="sub_title" class="form-label">Sub Title</label>
                        <input 
                            type="text" 
                            id="sub_title" 
                            name="sub_title" 
                            class="form-control" 
                            value="{{ old('sub_title', $data->sub_title ?? '') }}" 
                            placeholder="e.g., Full Stack Developer | Laravel & Vue.js"
                        >
                    </div>

                    <div class="mb-3">
                        <label for="resume" class="form-label">Upload Resume</label>
                        <input type="file" name="resume" id="resume" class="form-control">
                        @if(isset($data->resume))
                            <small class="d-block mt-1">
                                <a href="{{ url($data->resume) }}" target="_blank" class="text-primary">
                                    View Current Resume
                                </a>
                            </small>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success mt-2">
                        <i class="fas fa-save"></i> Update Main Page
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
