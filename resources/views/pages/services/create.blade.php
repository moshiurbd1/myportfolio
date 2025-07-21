@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create Service</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>

        @include('alert.messages')

        <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mt-3">
                    
                    <div class="mb-3">
                        <label for="icon" class="form-label">Font Awesome Icon</label>
                        <input 
                            type="text" 
                            name="icon" 
                            id="icon" 
                            class="form-control" 
                            placeholder="e.g., fas fa-cogs"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input 
                            type="text" 
                            name="title" 
                            id="title" 
                            class="form-control" 
                            placeholder="Enter service title"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea 
                            name="description" 
                            id="description" 
                            rows="4" 
                            class="form-control" 
                            placeholder="Briefly describe the service..."
                            required
                        ></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Create</button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
