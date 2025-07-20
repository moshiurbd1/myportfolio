@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Service</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">List</li>
        </ol>

        @include('alert.messages')

        <table class="table">
  <thead>
    <tr class="bg-dark text-white">
      <th scope="col">ID</th>
      <th scope="col">Icon</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if(count($services)>0)
        @foreach($services as $service)
                    <tr>
      <th scope="row">{{$service->id}}</th>
      
      <td>{{$service->icon}}</td>
      <td>{{$service->title}}</td>
      <td>{{Str::limit(strip_tags($service->description),40)}}</td>
      <td>
        <div class="col-sm-2">
            <a href="{{route('admin.service.edit',$service->id)}}" class="btn btn-primary">Edit</a> 
        </div> 
        <div class="col-sm-2">
            <form action="{{route('admin.service.destroy',$service->id)}}" method="post">
            @csrf    
            @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-danger">
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






