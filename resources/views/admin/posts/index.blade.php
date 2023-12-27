@extends('admin.layouts.app')
@section('title','Posts')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{route('admin#postCreatePage')}}"><button class="btn btn-sm btn-outline-dark">Add
                        Posts</button></a>
            </h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>category</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post )
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>
                            @if ($post->image != null)
                            <img src="{{asset('postImage/'.$post->image)}}" class="img-thumbnail" width="100px">
                            @endif
                        </td>
                        <td>{{Str::words($post->description,10,'....')}}</td>
                        <td>{{$post->category}}</td>
                        <td>
                            <a href="{{route('admin#postUpdatePage',$post->id)}}"><button
                                    class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                            <a href="{{route('admin#deletePost',$post->id)}}">
                                <button class="btn btn-sm bg-danger text-white"><i
                                        class="fas fa-trash-alt"></i></button>
                            </a>
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
