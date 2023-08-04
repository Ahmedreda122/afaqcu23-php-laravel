<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container">
            <h1> Students Index </h1>
<!--            --><?php
//
//                var_dump($students);
//            ?>
    {{--        this is a comment
        in blade  ==> {{}}  is the echo function
        that we use to parse variable to string
        use htmlspecialchar  --> must be string

        in blade template engine  --> provide special syntax
        foreach loop ===> if condition
    --}}
    {{--{{$students}}--}}

    @dump($students)

            @foreach ($students as $student)

                @continue($student == "Ahmed")
                @break($student=='Ali')

                <li>{{ $student }}</li>

            @endforeach


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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>
