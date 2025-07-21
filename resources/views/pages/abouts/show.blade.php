@extends('layouts.admin_layout')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">About List</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">About / List</li>
        </ol>

        @include('alert.messages')

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title 1</th>
                                <th>Title 2</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($abouts as $about)
                                <tr>
                                    <td>{{ $about->id }}</td>
                                    <td>{{ $about->title1 }}</td>
                                    <td>{{ $about->title2 }}</td>
                                    <td>{{ Str::limit(strip_tags($about->description), 40) }}</td>
                                    <td>
                                        <img src="{{ url($about->image) }}" alt="Image" width="100" class="img-thumbnail">
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-sm btn-primary me-1">Edit</a>
                                        <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this entry?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No about entries found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
