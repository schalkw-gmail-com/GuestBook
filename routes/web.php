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


use App\Role;

Auth::routes();
Route::get('/', 'HomeController@index')->name('index');
Route::resource('messages', 'MessagesController')->middleware('check_user_role:' . \App\UserRole::ROLE_USER);
Route::get('/usermessages', 'MessagesController@usermessage')->name('usermessages')->middleware('check_user_role:' . \App\UserRole::ROLE_ADMIN);




////Route::get('/home', 'HomeController@index')->name('index');
//
//
//Route::get('/messages', 'MessagesController@index')->name('messages');
//
//Route::post('/messages', 'MessagesController@store')->name('messages.store')->middleware('auth');
//Route::get('/messages/show/{id}', 'MessagesController@show')->name('messages.show')->middleware('auth');
//Route::get('/messages/edit/{id}', 'MessagesController@edit')->name('messages.edit')->middleware('auth');
//Route::get('/messages/new', 'MessagesController@create')->name('messages.create')->middleware('auth');
//Route::post('/messages/{id}', 'MessagesController@update')->name('messages.update')->middleware('auth');
//Route::delete('/messages/{id}', 'MessagesController@destroy')->name('messages.destroy')->middleware('auth');
//
//
 Route::resource('messagereplies', 'MessageRepliesController', ['except' => ['index', 'create', 'show']]);

//$w = new \App\UserRole();
////dd($w);
//Route::get('/', 'HomeController@admin')->middleware('check_user_role:admin');
//
//   // Route::get('admin/routes', 'HomeController@admin')->middleware('check_user_role');

//Route::get('admin/finance', function () {
//})->middleware('check_user_role:' . \App\UserRole::ROLE_ADMIN);
