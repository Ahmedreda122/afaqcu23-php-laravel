@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">

        <h1> Add new student by user {{Auth::user()? Auth::user()->name: ''}} </h1>
        <form method="POST" action="{{route('students.store')}}?track=php">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()? Auth::id(): null}}">
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" name='name'class="form-control" value="{{ old('name') }}" >
                @error('name')
                <span style="color: red; font-weight: bold;">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Email</label>
                <input type="email"  name='email' class="form-control" value="{{old('email')}}" >
                @error('email')
                <span style="color: red; font-weight: bold;">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Grade</label>
                <input type="number" name="grade" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Image</label>
                <input type="text" name='image' class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
