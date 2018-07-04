<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::name('api.')->group(function () {
    Route::post('login', 'Api\LoginController@login')->name('login');

    //protected routes
    Route::middleware('jwt.auth')->group(function () {
        Route::get('me', 'Api\MeController@me')->name('me');
    });

    Route::resource('posts', 'Api\PostsController')->except('create', 'edit');
});
