<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    //

    private  $students = ["Ahmed", "Mohamed", "Ali", "Sara"];
    function index(){
        ## get the data from model ?
        # select * from students
//        $students = "";

//        $students = DB::table('students')
//            ->select('name', 'email as user_email')
//            ->get();
//
//        dd($students);
        $students_1 = DB::table('students')
            ->select()
            ->get();
//
//        dd($students);

        ### use ORM api resources -->
        /*
         * as you are using ORM ---
         * you can use api functions to facilitate queries
         * */

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
//        var_dump($_POST);
        # you can capture the data sent by the form using request()
        $params = request();
//        dd($params);
        $name = request('name');
        $grade = request("grade");
        $image = request("image");
        $email = request("email");
        ## use this information to create new object from the Student model and save it to the database
        $student = new Student();
        $student->name = $name;
        $student->email = $email;
        $student->grade = $grade;
        $student->image = $image;
        ## to save it to the database
        $student->save();

//        return "data received";
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
