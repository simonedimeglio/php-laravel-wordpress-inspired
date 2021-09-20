<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController'); 

Route::get('/public', 'PagesController@publicSection');

Route::get('/private', 'PagesController@privateSection');

Route::get('/form', function () {
    return view('/posts/form');
});