@extends('layouts.base')

@section('maincontent')
    <div class="container">
    <div class="card" style="width: 18rem;">
        <img src="{{asset('images/posts/images/'.$post->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <h6 class="card-title">Body: {{$post->body}}</h6>
            <h6 class="card-title">Created_at: {{$post->created_at}}</h6>

            <h6 class="card-title">Updated at: {{$post->updated_at}}</h6>
            <a href="{{route('posts.index')}}" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    </div>

@endsection
