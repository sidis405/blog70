<?php


Route::get('/', 'PostsController@index')->name('posts.index');
Route::resource('posts', 'PostsController')->except('index');

Auth::routes();

// Route::get('posts/create', 'PostsController@create')->name('posts.create');
// Route::post('posts', 'PostsController@store')->name('posts.store');
// Route::get('posts/{post}/edit', 'PostsController@edit')->name('posts.edit');
// Route::patch('posts/{post}', 'PostsController@update')->name('posts.update');
// Route::get('posts/{post}', 'PostsController@show')->name('posts.show');
// Route::delete('posts/{post}', 'PostsController@destroy')->name('posts.destroy');

// Http 1.1 - GET, POST, PUT, PATCH, DELETE

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
