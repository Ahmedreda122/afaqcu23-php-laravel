@extends('layouts.app')

@section('content')
    <div class="container">
{{--        @dump($students)--}}
        <a href="{{route('students.create')}}" class="btn btn-primary"> Add new Student  </a>
        <table class="table" style="">
            <tr> <th> ID</th> <th> Name </th> <th> Email </th>   <th> Added by</th> <th> Show</th> <th> Edit</th>
                <th> Delete </th>
            </tr>

            @foreach($students as $student)
                <tr style="background-color: #0dcaf0">
                    <td > {{$student->id }}</td>
                    <td> {{$student->name}}</td>
                    <td> {{$student->email }}</td>
                    <td> {{$student->user ? $student->user->name: ''}}</td>
                    <td> <a href="{{route('students.show',$student->id)}}" class="btn btn-info"> Show </a></td>
                    <td> <a href="{{route('students.edit',$student->id)}}" class="btn btn-warning"> Edit </a></td>

                    <td> <a href="{{route("students.delete", $student->id)}}" class="btn btn-danger"> Delete </a></td>
                </tr>
            @endforeach


        </table>


    </div>

@endsection
