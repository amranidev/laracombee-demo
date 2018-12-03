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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'books', 'as' => 'books.', 'middleware' => ['web', 'auth']], function() {
    Route::get('/', 'BookController@index')->name('index');
    Route::get('create', 'BookController@create')->name('create');
    Route::post('store', 'BookController@store')->name('store');
});

