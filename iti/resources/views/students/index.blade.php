@extends('layouts.base')

@section('maincontent')
    <div>
{{--        @dump($students)--}}

        <table class="table" style="">
            <tr> <th> ID</th> <th> Name </th> <th> Email </th>   <th> Show</th>
                <th> Delete </th>
            </tr>

            @foreach($students as $student)
                <tr style="background-color: #0dcaf0">
                    <td > {{$student->id }}</td>
                    <td> {{$student->name}}</td>
                    <td> {{$student->email }}</td>
                    <td> <a href="{{route('students.show',$student->id)}}" class="btn btn-info"> Show </a></td>
                    <td> <a href="{{route("students.delete", $student->id)}}" class="btn btn-danger"> Delete </a></td>
                </tr>
            @endforeach


        </table>

    </div>

@endsection
