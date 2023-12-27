@extends('admin.layouts.app')
@section('title','Category Update')
@section('content')
<div class="col-8 offset-3 mt-5">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <legend class="text-center">Category</legend>
            </div>
            {{-- @if (session('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('update')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif --}}
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <form action="{{route('admin#categoryUpdate')}}" method="POST" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="categoryId" value="{{$category->id}}">
                            <div class="form-group row">
                                <label for="inputName" class="col-12 col-form-label">Name</label>
                                <div class="col-12">
                                    <input type="text" class="form-control @error('categoryName') is-invalid @enderror " name="categoryName" value="{{old('categoryName',$category->title)}}" id="inputName"
                                        placeholder="Enter Category">
                                        @error('categoryName')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-12 col-form-label">Description</label>
                                <div class="col-12">
                                    <textarea name="categoryDescription" class="form-control @error('categoryDescription') is-invalid @enderror "
                                        placeholder="Enter description" cols="30" rows="10">{{old('categoryDescription',$category->description)}}</textarea>
                                        @error('categoryDescription')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="d-flex justify-content-end align-items-center">
                                    <button type="submit" class="btn bg-dark text-white">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
