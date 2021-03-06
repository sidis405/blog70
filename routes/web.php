<?php


Route::get('/', 'PostsController@index')->name('posts.index');
Route::resource('posts', 'PostsController')->except('index');

Route::get('categories/{category}', 'CategoriesController@show')->name('categories.show');

Route::get('tags/{tag}', 'TagsController@show')->name('tags.show');

// (url, 'blade-file')
// Route::view('endore', 'endore');

Auth::routes();

//jwt - JSON Web Tokens

//oauth2 -
    // - Access Token Grant
    //     - Avviene su Dominio Autenticatore (redirect github.com)
    //     - App_ID
    //     - App_secret
    //         - storiamo il token
    //         - viene passato in ogni richiesta seguente
    // - Password Grant
    //     - Avviene su Dominio Client (blog70.dev)
    //     - App_ID
    //     - App_secret

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
