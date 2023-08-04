<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ITIController extends Controller
{
    //
    function index (){
        return "<h1 style='color: red; text-align: center'> Hello from Controller </h1>";
    }

    function saywelcome($name){
        return "<h1> Welcome {$name}</h1>";
    }
}
