@extends('layouts.admin_layout')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">About Section List</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">About List</li>
        </ol>

        @include('alert.messages')

        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <i class="fas fa-table me-1"></i>
                About Entries
            </div>
            <div class="card-body">
                @if(count($teamMembers) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teamMembers as $teamMember)
                            <tr>
                                <td>{{ $teamMember->id }}</td>
                                <td>{{ $teamMember->name }}</td>
                                <td>{{ $teamMember->designation }}</td>
                                <td>
                                    @if($teamMember->image)
                                        <img src="{{ asset($teamMember->image) }}" width="100px" alt="Image" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.team.edit', $teamMember->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                        <form action="{{ route('admin.team.destroy', $teamMember->id) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <div class="alert alert-warning text-center" role="alert">
                        No About entries found.
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
