@extends('admin.layouts.app')
@section('title','Action Logs Detail')
@section('content')
    <div class="my-5">
        <div class="row">
            <div class="col-6 offset-3 mt-5">
               <div class="card-header">
                @if($post->image === null)
                <img src="{{asset('defaultImage/default.png')}}" class="object-fit-cover d-block  img-thumbnail mx-auto" width="200px" alt="">
                @else
                <img src="{{asset('postImage/'.$post->image)}}" class="object-fit-cover d-block  img-thumbnail mx-auto" width="200px"  alt="">
                @endif
               </div>
               <div class="card-body">
                <h3>{{$post->title}}</h3>
                <p>{{$post->description}}</p>
               </div>
            </div>
        </div>
        <div class="row">
            <a href="{{route('admin#trendPost')}}"><button class="btn btn-dark col-1 offset-3">Back</button></a>
        </div>
    </div>


@endsection
