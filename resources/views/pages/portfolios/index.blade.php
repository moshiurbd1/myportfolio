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

        <table class="table">
  <thead>
    <tr class="bg-dark text-white">
      <th scope="col">ID</th>
      <th scope="col">Icon</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th>Big Image</th>
      <th>Small Image</th>
      <th>Client</th>
      <th>Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if(count($portfolios)>0)
        @foreach($portfolios as $portfolio)
                    <tr>
      <th scope="row">{{$portfolio->id}}</th>
      
      <td>{{$portfolio->title}}</td>
      <td>{{$portfolio->sub_title}}</td>
      <td>{{Str::limit(strip_tags($portfolio->description),40)}}</td>
      <td><img width="100px" src="{{asset($portfolio->big_image)}}" alt=""></td>
      <td><img width="100px" src="{{asset($portfolio->small_image)}}" alt=""></td>
      <td>{{$portfolio->client}}</td>
      <td>{{$portfolio->category}}</td>
      <td>
        <div class="col-sm-2">
            <a href="{{route('admin.portfolio.edit',$portfolio->id)}}" class="btn btn-primary">Edit</a> 
        </div> 
        <div class="col-sm-2">
            <form action="{{route('admin.portfolio.destroy',$portfolio->id)}}" method="post">
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






