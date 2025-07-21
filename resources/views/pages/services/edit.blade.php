@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Service</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Service</li>
        </ol>

        @include('alert.messages')

        <form action="{{ route('admin.service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="mb-3">
                        <label for="icon" class="form-label">Font Awesome Icon</label>
                        <input 
                            type="text" 
                            name="icon" 
                            id="icon" 
                            class="form-control" 
                            value="{{ old('icon', $service->icon) }}" 
                            placeholder="e.g., fas fa-code"
                        >
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title"  
                            class="form-control" 
                            value="{{ old('title', $service->title) }}" 
                            placeholder="Enter service title"
                        >
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Short Description</label>
                        <textarea 
                            id="description" 
                            name="description"  
                            class="form-control" 
                            rows="4" 
                            placeholder="Write a short description..."
                        >{{ old('description', $service->description) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update Service
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
