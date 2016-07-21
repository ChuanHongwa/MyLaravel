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

Route::get('/task', function () {
    return "網址列輸入的網址";
});


//接收表單,來增加新的任務
Route::post('/task', function (Request $request){
    $validator = Validator::make($request->all(),
                ["name"=>"required|max:2"]                 
    );
    
    if($validator->fails())
    {
//        return "資料錯誤!!!";
        return redirect("/")
            ->withInput()
            ->withErrors($validator);
    }
    
    $task = new Task;
    $task->name = $request->name;
    $task->save();
//    return "OK~";
    return redirect("/");
});

//刪除任務
Route::delete('/task/{task}', function (Task $task) {
    //
});



