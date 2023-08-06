@extends('layouts.base')

@section('maincontent')
    <div class="container">
    <div class="card" style="width: 18rem;">
        <img src="{{asset('images/students/'.$student->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$student->name}}</h5>
            <h6 class="card-title">Email: {{$student->email}}</h6>
            <h6 class="card-title">Grade: {{$student->grade}}</h6>
            <h6 class="card-title">Created_at: {{$student->created_at}}</h6>

            <h6 class="card-title">Updated at: {{$student->updated_at}}</h6>
            <a href="{{route('students.index')}}" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    </div>

@endsection
