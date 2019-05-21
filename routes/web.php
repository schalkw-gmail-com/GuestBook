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

//Route::get('/', function () {
//    return view('welcome')->name('index');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
//Route::get('/home', 'HomeController@index')->name('index');


Route::get('/messages', 'MessagesController@index')->name('messages');
Route::post('/messages', 'MessagesController@store')->name('messages.store');
Route::get('/messages/show/{id}', 'MessagesController@show')->name('messages.show');
Route::get('/messages/edit/{id}', 'MessagesController@edit')->name('messages.edit');
Route::get('/messages/new', 'MessagesController@create')->name('messages.create');
Route::post('/messages/{id}', 'MessagesController@update')->name('messages.update');
Route::delete('/messages/{id}', 'MessagesController@destroy')->name('messages.destroy');
