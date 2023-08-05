@extends('layouts.base')

@section('maincontent')
    <div>
    <ul>
        <li> {{$student->id}}</li>
        <li> {{$student->name}}</li>
        <li> {{$student->image}}</li>
        <li> {{$student->grade}}</li>
        <li> {{$student->email}}</li>
        <li> {{$student->created_at}}</li>
        <li> {{$student->updated_at}}</li>
    </ul>
    </div>

@endsection
