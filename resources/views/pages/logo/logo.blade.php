@extends('layouts.admin_layout')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Logo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Logo</li>
        </ol>

        @include('alert.messages')

        <form action="{{route('admin.logo.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row justify-content-center">
                <div class="col-md-6 mt-4">
                    <div class="text-center mb-4">
                        <h5 class="mb-2">Current Logo</h5>
                        @if(isset($data) && $data->logo)
                            <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="img-fluid rounded" style="max-height: 150px;">
                        @else
                            <p class="text-muted">No logo uploaded yet.</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">Upload New Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload"></i> Update Logo
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
