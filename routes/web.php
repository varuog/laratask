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

Route::any('/tasks/{page?}', 'TaskController@index');
Route::any('/task/create', 'TaskController@create');
Route::any('/task/show', 'TaskController@show');
Route::any('/task/trash', 'TaskController@trash');
Route::any('/task/delete', 'TaskController@destroy');