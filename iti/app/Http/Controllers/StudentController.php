<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('auth')->only('store', 'delete', 'update');
    }


    private $students = ["Ahmed", "Mohamed", "Ali", "Sara"];

    function index()
    {


        # select * from table ;
        $students = Student::all();
//        dd($students,$students_1);

        return view("students.index", $data = ["students" => $students]);
    }

    function landing()
    {
        return view("students");
    }

    function show($id)
    {
//        dd($id);
        $student = Student::findOrFail($id);  # if object null --> redirect to 404 not found
        return view('students.show', $data = ["student" => $student]);
    }

    function delete($id)
    {
        $student = Student::findOrFail($id);
        if (Auth::id() == $student->user_id) {
            $student->delete();
            return to_route("students.index");
        }
        return abort(401);


    }

    function create()
    {
        return view('students.create');
    }

    function store(StoreStudentRequest $request)
    {
//        dd(Auth::user(), Auth::id());
        request()->validate([
            "name" => 'required|min:5',
            "grade" => "required",
            'email' => 'required|unique:students'
        ]);
//        dd(\request()->all());
        $data = request()->all();
        dump($data['user_id']);
//        $data['user_id']=Auth::id();
//        dd($data);
        $data['user_id'] = Auth::id();
        dump($data['user_id']);
        $student = Student::create($data);
        $this->save_image($request->image, $student);

        return to_route('students.index');
    }

    ### I need function for edit

    function edit($id)
    {
        # retrun view  --> edit
        $student = Student::findOrFail($id);
        return view('students.edit', $data = ['student' => $student]);
    }

    function update(UpdateStudentRequest $request, $id)
    {
//        dd('in updated');

        $student = Student::findOrFail($id);
        $old_image = $student->image;

        if (!Gate::allows('update-student', $student)) {
            abort(403);
        }
        $student->update(request()->all());
        $this->save_image($request->image, $student);
        if ($request->image) {
            $this->delete_old_image($old_image);
        }

//        return to_route('students.index');
        return to_route('students.show', $student->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $this->delete_old_image($post->image);
        $post->delete();
        return to_route('posts.index');
    }

    private function save_image($image, $student)
    {
        if ($image) {
            $image_name = time() . $image->extension();
            # move image from tmp folder to the public path
            $image->move(public_path('images/students/images/'), $image_name);
            $student->image = $image_name;
            $student->save();
        }
    }

    # what will happen when update image ?
    private function delete_old_image($image_name)
    {
        try {
            unlink('images/students/images/' . $image_name);
        } catch (\Exception $e) {
            echo $e;
        }
    }
}
