<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //

    private  $students = ["Ahmed", "Mohamed", "Ali", "Sara"];
    function index(){
//        return $this->students;
        return view("studentsindex", $data=[
            "students"=>$this->students
        ]);

    }

    function landing(){
        return view("students");
    }
}
