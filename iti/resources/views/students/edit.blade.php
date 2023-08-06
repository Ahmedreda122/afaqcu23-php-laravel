@extends('layouts.base')


@section('maincontent')
{{--    @dump($student)--}}
    <div class="container">
        <h1> Edit Student </h1>
        <form method="POST" action="{{route('students.update', $student->id)}}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" name='name'class="form-control" value="{{$student->name}}" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Email</label>
                <input type="email"  name='email' value="{{$student->email}}" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Grade</label>
                <input type="number" name="grade" value="{{$student->grade}}" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Image</label>
                <input type="text" name='image'  value="{{$student->image}}"class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
