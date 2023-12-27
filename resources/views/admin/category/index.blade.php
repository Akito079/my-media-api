@extends('admin.layouts.app')
@section('content')
@section('title','Category')
<div class="col-12">
      @if (session('created'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('created')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if (session('deleted'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{session('deleted')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if (session('updated'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <strong>{{session('updated')}}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <a href="{{route('admin#categoryCreatePage')}}"><button class="btn btn-sm btn-outline-dark">Add Category</button></a>
        </h3>
        <div class="card-tools">
         <form action="{{route('admin#categorySearch')}}" method="post">
            @csrf
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="key"  value="" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
         </form>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap text-center">
          <thead>
            <tr>
              <th>ID</th>
              <th>Category Name</th>
              <th>Description</th>
              <th>Created Date</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
           @foreach ($categories as $category )
           <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{Str::words($category->description,5,'...')}}</td>
            <td>{{$category->created_at}}</td>
            <td>
                <a href="{{route('admin#categoryUpdatePage',$category->id)}}"> <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                <a href="{{route('admin#categoryDelete',$category->id)}}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
            </td>
          </tr>
           @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection
