<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    //

    function __construct(){
        $this->middleware('auth')->only('store', 'delete', 'update');
    }


    private  $students = ["Ahmed", "Mohamed", "Ali", "Sara"];
    function index(){


        # select * from table ;
        $students = Student::all();
//        dd($students,$students_1);

        return view("students.index", $data=["students"=>$students]);
    }

    function landing(){
        return view("students");
    }

    function show($id){
//        dd($id);
        $student = Student::findOrFail($id);  # if object null --> redirect to 404 not found
        return view('students.show', $data = ["student"=>$student]);
    }

    function  delete($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return to_route("students.index");

    }

    function create(){
        return view('students.create');
    }

    function store(){


//        dd(Auth::user(), Auth::id());
        request()->validate([
            "name"=>'required|min:5',
            "grade"=>"required",
            'email'=>'required|unique:students'
        ]);
//        dd(\request()->all());
        $data = request()->all();
        dump($data['user_id']);
//        $data['user_id']=Auth::id();
//        dd($data);
        $data['user_id'] = Auth::id();
        dump($data['user_id']);
        $student = Student::create($data);

        return to_route('students.index');
    }

    ### I need function for edit

    function  edit($id){
        # retrun view  --> edit
        $student = Student::findOrFail($id);
        return view('students.edit', $data= ['student'=>$student]);
    }

    function  update($id){
//        dd('in updated');
        $student = Student::findOrFail($id);
        ### get updated data from request object
        $name = request('name');
        $grade = request("grade");
        $image = request("image");
        $email = request("email");
//        dd($name, $grade, $image, $email);

        ###update existing object with the new data
        $student->name = $name;
        $student->email = $email;
        $student->grade = $grade;
        $student->image = $image;
        ## to save it to the database
        $student->save();

//        return to_route('students.index');
        return to_route('students.show', $student->id);
    }











}
