@extends('layouts.app')

@section('content')
{{--    @dump($student)--}}
    <div class="container">
        <h1> Edit Post </h1>
        <form method="POST" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label  class="form-label">Title</label>
                <input type="text" name='title'class="form-control" value="{{$post->title}}" >
                @error('title')
                <span style="color: red; font-weight: bold;">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Body</label>
                <input type="text"  name='body' value="{{$post->body}}" class="form-control" >
            </div>

            <div class="mb-3">
                @if($post->image)
                    <img  width="100" height="100" src="{{asset('images/posts/images/'.$post->image)}}">
                @endif
            </div>
            <div class="mb-3">
                <label  class="form-label">Image</label>
                <input type="file" name='image'  class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
