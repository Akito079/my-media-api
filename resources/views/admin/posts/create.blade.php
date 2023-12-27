@extends('admin.layouts.app')
@section('title','Create Post')
@section('content')
<div class="col-8 offset-3 mt-5">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <legend class="text-center">Create Posts</legend>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <form action="{{route('admin#postCreate')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                  <label for="inputName" class=" col-sm-12 col-lg-4 col-form-label">Title</label>
                  <div class="col">
                    <input type="text" class="form-control @error('postTitle') is-invalid @enderror " name="postTitle" value="{{old('postTitle')}}" id="inputName" placeholder="Enter Category Name">
                    @error('postTitle')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class=" col-sm-12 col-lg-4 col-form-label"> Description</label>
                    <div class="col">
                        <textarea name="postDescription" class="form-control @error('postDescription') is-invalid @enderror " placeholder="Enter Description">{{old('postDescription')}}</textarea>
                    @error('postDescription')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName" class=" col-sm-12 col-lg-4 col-form-label"> Image</label>
                    <div class="col">
                       <input type="file" name="postImage" id="" class="form-control @error('postImage') is-invalid @enderror ">
                        @error('postImage')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName" class=" col-sm-12 col-lg-4 col-form-label"> Category</label>
                    <div class="col">
                       <select name="categoryId" class="form-control @error('categoryId')is-invalid @enderror " id="">
                        <option value="">Choose Category</option>
                        @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                       </select>
                       @error('categoryId')
                        <small class="text-danger">{{$message}}</small>
                       @enderror
                    </div>
                  </div>
                <div class="d-flex justify-content-end mt-5">
                    <button type="submit" class="btn btn-dark">Create</button>
                  </div>
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
