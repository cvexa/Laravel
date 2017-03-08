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

 Route::get('/home','BanerController@index');

Auth::routes();

Route::get('/logged', 'BanerController@index_logged');





Route::get('/logout', 'BanerController@logout');

// Route::get('/home/{user?}', 'BanerController@index');



Route::get('/single', function () {
    return view('cinema.single');
});

Route::resource('movies', 'MoviesController');
Route::get('/reservation/{id}', 'ReservationController@index');
Route::post('/reservation/', 'ReservationController@store');


