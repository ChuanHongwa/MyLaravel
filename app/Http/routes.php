<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
//    return view('welcome');
    return view("tasks");
});

//接收表單,來增加新的任務
Route::post('/tasks', function (Request $request){
    return "OK~";
});

//刪除任務
Route::delete('/task/{id}', function ($id){
    
});



