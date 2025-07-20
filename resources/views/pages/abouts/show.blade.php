@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">About</h1>
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
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if(count($abouts)>0)
        @foreach($abouts as $about)
                    <tr>
      <th scope="row">{{$about->id}}</th>
      
      <td>{{$about->title1}}</td>
      <td>{{$about->title2}}</td>
      <td>{{Str::limit(strip_tags($about->description),40)}}</td>
      <td>
        <img src="{{url($about->image)}}" width="100px" alt="">
      </td>
      <td>
        <div class="col-sm-2">
            <a href="{{route('admin.about.edit',$about->id)}}" class="btn btn-primary btn-sm">Edit</a> 
        </div> 
        <div class="col-sm-2">
            <form action="{{route('admin.about.destroy',$about->id)}}" method="post">
            @csrf    
            @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
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






