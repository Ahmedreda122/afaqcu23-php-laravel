{{--@extends('layouts.base')--}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('posts.create')}}" class="btn btn-primary"> Add new POST  </a>
        <table class="table" style="">
            <tr> <th> ID</th> <th> Title </th> <th> Author </th>   </ha> <th> Show</th> <th> Edit</th>
                <th> Delete </th>
            </tr>

            @foreach($posts as $post)
                <tr style="background-color: #0dcaf0">
                    <td > {{$post->id }}</td>
                    <td> {{$post->title}}</td>
                    <td>  <a href="{{$post->student ? route('students.show', $post->student->id): null}}"> {{$post->student ? $post->student->name : null }}</a></td>
                    <td> <a href="{{route('posts.show', $post->id)}}" class="btn btn-info"> Show </a></td>
                    <td> <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning"> Edit </a></td>
{{--                    <td> <a href="" class="btn btn-danger"> Delete </a></td>--}}
                    <td>
                        <form method="Post" action="{{route('posts.destroy',$post->id)}}">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>

                    </td>
                </tr>
            @endforeach


        </table>


    </div>

@endsection
