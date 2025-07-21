@extends('layouts.admin_layout')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create Team Member</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Team / Create</li>
        </ol>

        @include('alert.messages')

        <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Image Section -->
                <div class="col-md-5">
                    <h5 class="mt-3">Profile Image</h5>
                    <img src="{{ asset('img/main_background.jpg') }}" alt="Team Image" class="img-fluid mb-3" style="height: 30vh; object-fit: cover;">
                    <div class="mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>

                <!-- Info Section -->
                <div class="col-md-7">
                    <h5 class="mt-3">Team Member Info</h5>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter team member's name">
                    </div>

                    <div class="mb-3">
                        <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                        <input type="text" id="designation" name="designation" class="form-control" placeholder="Enter designation">
                    </div>

                    <h6 class="mt-4">Social Links</h6>

                    <div class="mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="url" id="facebook" name="facebook" class="form-control" placeholder="Facebook profile link">
                    </div>

                    <div class="mb-3">
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="url" id="linkedin" name="linkedin" class="form-control" placeholder="LinkedIn profile link">
                    </div>

                    <div class="mb-3">
                        <label for="x" class="form-label">Twitter / X</label>
                        <input type="url" id="x" name="x" class="form-control" placeholder="Twitter or X profile link">
                    </div>

                    <button type="submit" class="btn btn-success mt-2">Create</button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
