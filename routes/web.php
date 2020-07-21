<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/images','UsersController@images');
Route::get('/users', 'UsersController@index');
Route::get('/users/create', 'UsersController@create');
Route::post('/users/create', 'UsersController@store');
Route::get('/users/{id}/show', 'UsersController@show');
Route::delete('/users/{id}/delete', 'UsersController@destroy');

Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts/create', 'PostsController@store');
Route::get('/posts/{id}/show', 'PostsController@show');
Route::delete('/posts/{id}/delete', 'PostsController@destroy');
