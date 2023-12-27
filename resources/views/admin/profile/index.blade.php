@extends('admin.layouts.app')
@section('title','Profile')
@section('content')
<div class="col-8 offset-3 mt-5">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <legend class="text-center">User Profile</legend>
            </div>
            @if (session('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('update')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <form action="{{route('admin#updateProfile')}}" method="POST" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="userId" value="{{$account->id}}">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('userName') is-invalid @enderror  "
                                        name="userName" value="{{old('userName',$account->name)}}" id="inputName"
                                        placeholder="Enter Name">
                                    @error('userName')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control @error('userEmail') is-invalid @enderror "
                                        id="inputEmail" name="userEmail" value="{{old('userEmail',$account->email)}}"
                                        placeholder="Enter Email">
                                    @error('userEmail')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('userPhone') is-invalid @enderror"
                                        id="phone" name="userPhone" value="{{old('userPhone',$account->phone)}}"
                                        placeholder="Enter phone number">
                                    @error('userPhone')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('useAddress') is-invalid @enderror "
                                        id="address" name="userAddress" value="{{old('userAddress',$account->address)}}"
                                        placeholder="Enter Address">
                                    @error('userAddress')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <select name="userGender" id=""
                                        class="form-control @error('userGender') is-invalid @enderror ">
                                        <option value="">Choose Gender</option>
                                        <option value="male" @if($account->gender == 'male') selected @endif>Male
                                        </option>
                                        <option value="female" @if($account->gender == 'female') selected @endif >Female
                                        </option>
                                    </select>
                                    @error('userGender')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <a href="{{route('admin#changePasswordPage')}}">Change Password</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
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
