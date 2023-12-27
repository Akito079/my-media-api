@extends('admin.layouts.app')
@section('title','Create Category')
@section('content')
<div class="col-8 offset-3 mt-5">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <legend class="text-center">Create Category</legend>
        </div>

        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <form action="{{route('admin#categoryCreate')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">

                  <label for="inputName" class=" col-sm-12 col-lg-4 col-form-label"> Name</label>
                  <div class="col">
                    <input type="text" class="form-control @error('categoryName') is-invalid @enderror " name="categoryName" value="{{old('categoryName')}}" id="inputName" placeholder="Enter Category Name">
                    @error('categoryName')
                       <small class="text-danger"> {{$message}}</small>
                    @enderror
                </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class=" col-sm-12 col-lg-4 col-form-label"> Description</label>
                    <div class="col">
                        <textarea name="categoryDescription" class="form-control @error('categoryDescription') is-invalid @enderror " placeholder="Enter Description" >{{old('categoryDescription')}}</textarea>
                        @error('categoryDescription')
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
