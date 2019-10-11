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





Route::group(['middleware' => 'auth'],function(){
	Route::get('/todos','TodoController@index');
	 Route::get('/todos/create-todo','TodoController@create');
	Route::get('/todos/{id}','TodoController@show');
	Route::get('/todos/{id}/edit','TodoController@edit');
	Route::post('/todos/{id}/update-todo','TodoController@update_todo');
	Route::get('/todos/{id}/delete-todo','TodoController@delete');
	Route::get('/todos/{id}/complete','TodoController@complete');
	Route::post('/todos/create-todo','TodoController@save_todo');
});