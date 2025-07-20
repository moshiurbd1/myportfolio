@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">About</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>

        @include('alert.messages')

        <form action="{{route('admin.about.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            

            <div class="row">
                <!-- Background Image -->
                <div class="col-md-5 mt-3">
                    <h5>Big Image</h5>
                    <img src="{{ asset('img/main_background.jpg') }}" alt="Background Image" class="img-fluid mb-3" style="height: 30vh; object-fit: cover;">
                    <input type="file" name="image" class="form-control mb-3">
                    
                </div>

                <!-- Title and Resume -->
                <div class="col-md-5 mt-3">
                    <div class="mb-3">
                        <label for="title1" class="form-label">Title 1
                        <input type="text" id="title1" name="title1" class="form-control">
                        </label>
                    </div>

                    <div class="mb-3">
                        <label for="title2" class="form-label">Title 2
                        <input type="text" id="title2" name="title2"  class="form-control">
                        </label>
                    </div>
                    <div class="mb-3 ">
                        <label for="description" class="form-label">Description
                            <textarea class="form-control" name="description" id=""></textarea>
                        </label>                        
                    </div>
                    

                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
