<?php

// verbo (get, post) - URL - destinazione (metodo del controller | funzione Closure)
Route::get('/', 'PostsController@index');

// Route::get('posts/{post}', 'PostsController@show')->name('posts.show')->where('post', '[0-9]');
Route::get('posts/create', 'PostsController@create')->name('posts.create');
Route::post('posts', 'PostsController@store')->name('posts.store');

Route::get('posts/{post}', 'PostsController@show')->name('posts.show');

// verbo - url - posts/{qualcosa = create}

Auth::routes();

// CRUD - Create, Read, Update, Delete
// REST - 7 metodi

//posts
// GET - POST - PATCH|PUT - DELETE
// index - Lista di tutti i posts                       - GET       - /posts                PostsController@index
// create - Visualizza form creazione post              - GET       - /posts/create         PostsController@create
// store - Salvataggio post nel database                - POST      - /posts                PostsController@store
// show - Visualizza un singolo post                    - GET       - /posts/{post}         PostsController@show
// edit - Visualizza form modifica post                 - GET       - /posts/{post}/edit    PostsController@edit
// update - Aggiornamento post nel database             - PATCH     - /posts/{post}         PostsController@update
// destroy - cancellazione post                         - DELETE    - /posts/{post}         PostsController@destroy

///////////////////////////////////////////////////////////////

// Route::get('/home', 'HomeController@index')->name('home');

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
