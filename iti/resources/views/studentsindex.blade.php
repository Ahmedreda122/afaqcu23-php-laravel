@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Students Index</title>
</head>
<body>

<div class="container"  >
            <h1> Students Index </h1>
    @dump($students)

            @foreach ($students as $student)

                @continue($student == "Ahmed")
                @break($student=='Ali')

                <li>{{ $student }}</li>

            @endforeach
    <a class="btn btn-danger">test </a>


            <table class="table" >
                <thead>
                    <tr> <th> ID</th> <th> Name</th></tr>
                </thead>
                <tbody>
                    @foreach($students as $key=>$std)
                        <tr>
                            <td> {{$key}}</td> <td> {{$std}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
<img src="{{asset("images/students/image1.jpeg")}}">

</body>
</html>
