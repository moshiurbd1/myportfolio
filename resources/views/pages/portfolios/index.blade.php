@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Portfolio</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">List</li>
        </ol>

        @include('alert.messages')

        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Sub Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Big Image</th>
                    <th scope="col">Small Image</th>
                    <th scope="col">Client</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($portfolios) > 0)
                    @foreach($portfolios as $portfolio)
                        <tr>
                            <th scope="row">{{ $portfolio->id }}</th>
                            <td>{{ $portfolio->title }}</td>
                            <td>{{ $portfolio->sub_title }}</td>
                            <td>{{ Str::limit(strip_tags($portfolio->description), 40) }}</td>
                            <td>
                                <img width="100px" src="{{ asset($portfolio->big_image) }}" alt="Big Image">
                            </td>
                            <td>
                                <img width="100px" src="{{ asset($portfolio->small_image) }}" alt="Small Image">
                            </td>
                            <td>{{ $portfolio->client }}</td>
                            <td>{{ $portfolio->category }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</main>
@endsection
