@extends('layouts.base')

@section('maincontent')
    <div class="container">
        <h1> Add new student </h1>
        <form method="POST" action="{{route('students.store')}}?track=php">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" name='name'class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Email</label>
                <input type="email"  name='email' class="form-control" >
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
