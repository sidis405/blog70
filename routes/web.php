<?php

Route::get('/', 'PostsController@index');

// Route::get('/', 'TasksController@index');

// Route::get('tasks/{task}', 'TasksController@show');

// Route::get('/', function () {
//     $tasks = \App\Task::get();

//     return view('welcome', compact('tasks'));
// });

// Route::get('tasks/{id}', function ($id) {
//     $task = \App\Task::find($id);

//     return $task;
// });

// Route::get('/', function () {
//     $tasks = \DB::table('tasks')->get();
//     return view('welcome', compact('tasks'));
// });

// Route::get('tasks/{id}', function ($id) {
//     $task = \DB::table('tasks')->find($id);

//     return json_decode(json_encode($task), true);
// });

// tasks/1
// tasks/2
// tasks/3
// tasks/70




// Route::get('/', function () {
//     // $tasks = [
//     //     'impara laravel',
//     //     'usa laravel',
//     //     'usa laravel di nuovo',
//     // ];

//     $tasks = \DB::table('tasks')->get();

//     // return $tasks;

//     return view('welcome', compact('tasks'));
// });


// Route::get('/', function () {
//     $tasks = [
//         'impara laravel',
//         'usa laravel',
//         'usa laravel di nuovo',
//     ];

//     return view('welcome', compact('tasks'));
// });


// Route::get('/', function () {
//     $nome = 'Bob';

//     return view('welcome', compact('nome'));
//     // return view('welcome')->withNome($pippo);
//     // return view('welcome')->with(compact('nome'));
//     // return view('welcome', compact('nome'));
//     // return view('welcome')->with(['nome' => $nome]);
//     // return view('welcome', ['nome' => $nome]);
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
