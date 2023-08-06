@extends('layouts.base')

@section('maincontent')

    <div class="container">

        <h1> Add new Post </h1>
        <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label  class="form-label">title</label>
                <input type="text" name='title'class="form-control" value="{{ old('title') }}" >
                @error('title')
                <span style="color: red; font-weight: bold;">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Body</label>
                <input type="text"  name='body' class="form-control" value="{{old('body')}}" >
                @error('body')
                <span style="color: red; font-weight: bold;">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label  class="form-label">Image</label>
                <input type="file" name='image' class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
