<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


## 1- create new Route
Route::get("/st", function (){
    return view("summertraining");
}); ## get represent request methods you will use ?

/*
 * GET --> get page
 * POST  --> send data to the server
 * PUT  --> update data
 * DELETE  ---> delete
 * */


## 1- create new Route
Route::get("/name", function (){
    return "noha";
}); ## get represent request methods you will use ?


Route::get("/students", function (){
//    $students = ["Ahmed",'Abdelrhaman', 'Omar','Shahd', 'Mohamed'];
//    return $students;

    $info = ["name"=>"noha", "work"=>"iti", 'age'=>31];
    return $info;
}); ## get represent request methods you will use ?


Route::get("/hello/{name}", function ($name){
   return "<h1 style='text-align: center;color: darkred'>
            Hello {$name}
        </h1>" ;
});


### move to the controller  000> control app --> http request
use App\Http\Controllers\ITIController;

Route::get('/controller',[ITIController::class, 'index'] );
Route::get("/welcome/{name}",[ITIController::class, 'saywelcome']);

### create different pages ---> application iti ---> students
use App\Http\Controllers\StudentController;

Route::get("/students/land", [StudentController::class, 'landing']);
Route::get('/students/iti', [StudentController::class, 'index'])->name('students.list');


