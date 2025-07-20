@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Service</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>

        @include('alert.messages')

        <form action="{{route('admin.service.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-md-5 mt-3">
                     
                    <div class="mb-3">
                        <label for="icon">Font Awesome icon
                            <input type="text" name="icon" class="form-control">
                        </label>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title"  class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" id="description" name="description"  class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
