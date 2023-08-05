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
        # get student from the database
        # select * from students where id=id;
//        $student = Student::find($id);  # find function return null -->if object not found
//        dd($student);
        $student = Student::findOrFail($id);  # if object null --> redirect to 404 not found
        return view('students.show', $data = ["student"=>$student]);
    }

    function  delete($id){
        $student = Student::findOrFail($id);
        $student->delete();
//        return "deleted";
        return to_route("students.list");

    }
}
