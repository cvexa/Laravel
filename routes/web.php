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


// main routes
Route::get('/home','BanerController@index');
Route::get('/logged', 'BanerController@index_logged');
Route::get('/logout', 'BanerController@logout');

// auth routes
Auth::routes();

// profile routes
Route::get('/profile/{id}','ProfileController@index');
Route::get('/profile/{id}/edit','ProfileController@edit');
Route::put('/profile/{id}','ProfileController@update');



Route::get('/single', function () {
    return view('cinema.single');
});


// Movies and reservation routes
Route::resource('movies', 'MoviesController');
Route::resource('screenings', 'ScreeningsController');
Route::get('/admin/codes', 'AdminPanelController@codes');
Route::get('/admin/codes/check', 'AdminPanelController@checking');
Route::get('/reservation/{id}', 'ReservationController@index');
Route::post('/reservation/', 'ReservationController@store');

//Admin
Route::get('/admin', 'AdminPanelController@index');




