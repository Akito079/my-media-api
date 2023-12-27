@extends('admin.layouts.app')
@section('title','Profile')
@section('content')
<div class="col-8 offset-3 mt-5">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <legend class="text-center">User Profile</legend>
        </div>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{session('failed')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="card-body">
          <div class="tab-content">

            <div class="active tab-pane" id="activity">
              <form action="{{route('admin#changePassword')}}" method="POST" class="form-horizontal">
                @csrf
                 <div class="d-flex flex-column ">
                    <div class="form-group row">
                        <label for="inputName" class="col-4 col-form-label">Old Password</label>
                        <div class="col">
                          <input type="password" class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword"  placeholder="Enter Old Password">
                          @error('oldPassword')
                            <small class="text-danger">{{$message}}</small>
                          @enderror
                          @if (session('failed'))
                            <small class="text-danger">{{session('failed')}}</small>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputName" class="col-4 col-form-label">New Password</label>
                          <div class="col">
                            <input type="password" class="form-control @error('newPassword') is-invalid @enderror  " name="newPassword"  placeholder="Enter New Password">
                            @error('newPassword')
                            <small class="text-danger">{{$message}}</small>
                             @enderror
                         </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-4 col-form-label">Confirm New Password</label>
                          <div class="col">
                            <input type="password" class="form-control @error('confirmPw') is-invalid @enderror" name="confirmPw"  placeholder="Enter Old Password">
                            @error('confirmPw')
                            <small class="text-danger">{{$message}}</small>
                             @enderror
                        </div>
                        </div>
                 </div>
                 <div class="d-flex justify-content-end"> <button type="submit" class="btn btn-secondary" >Change Password</button></div>
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
