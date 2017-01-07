<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

 Route::resource('users', 'UserController2');
 Route::match(['put'], 'users/{user}','UserController2@update');
 Route::match(['get'], 'users/{id}/delete_user','UserController2@delete_user');
 Route::match(['get'], 'users/{id}/delete','UserController2@delete');

 Route::get('/home', function () {
    return view('cinema.index');
});

Route::resource('movies', 'baner');
